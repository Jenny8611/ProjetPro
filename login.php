<?php
require('actions/users/loginAction.php');
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

    <title>ParentSchool - Connexion</title>
</head>

<body class="is-preload">

    <!----- Wrapper ----->
    <div id="wrapper">
        <?php include_once('includes/header.php'); ?>

        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="cdr-ins">

                        <form method="POST">

                            <h1>Connexion</h1>

                            <?php
                            if (isset($errorMsg)) {
                                echo '<p>' . $errorMsg . '</p>';
                            } ?>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email <span style="color: red;">*</span></label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Mot de passe <span style="color: red;">*</span></label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <br>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-secondary" name="validate">Se connecter</button>
                            </div>
                            <br>
                            <span class="signup"><a href="signup.php">Je n'ai pas de compte je m'inscris.</a></span>
                            <br><br>
                            <span class="oubli"><a href="mot-de-passe-oublie.php">Mot de passe oublié ?</a></span>
                            <!-- fin div container-fluid -->
                        </form>
                    </div><!-- fin cdr -->
                </div><!-- fin col -->
            </div><!-- fin row -->
        </div><!-- fin container -->
    </div><!-- fin wrapper -->

    <br>
    <?php include './includes/footer.php'; ?>
</body>

</html>

<?php


if (isset($_POST['email'], $_POST['password'])) { // correspond aux ["name"] des input
    $stmt = $bdd->prepare('SELECT mdp FROM users WHERE email = ?');
    $stmt->execute([$_POST['email']]);
    $hashedPassword = $stmt->fetchColumn();


    if (password_verify($_POST['password'], $hashedPassword)) {

        echo "Connexion réussie";
    } else {
        echo "Mot de passe incorrect";
    }
}

?>