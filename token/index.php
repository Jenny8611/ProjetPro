<?php

include '../actions/database.php';


if (isset($_GET['token']) && $_GET['token'] != '') {

    $stmt = $bdd->prepare('SELECT email FROM users WHERE token = ?');
    $stmt->execute([$_GET['token']]);
    $email = $stmt->fetchColumn();


    if ($email) {

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

            <title>Nouveau mot de passe</title>
        </head>

        <body class="is-preload">

            <!----- Wrapper ----->
            <div id="wrapper">
                <?php include_once('../includes/header.php'); ?>

                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="cdr-ins">

                                <form method="post" action="../login.php">

                                    <h1>Réinitialisez votre mot de passe</h1>

                                    <div class="mb-3">
                                <?php
                            }
                        }

                        if (isset($_POST['newPassword'])) {

                            $hashedPassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
                            $sql = "UPDATE users SET mdp = ?, token = NULL WHERE email = ?";
                            $stmt = $bdd->prepare($sql);
                            $stmt->execute([$hashedPassword, $email]);

                            echo "<h5 style='color:green;'>Le mot de passe a été modifié avec succès !</h5><br><h6>Cliquez <a href=\"../login.php\" style='color:orange;'>ici</a> pour être redirigé vers la page de connexion.</h6>";
                        }

                                ?>
                                    </div>

                                    <div class="mb-3">
                                        <label for="newPassword" class="form-label">Nouveau mot de passe:</label>
                                        <input type="password" class="form-control" name="newPassword" placeholder="Entrer nouveau mot de passe">
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit">Confirmer</button>
                                    </div>
                                    <br>
                                    <!-- <span class="login">
                                        <a href="../login.php">Connectez-vous avec votre nouveau mot de passe</a>
                                    </span> -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </body>

        </html>