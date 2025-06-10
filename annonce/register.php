
<?php
// register.php : Page d'inscription Bootstrap moderne et responsive
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creer Annonce - UConnect</title>
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
        <h2 class="text-center mb-4">Créer une annonce</h2>
        <form method="POST" action="./traitement.php" enctype="multipart/form-data">

            <div class="mb-3">
                <label for="titre" class="form-label">Titre</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control" id="titre" name="titre" placeholder="le titre d'annonce" required>
                </div>

                <label for="description" class="form-label">Description</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="text" class="form-control" id="description" name="description" placeholder="La description de l'annonce" required>
                </div>
            </div>
            
            <div class="mb-3">
                <label for="i_mage" class="form-label">L'image de l'annonce</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="file" class="form-control" id="i_mage" name="i_mage" >
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary w-100 mb-2">Creer</button>
        </form>
        <div class="text-center mt-3">
        </div>
    </div>
</body>
</html>
