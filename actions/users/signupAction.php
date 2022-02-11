<?php
session_start();
require('actions/database.php');

//Validation du formulaire
if (isset($_POST['validate'])) {

    //Vérifier si l'user a bien complété tous les champs
    if (!empty($_POST['pseudo']) and !empty($_POST['lastname']) and !empty($_POST['firstname']) and !empty($_POST['password']) and !empty($_POST['email']) /* AND !empty($_POST['denomination']) AND !empty($_POST['niveau']) AND !empty($_POST['adresse']) */ and !empty($_POST['code_postal']) and !empty($_POST['commune']) /* AND !empty($_POST['departement']) AND !empty($_POST['region']) */) {

        //Les données de l'user
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_lastname = htmlspecialchars($_POST['lastname']);
        $user_firstname = htmlspecialchars($_POST['firstname']);
        $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user_email = htmlspecialchars($_POST['email']);
        $user_cle = htmlspecialchars($_POST['cle']);
        $user_confirme = htmlspecialchars($_POST['confirme']);


        //Les données de l'école
        /* $user_denomination = htmlspecialchars($_POST['denomination']); */
        /* $user_niveau = htmlspecialchars($_POST['niveau']); */
        /* $user_adresse = htmlspecialchars($_POST['adresse']); */
        $user_code_postal = htmlspecialchars($_POST['code_postal']);
        $user_commune = htmlspecialchars($_POST['commune']);
        /* $user_departement = htmlspecialchars($_POST['departement']);
            $user_region = htmlspecialchars($_POST['region']); */


        //Vérifier si l'utilisateur existe déjà sur le site
        $checkIfUserAlreadyExists = $bdd->prepare('SELECT email FROM users WHERE pseudo = ? AND email = ?');
        $checkIfUserAlreadyExists->execute(array($user_pseudo, $user_email));

        if ($checkIfUserAlreadyExists->rowCount() == 0) {

            //Insérer l'utilisateur dans la bdd 
            $insertUserOnWebsite = $bdd->prepare('INSERT INTO users (pseudo, nom, prenom, mdp, email, cle, confirme, /* denomination, niveau, adresse, */ code_postal, commune/* , departement, region */) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?/* , ?, ? */) ');
            $insertUserOnWebsite->execute(array($user_pseudo, $user_lastname, $user_firstname, $user_password, $user_email, $user_cle, $user_confirme,  /* $user_denomination, $user_niveau, $user_adresse, */ $user_code_postal, $user_commune/* , $user_departement, $user_region */));


            //Récupérer les informations de l'utilisateur (ordre BDD)
            $getInfosOfThisUserReq = $bdd->prepare('SELECT * FROM users WHERE pseudo = ? AND nom = ? AND prenom = ? AND email = ? AND cle = ? AND confirme = ? AND denomination = ? AND /* niveau = ? AND adresse = ? AND */ code_postal = ? AND commune = ? /* AND departement = ? AND region = ? */ ');
            $getInfosOfThisUserReq->execute(array($user_pseudo, $user_lastname, $user_firstname, $user_email, $user_cle, $user_confirme, /* $user_denomination, $user_niveau, $user_adresse, */ $user_code_postal, $user_commune/* , $user_departement, $user_region */));


            $usersInfos = $getInfosOfThisUserReq->fetch();

            //Authentifier l'utilisateur sur le site et récupérer ses données dans des variables globales sessions
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $usersInfos['id'];
            $_SESSION['pseudo'] = $usersInfos['pseudo'];
            $_SESSION['lastname'] = $usersInfos['nom'];
            $_SESSION['firstname'] = $usersInfos['prenom'];
            $_SESSION['email'] = $usersInfos['email'];
            $_SESSION['cle'] = $usersInfos['cle'];
            $_SESSION['confirme'] = $usersInfos['confirme'];

            // Information de l'école renseignée            
            /* $_SESSION['denomination'] = $usersInfos['denomination']; */
            /* $_SESSION['niveau'] = $usersInfos['niveau']; */
            /* $_SESSION['adresse'] = $usersInfos['adresse']; */
            $_SESSION['code_postal'] = $usersInfos['code_postal'];
            $_SESSION['commune'] = $usersInfos['commune'];
            /* $_SESSION['departement'] = $usersInfos['departement'];
                $_SESSION['region'] = $usersInfos['region']; */


            //Rediriger l'utilisateur vers la page d'accueil du forum
            header('Location: forum.php');
            //
        } else {
            $errorMsg = "<br><h5 style='color:red;'>L'utilisateur existe déjà sur le site</h5>";
        }
        // champs non complété
    } else {
        $errorMsg = "<br><h5 style='color:red;'>Veuillez compléter tous les champs...</h5>";
    }
    //
}
