<?php

require('actions/database.php');

//Récupérer l'identifiant de l'utilisateur
if (isset($_GET['id']) and !empty($_GET['id'])) {

    //L'id de l'utilisateur
    $idOfUser = $_GET['id'];

    //Vérifier si l'utilisateur existe
    $checkIfUserExists = $bdd->prepare('SELECT pseudo, nom, prenom, email, commune, code_postal/* , adresse, niveau */ FROM users WHERE id = ?');
    $checkIfUserExists->execute(array($idOfUser));

    if ($checkIfUserExists->rowCount() > 0) {

        //Récupérer toutes les données de l'utilisateur
        $usersInfos = $checkIfUserExists->fetch();

        $user_pseudo = $usersInfos['pseudo'];
        $user_lastname = $usersInfos['nom'];
        $user_firstname = $usersInfos['prenom'];
        $user_email = $usersInfos['email'];

        // Information école
        /* $user_denomination = $usersInfos['denomination'];
        $user_niveau = $usersInfos['niveau'];
        $user_adresse = $usersInfos['adresse']; */
        $user_code_postal = $usersInfos['code_postal'];
        $user_commune = $usersInfos['commune'];
        /* $user_departement = $usersInfos['departement'];
        $user_region = $usersInfos['region']; */


        //Récupérer toutes les questions publiées par l'utilisateur
        $getHisQuestions = $bdd->prepare('SELECT * FROM questions WHERE id_auteur = ? ORDER BY id ASC');
        $getHisQuestions->execute(array($idOfUser));
    } else {
        $errorMsg = "Aucun utilisateur trouvé";
    }
} else {
    $errorMsg = "Aucun utilisateur trouvé";
}
