<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Système de Ticketing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .register-container {
            max-width: 500px;
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
</head>
<body>
    <div class="register-container">
        <div class="card">
            <div class="card-header">
                <h3>Système de Ticketing</h3>
                <p class="text-muted">Créer un nouveau compte</p>
            </div>
            <div class="card-body">
                <form action="/login" method="GET">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="first_name" class="form-label">Prénom</label>
                            <input type="text" class="form-control" id="first_name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="last_name" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="last_name" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="nom@exemple.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                        <input type="password" class="form-control" id="password_confirmation" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Rôle</label>
                        <select class="form-select" id="role" required>
                            <option value="">Sélectionner un rôle</option>
                            <option value="user">Utilisateur</option>
                            <option value="agent">Agent de support</option>
                            <option value="admin">Administrateur</option>
                        </select>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="terms" required>
                        <label class="form-check-label" for="terms">J'accepte les conditions d'utilisation</label>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">S'inscrire</button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center bg-white">
                <p class="mb-0">Vous avez déjà un compte? <a href="/login" class="text-decoration-none">Se connecter</a></p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
