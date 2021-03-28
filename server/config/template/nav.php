<header class="header">
    <nav class="nav">
        <a class="logo" href="#">LOCKY</a>
        <ul class="nav-menu">
            <li><a href="index.php">Accueil</a></li>
            <li><a href="inscription.php">Inscription</a></li>
            <li><a href="login.php">Login</a></li>
            <?php if (isset($_SESSION['loggedin']) && ($_SESSION['loggedin'] == true) && ($_SESSION['role'] == 0)) {
                echo '<li><a href="profil.php">Profil</a></li>';
            };
            ?>
            <?php if (isset($_SESSION['loggedin']) && ($_SESSION['loggedin'] == true) && ($_SESSION['role'] == 1)) {
                echo '<li><a href="admin.php">Admin</a></li>';
            };
            ?>
<<<<<<< HEAD
            <li><a href="addpanier.php">Panier</a></li>
=======
            <li><a href="panier.php">Panier</a></li>
>>>>>>> 64b87debf4cb358f5a74cd27c1565c57122d067e
        </ul>
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>
</header>