
<?php
// register.php : Page d'inscription Bootstrap moderne et responsive
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - MonApp</title>
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
        .register-card {
            background: #fff;
            border-radius: 1.2rem;
            box-shadow: 0 4px 32px rgba(80,120,200,0.13);
            padding: 2.5rem 2rem;
            max-width: 600px;
            width: 100%;
        }
        .register-card .form-control:focus {
            border-color: #4f8cff;
            box-shadow: 0 0 0 0.2rem rgba(79,140,255,.15);
        }
        .register-card .logo {
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
        .register-card .btn-primary {
            background: linear-gradient(90deg, #4f8cff 0%, #3358d1 100%);
            border: none;
        }
        .register-card .btn-primary:hover {
            background: linear-gradient(90deg, #3358d1 0%, #4f8cff 100%);
        }
        @media (max-width: 575.98px) {
            .register-card {
                padding: 2rem 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="register-card shadow">
        <div class="logo mb-3">
            <i class="bi bi-person-plus-fill"></i>
        </div>
        <h2 class="text-center mb-4">Créer un compte</h2>
        <form method="post" action="./traitement.php" id="formulaire">
            <div class="mb-3">
                <label for="firstname" class="form-label">Prénom</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Votre prénom" required>
                    <div class="erreur" id="erreurPrenom"></div>
                </div>
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Nom</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Votre nom" required>
                    <div class="erreur" id="erreurNom"></div>
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Adresse e-mail</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Votre e-mail" required>
                    <div class="erreur" id="erreurEmail"></div>
                </div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" required>
                    <div class="erreur" id="erreurMotdepasse"></div>
                </div>
            </div>
            <div class="mb-3">
                <label for="password_confirm" class="form-label">Confirmer le mot de passe</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                    <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Confirmez le mot de passe" required>
                    <div class="erreur" id="erreurConfirm_password"></div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100 mb-2">S'inscrire</button>
        </form>
        <div class="text-center mt-3">
            <span class="text-muted small">Déjà un compte ?</span>
            <a href="login.php" class="small text-primary">Se connecter</a>
        </div>
    </div>


    <script>
  document.getElementById("formulaire").addEventListener("submit", function(e) {
    e.preventDefault(); // Empêche l'envoi automatique

    // Récupérer les champs
    const prenom = document.getElementById("firstname").value.trim();
    const nom = document.getElementById("lastname").value.trim();
    const email = document.getElementById("email").value.trim();
    const motdepasse = document.getElementById("password").value;
    const confirmation = document.getElementById("password_confirm").value;

    // Récupérer les zones d'erreur
    const erreurPrenom = document.getElementById("erreurPrenom");
    const erreurNom = document.getElementById("erreurNom");
    const erreurEmail = document.getElementById("erreurEmail");
    const erreurMotdepasse = document.getElementById("erreurMotdepasse");
    const erreurConfirm = document.getElementById("erreurConfirm_password");

    // Réinitialiser les messages d’erreur
    erreurPrenom.textContent = "";
    erreurNom.textContent = "";
    erreurEmail.textContent = "";
    erreurMotdepasse.textContent = "";
    erreurConfirm.textContent = "";

    let formulaireValide = true;

    // Validation prénom (pas de chiffres)
    if (/\d/.test(prenom)) {
      erreurPrenom.textContent = "Le prénom ne doit pas contenir de chiffres.";
      formulaireValide = false;
    }

    // Validation nom (pas de chiffres)
    if (/\d/.test(nom)) {
      erreurNom.textContent = "Le nom ne doit pas contenir de chiffres.";
      formulaireValide = false;
    }

    // Validation email avec Regex
    const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!regexEmail.test(email)) {
      erreurEmail.textContent = "L'adresse email n'est pas valide.";
      formulaireValide = false;
    }

    // Validation mot de passe (au moins 8 caractères)
    if (motdepasse.length < 8) {
      erreurMotdepasse.textContent = "Le mot de passe doit contenir au moins 8 caractères.";
      formulaireValide = false;
    }

    // Confirmation du mot de passe
    if (motdepasse !== confirmation) {
      erreurConfirm.textContent = "Les mots de passe ne correspondent pas.";
      formulaireValide = false;
    }

    // Si tout est bon
    if (formulaireValide) {
      alert("Formulaire validé avec succès !");
    
    }
  });
</script>

</body>
</html>
