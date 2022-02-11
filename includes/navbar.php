<nav class="navbar navbar-expand-lg navbar-light bg-dark sticky-top">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">

            <!-- Link gauche -->
            <ul class="navbar-nav mr-auto">
                <?php
                if (!isset($_SESSION['auth'])) { // Si pas de session active (non-connecté)
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Quitter le forum</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/forum.php">Forum accueil</a>
                    </li>
                <?php
                } else { // Si utilisateur connecté
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php?id=<?= $_SESSION['id']; ?>">Mon profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="my-questions.php?id=<?= $_SESSION['id']; ?>">Mes questions</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="messages prives/connexion.php">Mes messages</a>
                    </li> -->
                <?php
                }
                ?>
            </ul>

            <!-- link central -->
            <ul class="navbar-nav auto">
                <?php
                if (!isset($_SESSION['auth'])) { // Si pas de session active
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="mot-de-passe-oublie.php">Mot de passe oublié</a>
                    </li>
                <?php
                } else { // si utilisateur connecté
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="forum.php">Accueil forum</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="publish-question.php">Publier une question</a>
                    </li>
                <?php
                }
                ?>
            </ul>

            <!-- link droite -->
            <ul class="navbar-nav ml-md-auto">
                <?php
                if (!isset($_SESSION['auth'])) { // Si pas de session active
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Se connecter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signup.php">Créer un compte</a>
                    </li>
                <?php
                } else { // si utilisateur connecté
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Déconnexion</a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>