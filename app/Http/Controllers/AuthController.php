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
use App\Repositories\Interfaces\RoleRepositoryInterface;
use App\Repositories\Interfaces\UtilisateurRepositoryInterface;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    protected $utilisateurRepository;
    protected $roleRepository;

    public function __construct(RoleRepositoryInterface $roleRepository, UtilisateurRepositoryInterface $utilisateurRepository)
    {
        $this->utilisateurRepository = $utilisateurRepository;
        $this->roleRepository = $roleRepository;
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
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
            'role' => 'required|string',
        ], [
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
            'role.required' => 'Le role est requis',
        ]);

        if ($data['role'] == 'admin') {
            return back()->withErrors([
                'role' => 'Une erreur technique est survenue. Veuillez réessayer plus tard.',
            ])->withInput();
        }

        $role_id = $this->roleRepository->trouverParNom($data['role']);

        if (!$role_id) {
            return back()->withErrors([
                'role' => 'Le role et requit.',
            ])->withInput();
        }

        $data['role_id'] = $role_id->id;

        $data['password'] = Hash::make($data['password']);

        unset($data['terms']);

        $user = Utilisateur::create($data);
        if ($user) {
            Auth::login($user);
            $request->session()->regenerate();

            return redirect()->route('profile')->with('success', 'Compte créé avec succès !');
        }

        // if (Auth::attempt($user)) {
        //     $request->session()->regenerate();
        //     return redirect()->route('profile');
        // }

        return back()->withErrors([
            'general' => 'Une erreur est survenue lors de la création du compte. Veuillez réessayer.',
        ])->withInput();
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

    public function sendValidationSms(Request $request)
    {
        $user = Auth::user();
        $code = random_int(100000, 999999);

        Cache::put('sms_code_' . $user->id, $code, now()->addMinutes(10));
        $user->notify(new ValidationSms($code));
        return back()->with('success', 'Un code de validation a été envoyé par SMS.');
    }


    public function validateSmsCode(Request $request)
    {
        $request->validate(['code' => 'required|digits:6']);
        $user = Auth::user();
        $code = Cache::get('sms_code_' . $user->id);
        if ($code && $request->code == $code) {

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


    public function showForgetPasswordForm()
    {
        return view('auth.forget_password');
    }


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


    public function showResetForm(Request $request, $token)
    {
        $email = $request->query('email');
        return view('auth.reset_password', ['token' => $token, 'email' => $email]);
    }


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

    public function updateProfileChangePassword(Request $request)
    {
        $user = Auth::user();

        $data = $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string',
        ]);

        if (!Hash::check($data['current_password'], $user->password)) {
            return back()->with('error', 'Le mot de passe actuel est incorrect.');
        }

        $data = [
            'password' => Hash::make($data['new_password']),
        ];

        $this->utilisateurRepository->mettreAJour($user->id, $data);
        return back()->with('success', 'Mot de passe mis à jour avec succès.');
    }


    public function editProfile()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }


    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $data = $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:utilisateurs,email,' . $user->id,
            'telephone' => 'nullable|string|max:20',
            'poste' => 'nullable|string|max:255',
            'departement' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $path = $file->store('photos', 'public');

            $data['photo'] = $path;
        } else {
            unset($data['photo']);
        }
        $this->utilisateurRepository->mettreAJour($user->id, $data);
        return back()->with('success', 'Profil mis à jour avec succès.');
    }
}
