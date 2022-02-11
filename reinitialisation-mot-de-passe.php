<?php
// Ceci est générique. Il s'agit de se connecter à la base de données
$host = 'localhost';
$dbname = 'phrk9480_parentschool';
$user = 'phrk9480_JennyAll';
$mdp = 'Z[K6tCeQ!W+J';
 
$db = new PDO('mysql:host'.$host.';'.$dbname, $user, $mdp);
 
// Variable utilisé pour afficher une notification d'erreur ou de succès
$msg = '';
 
if (empty($_GET['token'])) {	// Si aucun token n'est spécifié en paramètre de l'URL
	echo 'Aucun token n\'a été spécifié';
	exit;
}
 
// On récupère les informations par rapport au token dans la base de données
$query = $db->prepare(
    'SELECT mdp_recovery_asked_date 
    FROM users 
    WHERE mdp_recovery_token = ?');
    
$query->bindValue(1, $_GET['token']);
$query->execute();
 
$row = $query->fetch(PDO::FETCH_ASSOC);
 
if (empty($row)) {	// Si aucune info associée au token n'est trouvé
	echo 'Ce token n\'a pas été trouvé';
	exit;
}
 
// On calcul la date de la génération du token + 3hrs
$tokenDate = strtotime('+3 hours', strtotime($row['mdp_recovery_asked_date']));
$todayDate = time();
 
if ($dateToken < $dateToday) {	// Si la date est dépassé le délais de 3hrs
	echo 'Token expiré !';
	exit;
}
 
if (!empty($_POST)) {	// Si le formulaire a été soumis
	if (!empty($_POST['mdp']) && !empty($_POST['mdp_confirm'])) {	// Si le formulaire est correctement remplit
		
		if ($_POST['mdp'] === $_POST['mdp_confirm']) {	// Si les deux mots de passes sont les mêmes
		
			// On hash le mot de passe
			$mdp = mdp_hash($_POST['mdp'], PASSWORD_DEFAULT);
 
			// On modifie les informations dans la base de données
			$query = $db->prepare(
			    'UPDATE users 
			    SET mdp = ?, mdp_recovery_token = "" 
			    WHERE mdp_recovery_token = ?');
			    
			$query->bindValue(1, $mdp);
			$query->bindValue(1, $_GET['token']);
			$query->execute();
 
			$msg = '<div style="color: green;">Le mot de passe a été changé !</div>';
		} else {	// si les deux mots de passe ne sont pas identiques
			$msg = '<div style="color: red;">Les deux mots de passes ne sont pas identiques.</div>';
		}
	} else {
		$msg = '<div style="color: red;">Veuillez remplir tous les champs du formulaire.</div>';
	}
}
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
    <title>ParentSchool - Réinitialisation de mot de passe</title>
</head>

<body class="is-preload">

    <!----- Wrapper ----->
    <div id="wrapper">
        <?php include_once('includes/header.php'); ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="cdr-ins">
                        <h1>Réinitialiser le mot de passe</h1>
                         
                        <?php echo $msg; ?>
                         
                        <form action="reinitialisation-mot-de-passe.php?token=<?php echo $_GET['token']; ?>" method="post">
                        	<label>Mot de passe : <input type="mdp" name="mdp" value="" /></label><br />
                        	<label>Confirmation du mot de passe : <input type="mdp" name="mdp_confirm" value="" /></label><br />
                        	<button type="submit">Changer le mot de passe</button>
                        </form>
                        <a href="forum.php">
                            <-- Retour</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php include('includes/footer.php') ?>

</body>

</html>