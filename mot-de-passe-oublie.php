<?php
include('actions/database.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/main.css" />
    <noscript>
        <link rel="stylesheet" href="assets/css/noscript.css" />
    </noscript>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <title>ParentSchool - Demande d'un nouveau mot de passe</title>
</head>

<body class="is-preload">

    <!----- Wrapper ----->
    <div id="wrapper">
        <?php include_once('includes/header.php'); ?>

        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="cdr-ins">

                        <form method="post">

                            <h1>Demande d'un nouveau mot de passe</h1>

                            <div class="mb-3">
                                <?php

                                if (isset($_POST['email'])) {

                                    $token = uniqid();
                                    $url = "https://parentschool.fr/token?token=$token";

                                    $From = "contacts@parentschool.fr";
                                    $message = "Bonjour,<br/><br/>Suite à votre demande sur le forum https://parentschool.fr, voici votre lien pour la réinitialisation de votre mot de passe :<br/><br/> $url <br/><br/>Si le lien ne fonctionne pas, copier/coller celui-ci dans votre barre de navigation.
                                    <br/><br/>Nous vous présentons nos meilleures salutations.<br/><br/>
                                    L'équipe ParentSchool";

                                    $headers = "From: " . $From . "\r\n";
                                    $headers .= 'Content-type: text/html; charset=utf8';

                                    if (mail($_POST['email'], 'Réinitialisation du mot de passe', $message, $headers)) {

                                        $sql = "UPDATE users SET token = ? WHERE email = ?";
                                        $stmt = $bdd->prepare($sql);
                                        $stmt->execute([$token, $_POST['email']]);
                                        echo "<h5 style='color:green;'><br>Le mail a bien été envoyé à l'adresse indiquée ! <br> Vérifiez vos mails et vos spams d'ici quelques minutes.";
                                    } else {
                                        echo "Une erreur est survenue...";
                                    }
                                }

                                ?>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label"><b>Email <span style="color: red;">*</span></b></label>
                                <input type="email" class="form-control" placeholder="Votre email" name="email" required>
                            </div>

                            <div class="mb-3">
                                <button type="submit">Envoyer la demande</button>
                            </div>
                            <br>
                            <span class="retour"><a href="login.php">Retour</a></span>

                        </form>
                    </div><!-- fin cdr -->
                </div><!-- fin col -->
            </div><!-- fin row -->
        </div><!-- fin container -->
    </div><!-- fin wrapper -->

    <?php include('includes/footer.php') ?>

</body>

</html>