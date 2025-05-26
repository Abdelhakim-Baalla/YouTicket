<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Système de Ticketing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-container {
            max-width: 400px;
            width: 100%;
            padding: 15px;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #fff;
            border-bottom: none;
            text-align: center;
            padding-top: 20px;
        }
        .btn-primary {
            width: 100%;
        }
    </style>
    <link rel="shortcut icon" href="{{asset('images/YouTicketLogo.png')}}" type="image/x-icon">
</head>
<body>
    <div class="login-container">
        <div class="card">
            <div class="card-header">
                <h3>Système de Ticketing</h3>
                <p class="text-muted">Connectez-vous à votre compte</p>
            </div>
            <div class="card-body">
                <form action="/dashboard" method="GET">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="nom@exemple.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password" required>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember">
                        <label class="form-check-label" for="remember">Se souvenir de moi</label>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Connexion</button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center bg-white">
                <a href="/forgot-password" class="text-decoration-none">Mot de passe oublié?</a>
                <hr>
                <p class="mb-0">Vous n'avez pas de compte? <a href="/register" class="text-decoration-none">S'inscrire</a></p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
