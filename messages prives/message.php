<?php
session_start();
require('../actions/database.php');

if (!$_SESSION['pseudo']) { // Si pseudo bien rentré
    header('Location: connexion.php'); // sinon redirigé vers la page connexion.php
}

if (isset($_GET['id']) and !empty($_GET['id'])) { // si getid est bien rentré AND si variable id passée en paramètre et pas vide sinon message erreur "aucun identifiant trouvé"


    $getid = $_GET['id'];
    $recupUser = $bdd->prepare("SELECT * FROM users WHERE id = ? "); // si id correspond à un identifiant d'un utilisateur rentré sur le site
    $recupUser->execute(array($getid)); // 
    if ($recupUser->rowCount() > 0) { // si on trouve bien un utilisateur sinon message erreur "aucun utilisateur trouvé"


        if (isset($_POST['envoyer'])) { // je vérifie si l'utilisateura cliqué sur "envoyer"

            $message = htmlspecialchars($_POST['message']); // je stock le message       
            $insererMessage = $bdd->prepare("INSERT INTO message(message, id_destinataire, id_auteur/* , date_message */)VALUES(?, ?, ?/* , ? */) "); // insérer le message dans la bdd
            $insererMessage->execute(array($message, $getid, $_SESSION['id']/* , $date_message */)); // j'execute la requête, et je récupère le message qui correspond au message (=message/id_destinataire (utilisateur)/id_auteur) 
        }
    } else {
        echo "Aucun utilisateur trouvé";
    }
} else {
    echo "Aucun identifiant trouvé";
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

    <title>ParentSchool - Message privé</title>
</head>


<body class="is-preload">
    <!----- Wrapper ----->
    <div id="wrapper">
        <?php include_once('../includes/header.php'); ?>

        <!----- Main ----->
        <div id="main">
            <button><a href="../forum.php">
                    <-- Accueil forum</a></button>


            <div class="container align-center">
                <h1>Bonjour <?= $_SESSION['pseudo'] . " " . "(id" . $_SESSION['id'] . ")"; ?></h1>

                <h2>Ecrivez votre message à <?= "(id" . $getid . ")"; ?></h2>

                <form method="POST" action="">
                    <textarea name="message"></textarea>
                    <br /><br />
                    <input type="submit" name="envoyer">
                </form>


                <section id="messages">
                    <?php

                    $recupMessages = $bdd->prepare("SELECT * FROM message WHERE id_auteur = ? AND id_destinataire = ? /* AND date_message = ? */ OR id_auteur = ? AND id_destinataire = ? /* AND date_message = ? */ ORDER BY id DESC LIMIT 0,5"); // récupère le message en fonction de l'identifiant de l'auteur (connecté au niveau de la session) et l'identifiant du destinataire ($getid)
                    $recupMessages->execute(array($_SESSION['id'], $getid, $getid, $_SESSION['id'])); // session_id = id_auteur, $getid = destinataire
                    while ($message = $recupMessages->fetch()) {  // pour chaque message récupéré
                        if ($message['id_destinataire'] == $_SESSION['id']) {
                    ?>
                            <p style="color:orange;background-color:grey"> <?= $message['message']; ?><br> Reçu de : <?= $getid ?> <br> <!-- Le <?= $date_message ?> -->
                            </p> <!-- stock message utilisateur -->
                        <?php
                        } elseif ($message['id_destinataire'] == $getid) {
                        ?>
                            <p style="color:white;Background-color:black"> <?= $message['message']; ?><br> Envoyé à : <?= $getid ?> <br> <!-- Le <?= $date_message ?> -->
                            </p>
                    <?php
                        }
                    }
                    ?>

                </section>
            </div><!-- fin div container -->
        </div><!-- fin div main -->
    </div>
    <?php include '../includes/footer.php'; ?>
</body>

</html>