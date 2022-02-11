<?php

session_start();
require('actions/database.php');
/* print_r($bdd); */

//Validation du formulaire
if (isset($_POST['validate'])) {

    //Vérifier si l'user a bien complété tous les champs
    if (!empty($_POST['email']) and !empty($_POST['password'])) {

        //Les données de l'user
        $user_email = htmlspecialchars($_POST['email']);
        $user_password = htmlspecialchars($_POST['password']);

        //Vérifier si l'utilisateur existe (si le email est correct)
        $checkIfUserExists = $bdd->prepare('SELECT * FROM users WHERE email = ? ');
        $checkIfUserExists->execute(array($user_email));

        if ($checkIfUserExists->rowCount() > 0) {

            //Récupérer les données de l'utilisateur
            $usersInfos = $checkIfUserExists->fetch();

            //Vérifier si le mot de passe est correct
            if (password_verify($user_password, $usersInfos['mdp'])) {

                //Authentifier l'utilisateur sur le site et récupérer ses données dans des variables globales sessions
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $usersInfos['id'];
                $_SESSION['lastname'] = $usersInfos['nom'];
                $_SESSION['firstname'] = $usersInfos['prenom'];
                $_SESSION['email'] = $usersInfos['email'];
                $_SESSION['pseudo'] = $usersInfos['pseudo'];

                //Rediriger l'utilisateur vers la page d'accueil
                header('Location: forum.php');
            } else {
                $errorMsg = "<p style='color:red;'>Le mot de passe est incorrect...</p>";
            }
        } else {
            $errorMsg = "<p style='color:red;'>Votre email est incorrect...</p>";
        }
    } else {
        $errorMsg = "<p style='color:red;'>Veuillez completer tous les champs...</p>";
    }
}
