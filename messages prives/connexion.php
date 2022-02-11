<?php
session_start();
require('../actions/database.php');


if (isset($_POST['valider'])) { // Quand l'utilisateur clique sur valider
    if (!empty($_POST['pseudo'])) { // On vérifie qu'il ait bien rentré son pseudo sinon message erreur "veuillez rentrer votre pseudo"


        $recupUser = $bdd->prepare(" SELECT * FROM users WHERE pseudo = ? "); // on slectionne tous les utilisateur de la table users
        $recupUser->execute(array($_POST['pseudo'])); // je stock dans un tableau, on spécifie le pseudo

        if ($recupUser->rowCount() > 0) { // si on trouve un utilisateur correspond (superieur à 0) sinon message erreur "aucun utilisateur trouvé"

            $_SESSION['pseudo'] = $_POST['pseudo']; // une fois utilisateur trouvé : déclare la session "pseudo" correspondant au pseudo récupérer par l'utilisateur
            $_SESSION['id'] = $recupUser->fetch()['id']; // Si correspond à la requête = fetch, récupère toutes données de recupUser
            header('Location: index.php'); // une fois connecté redirige vers la page d'accueil
        } else {
            echo "Aucun utilisateur trouvé"; // correspond ligne 13
        }
    } else {
        echo "Veuillez rentrer votre pseudo"; // correspon ligne 7
    }
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
    <title>ParentSchool - Espace de connexion messages</title>
</head>

<body class="is-preload">

    <!----- Wrapper ----->
    <div id="wrapper">
        <?php include_once('../includes/header.php'); ?>

        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="cdr-ins">

                        <form method="POST">

                            <h1>Connexion messagerie privée</h1>
                            <?php
                            if (isset($errorMsg)) {
                                echo '<p>' . $errorMsg . '</p>';
                            } ?>


                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Pseudo <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" name="pseudo" placeholder="Entrer votre pseudo">
                            </div>
                            <div class="mb-3">
                                <label for="exempleInputEmail1" class="form-label">Mot de passe <span style="color: red;">*</span></label>
                                <input type="password" class="form-control" name="password" placeholder="Mot de passe">
                            </div>
                            <br />
                            <button type="submit" class="btn btn-secondary" name="valider">Rentrer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php include '../includes/footer.php'; ?>

</html>