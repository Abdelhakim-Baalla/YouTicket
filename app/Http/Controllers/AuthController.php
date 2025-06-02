<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use App\Models\Utilisateur;
use App\Mail\ValidationEmail;
use App\Notifications\ValidationSms;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    // SUPPRESSION des middlewares dans le constructeur pour éviter les boucles de redirection
    public function __construct() {}

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('profile');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);

        // $token = Auth::attempt($credentials);
        // if (!$token) {
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => 'Unauthorized',
        //     ], 401);
        // }

        // $user = Auth::user();
        // return response()->json([
        //     'status' => 'success',
        //     'user' => $user,
        //     'authorisation' => [
        //         'token' => $token,
        //         'type' => 'bearer',
        //     ]
        // ]);
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:utilisateurs',
            'password' => 'required|string|min:8',
            'telephone' => 'required|string|max:15',
            'post' => 'required|string|max:255',
            'terms' => 'required|accepted',
        ], [
            // Messages d'erreur personnalisés
            'nom.required' => 'Le nom est requis',
            'prenom.required' => 'Le prénom est requis',
            'email.required' => 'L\'adresse email est requise',
            'email.email' => 'Veuillez entrer une adresse email valide',
            'email.unique' => 'Cette adresse email est déjà utilisée par un autre compte',
            'password.required' => 'Le mot de passe est requis',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères',
            'telephone.required' => 'Le numéro de téléphone est requis',
            'post.required' => 'Le poste est requis',
            'terms.required' => 'Vous devez accepter les conditions d\'utilisation',
            'terms.accepted' => 'Vous devez accepter les conditions d\'utilisation',
        ]);

        try {
            $data['password'] = Hash::make($data['password']);

            // Retirer le champ 'terms' avant de créer l'utilisateur
            unset($data['terms']);

            $user = Utilisateur::create($data);

            if ($user) {
                Auth::login($user);
                $request->session()->regenerate();

                return redirect()->route('profile')->with('success', 'Compte créé avec succès !');
            }

            return back()->withErrors([
                'general' => 'Une erreur est survenue lors de la création du compte. Veuillez réessayer.',
            ])->withInput();
        } catch (\Exception $e) {
            Log::error('Erreur lors de la création du compte: ' . $e->getMessage());

            return back()->withErrors([
                'general' => 'Une erreur technique est survenue. Veuillez réessayer plus tard.',
            ])->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function profile()
    {
        // dd(Auth::user()->actif);
        if (Auth::check()) {
            return view('profile.index');
        }

        return redirect()->route('login')->with('error', 'Please log in to access to your profile.');
    }

    public function validationCompte()
    {
        if (Auth::check()) {
            return view('auth.validation');
        }

        return redirect()->route('login')->with('error', 'Please log in to validate your account.');
    }


    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('auth.login');
    }

    public function showRegistrationForm()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('auth.register');
    }

    /**
     * Envoie un email de validation de compte avec un lien sécurisé
     */
    public function sendValidationEmail(Request $request)
    {
        $user = Auth::user();
        // Générer un lien signé valable 24h
        $url = URL::temporarySignedRoute(
            'validate.account',
            now()->addHours(24),
            ['user' => $user->id]
        );
        Mail::to($user->email)->send(new ValidationEmail($url, $user));
        return back()->with('success', 'Un email de validation a été envoyé à votre adresse.');
    }

    /**
     * Valide le compte utilisateur via le lien reçu par email
     */
    public function validateAccount(Request $request)
    {
        if (!$request->hasValidSignature()) {
            abort(401, 'Lien de validation invalide ou expiré.');
        }
        $user = \App\Models\Utilisateur::findOrFail($request->user);
        $user->actif = 1;
        $user->save();
        Auth::login($user);
        return redirect()->route('profile')->with('success', 'Votre compte a été validé avec succès !');
    }

    /**
     * Envoie un code de validation par SMS
     */
    public function sendValidationSms(Request $request)
    {
        $user = Auth::user();
        $code = random_int(100000, 999999);
        // Stocker le code temporairement (10 min)
        Cache::put('sms_code_' . $user->id, $code, now()->addMinutes(10));
        $user->notify(new ValidationSms($code));
        return back()->with('success', 'Un code de validation a été envoyé par SMS.');
    }

    /**
     * Vérifie le code SMS et active le compte
     */
    public function validateSmsCode(Request $request)
    {
        $request->validate(['code' => 'required|digits:6']);
        $user = Auth::user();
        $code = Cache::get('sms_code_' . $user->id);
        if ($code && $request->code == $code) {
            // Re-fetch the user as an Eloquent model to ensure save() is available
            $eloquentUser = \App\Models\Utilisateur::find($user->id);
            if ($eloquentUser) {
                $eloquentUser->actif = 1;
                $eloquentUser->save();
                Cache::forget('sms_code_' . $user->id);
                Auth::login($eloquentUser);
                return redirect()->route('profile')->with('success', 'Votre compte a été validé par SMS !');
            } else {
                return back()->withErrors(['code' => 'Utilisateur introuvable.']);
            }
        }
        return back()->withErrors(['code' => 'Code invalide ou expiré.']);
    }

    /**
     * Affiche le formulaire de demande de réinitialisation
     */
    public function showForgetPasswordForm()
    {
        return view('auth.forget_password');
    }

    /**
     * Envoie le lien de réinitialisation par email
     */
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $status = Password::sendResetLink(
            $request->only('email')
        );
        return $status === Password::RESET_LINK_SENT
            ? back()->with('success', 'Un lien de réinitialisation a été envoyé à votre adresse email.')
            : back()->withErrors(['email' => __($status)]);
    }

    /**
     * Affiche le formulaire de nouveau mot de passe
     */
    public function showResetForm(Request $request, $token)
    {
        $email = $request->query('email');
        return view('auth.reset_password', ['token' => $token, 'email' => $email]);
    }

    /**
     * Traite la soumission du nouveau mot de passe
     */
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->setRememberToken(Str::random(60));
                $user->save();
            }
        );
        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('success', 'Votre mot de passe a été réinitialisé avec succès.')
            : back()->withErrors(['email' => [__($status)]]);
    }
}
