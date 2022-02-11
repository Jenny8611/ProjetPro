<?php
session_start();
/* require('../actions/users/loginAction.php'); */
require('../actions/database.php');

if (!$_SESSION['pseudo']) { // sécurité = si utilisateur pas de pseudo
    header('Location: connexion.php'); // On le redirige vers la page de connexion
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/main.css" />
    <noscript>
        <link rel="stylesheet" href="../assets/css/noscript.css" />
    </noscript>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    </head>


<body class="is-preload">

    <!----- Wrapper ----->
    <div id="wrapper">
        <?php include_once('../includes/header.php'); ?>


        <nav class="navbar navbar-expand-lg navbar-light bg-dark sticky-top">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

                    <!-- Link gauche -->
                    <ul class="navbar-nav mr-auto">
                        <?php
                        if (!isset($_SESSION['pseudo'])) { // Si pas de session active (non-connecté)
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/index.php">Quitter le forum</a>
                            </li>
                        <?php
                        } else { // Si utilisateur connecté
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" href="../forum.php">Accueil forum</a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>

                    <!-- link central -->
                    <ul class="navbar-nav auto">
                        <?php
                        if (!isset($_SESSION['pseudo'])) { // Si pas de session active
                        ?>

                        <?php
                        } else { // si utilisateur connecté
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/forum.php">Forum</a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>

                    <!-- link droite -->
                    <ul class="navbar-nav ml-md-auto">
                        <?php
                        if (!isset($_SESSION['pseudo'])) { // Si pas de session active
                        ?>
                            <li class="nav-item">
                                <a href="../messages prives/connexion.php">Se connecter</a>
                            </li>
                        <?php
                        } else { // si utilisateur connecté
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" href="../logout.php">Déconnexion</a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
        </nav>


        <div id="main">
            <br><br>
            <h2 style="text-align: center">Messagerie</h2>
            <br>
            <h3>Bonjour <?php echo $_SESSION['pseudo']; ?>, à qui souhaitez-vous écrire aujourd'hui ?</h3>
            <br>

            <?php
            $recupUser = $bdd->query("SELECT * FROM users "); //
            while ($user = $recupUser->fetch()) { // tant qu'utilisateur correspond à la requête, on recupère les données
            ?>
                <a href="message.php?id= <?php echo $user['id']; ?>">
                    <p>&bull; <?php echo $user['pseudo'] . " " . "(id" . $user['id'] . ")"; ?></p>
                </a>
            <?php
            }
            ?>
        </div>


</body>

</html>