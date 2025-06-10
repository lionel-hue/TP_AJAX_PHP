<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Dashboard </title>
    <!-- Bootstrap 5 -->
    <link href="../asset/css/bootstrap.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="../asset/icons/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="../asset/css/style.css">

</head>

<body>
    <!-- Sidebar -->
    <nav class="sidebar d-flex flex-column position-fixed" id="sidebar">
        <div class="sidebar-header d-flex align-items-center">
            <i class="bi bi-lightning-charge-fill"></i>
            <span>UConnect</span>
            <button class="sidebar-toggler d-none d-lg-inline" id="sidebarCollapse" title="Réduire le menu">
                <i class="bi bi-chevron-double-left"></i>
            </button>
        </div>

        <ul class="nav flex-column px-2 mt-3">
            <?php
            $currentPage = basename($_SERVER['PHP_SELF']);
            ?>
            <li class="nav-item">
                <a href="./index.php" class="nav-link <?php echo ($currentPage === 'index.php') ? 'active' : ''; ?>">
                    <i class="bi bi-house-door"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            
            <li class="nav-item">
            <a href="./users.php" class="nav-link <?php echo ($currentPage === 'users.php') ? 'active' : ''; ?>">
                    <i class="bi bi-people"></i>
                    <span>Utilisateurs</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="./annonce.php"
                    class="nav-link <?php echo ($currentPage === 'parametres.php') ? 'active' : ''; ?>">
                    <i class="bi bi-gear"></i>
                    <span>Annonces</span>
                </a>
            </li>
        </ul>

    </nav>
    <div class="overlay" id="sidebarOverlay"></div>
    <!-- Main content -->
    <div class="main-content min-vh-100">
        <!-- Header -->
        <header class="dashboard-header">
            <button class="btn-burger d-lg-none" id="sidebarMobileBtn" title="Menu">
                <i class="bi bi-list"></i>
            </button>
            <h1 class="h5 mb-0">Bienvenue sur le Dashboard</h1>
          <div class="user-info">
                <img src="../asset/images/avatar.jpeg" alt="Avatar">
                <span>
                 <?php
                    if (isset($_SESSION['auth']) && $_SESSION['auth'] === true) {
                        echo htmlspecialchars($_SESSION['user']['prenom'] . ' ' . $_SESSION['user']['nom']);
                    } else {
                        echo "Admin";
                    }
                    ?>
             </span>

                </span>
                <a href="logout.php" class="btn btn-outline-primary btn-sm">Déconnexion</a>
            </div>
        </header>
        <main class="container py-4" id="dashboard-content">

            <div class="row g-4">