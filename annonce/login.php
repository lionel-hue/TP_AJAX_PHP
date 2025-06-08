
<?php
// login.php : Page de connexion Bootstrap moderne et responsive
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creer Annonce</title>
    <!-- Bootstrap 5 -->
    <link href="../asset/css/bootstrap.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="../asset/icons/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #4f8cff 0%, #3358d1 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            background: #fff;
            border-radius: 1.2rem;
            box-shadow: 0 4px 32px rgba(80,120,200,0.13);
            padding: 2.5rem 2rem;
            max-width: 370px;
            width: 100%;
        }
        .login-card .form-control:focus {
            border-color: #4f8cff;
            box-shadow: 0 0 0 0.2rem rgba(79,140,255,.15);
        }
        .login-card .logo {
            width: 60px;
            height: 60px;
            background: #eaf1ff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem auto;
            font-size: 2rem;
            color: #4f8cff;
        }
        .login-card .btn-primary {
            background: linear-gradient(90deg, #4f8cff 0%, #3358d1 100%);
            border: none;
        }
        .login-card .btn-primary:hover {
            background: linear-gradient(90deg, #3358d1 0%, #4f8cff 100%);
        }
        @media (max-width: 575.98px) {
            .login-card {
                padding: 2rem 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-card shadow">
        <div class="logo mb-3">
            <i class="bi bi-lightning-charge-fill"></i>
        </div>
        <h2 class="text-center mb-4">Connexion</h2>
        <form method="post" action="auth.php">
            <div class="mb-3">
                <label for="email" class="form-label">Adresse e-mail</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Votre e-mail" required autofocus>
                </div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Votre mot de passe" required>
                </div>
            </div>
            <div class="mb-3 d-flex justify-content-between align-items-center">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="remember" name="remember">
                    <label class="form-check-label" for="remember">
                        Se souvenir de moi
                    </label>
                </div>
                <a href="#" class="small text-primary">Mot de passe oublié ?</a>
            </div>
            <button type="submit" class="btn btn-primary w-100 mb-2">Se connecter</button>
        </form>
        <div class="text-center mt-3">
            <span class="text-muted small">Pas encore de compte ?</span>
            <a href="register.php" class="small text-primary">Créer un compte</a>
        </div>
    </div>
</body>
</html>
