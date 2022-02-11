<?php

require('actions/database.php');

//Vérifier si l'id de l'utilisateur est bien passé en paramêtre dans l'URL
if (isset($_GET['id']) and !empty($_GET['id'])) {

    $idOfUser = $_GET['id'];

    //Vérifier si l'utilisateur existe
    $checkIfuserExists = $bdd->prepare('SELECT * FROM users WHERE id = ?');
    $checkIfuserExists->execute(array($idOfUser));

    if ($checkIfuserExists->rowCount() > 0) {

        //Récupérer les données de l'utilisateur
        $infosUser = $checkIfuserExists->fetch();
        if ($infosUser['id'] == $_SESSION['id']) {

            $lastname_user = $infosUser['nom'];
            $firstname_user = $infosUser['prenom'];
            $email_user = $infosUser['email'];

            $user_firstname = str_replace('<br />', '', $user_firstname);
            $user_mail = str_replace('<br />', '', $user_mail);
        } else {
            $errorMsg = "Vous n'êtes pas le propriétaire de ce profil";
        }
    } else {
        $errorMsg = "Aucune propriétaire n'a été trouvé";
    }
} else {
    $errorMsg = "Aucune propriétaire n'a été trouvé";
}
