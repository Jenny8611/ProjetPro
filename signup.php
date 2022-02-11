<?php
require('actions/users/signupAction.php');
require('./actions/database.php');

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

    <title>ParentSchool - Inscription</title>


<body class="is-preload">

    <!----- Wrapper ----->
    <div id="wrapper">
        <?php include_once('includes/header.php'); ?>

        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="cdr-ins">

                        <!-- INFORMATION SUR L'UTILISATEUR -->
                        <form method="POST" action="">

                            <h1>Inscription</h1>
                            <small>
                                <p style="color: red;">Tous les champs sont obligatoires</p>
                            </small>
                            <?php
                            if (isset($errorMsg)) {
                                echo '<p>' . $errorMsg . '</p>';
                            }
                            ?>

                            <div class="form-group">
                                <label for="validationDefault01" class="form-label">Pseudo <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" name="pseudo" required>
                            </div>
                            <div class="form-group">
                                <label for="validationDefault02" class="form-label">Nom <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" name="lastname" required>
                            </div>
                            <div class="form-group">
                                <label for="validationDefault03" class="form-label">Prénom <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" name="firstname" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputMail1" class="form-label">Mail <span style="color: red;">*</span></label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="InputPassword1" class="form-label">Password <span style="color: red;">*</span></label>
                                <input type="password" class="form-control" name="password" required>
                            </div>

                            <br>
                            <br>
                            <br>

                            <!-- INFORMATIONS SUR L'ECOLE -->
                            <h2 style="text-align:center">Renseignements sur l'école de votre enfant</h2>

                            <!-- <div class="container-fluid py-5"> -->

                            <!-- DENOMINATION -->
                            <!-- <div class="form-group">
                                <label for="denomination">Dénomination de l'école <span style="color: red;">*</span> :</label>
                                <br>
                                <input list="denomination_ecole" name="denomination" placeholder="Taper un bout du nom ou commune" />
                                <datalist id="denomination_ecole">
                                    <?php
                                    $reponse = $bdd->query('SELECT denomination FROM liste_ecoles GROUP BY denomination ');
                                    while ($donnees = $reponse->fetch()) {
                                    ?>
                                        <option value="<?php echo $donnees['denomination']; ?>">
                                            <?php echo $donnees['denomination']; ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </datalist>
                            </div> -->

                            <!-- NIVEAU DE L'ENFANT -->
                            <!-- <div class="form-group">
                <label for="niveau">En quelle classe est votre enfant ? :</label>
                <input list="niveau_ecole" name="niveau" placeholder="Taper ou rechercher dans la liste" />

                <datalist id="niveau_ecole">
                    <?php
                    $reponse = $bdd->query('SELECT nom FROM niveau_ecole ');
                    while ($donnees = $reponse->fetch()) {
                    ?>
                        <option value="<?php echo $donnees['nom']; ?>">
                            <?php echo $donnees['nom']; ?>
                        </option>
                    <?php
                    }
                    ?>
                </datalist>
            </div> -->

                            <!-- ADRESSE -->
                            <!-- <div class="form-group">
                                <label for="adresse">Adresse de l'école <span style="color: red;">*</span> :</label>
                                <br>
                                <input list="adresse_ecole" name="adresse" placeholder="Taper un bout de l'adresse" />

                                <datalist id="adresse_ecole">
                                    <?php
                                    $reponse = $bdd->query('SELECT adresse FROM liste_ecoles GROUP BY adresse');
                                    while ($donnees = $reponse->fetch()) {
                                    ?>
                                        <option value="<?php echo $donnees['adresse']; ?>">
                                            <?php echo $donnees['adresse']; ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </datalist>
                            </div> -->

                            <!-- CODE POSTAL -->
                            <div class="form-group">
                                <label for="code_postal">Entrer votre code postal <span style="color: red;">*</span> :</label>
                                <br>
                                <input list="code_postal_ecole" name="code_postal" placeholder="taper votre code postal" />

                                <datalist id="code_postal_ecole">
                                    <?php
                                    $reponse = $bdd->query('SELECT code_postal FROM liste_ecoles GROUP BY code_postal');
                                    while ($donnees = $reponse->fetch()) {
                                    ?>
                                        <option value="<?php echo $donnees['code_postal']; ?>">
                                            <?php echo $donnees['code_postal']; ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </datalist>
                            </div>

                            <!-- COMMUNE -->
                            <div class="form-group">
                                <label for="commune">Entrer votre commune <span style="color: red;">*</span> :</label>
                                <br>
                                <input list="commune_ecole" name="commune" placeholder="taper la commune" />

                                <datalist id="commune_ecole">
                                    <?php
                                    $reponse = $bdd->query('SELECT commune FROM liste_ecoles GROUP BY commune');
                                    while ($donnees = $reponse->fetch()) {
                                    ?>
                                        <option value="<?php echo $donnees['commune']; ?>">
                                            <?php echo $donnees['commune']; ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </datalist>
                            </div>

                            <!-- DEPARTEMENT -->
                            <!-- <div class="form-group">
                <label for="departement">Entrer votre departement :</label>
                <input list="departement_ecole" name="departement" placeholder="Haute-Savoie ?" />

                <datalist id="departement_ecole">
                    <?php
                    $reponse = $bdd->query('SELECT departement FROM liste_ecoles ');
                    while ($donnees = $reponse->fetch()) {
                    ?>
                        <option value="<?php echo $donnees['departement']; ?>">
                            <?php echo $donnees['departement']; ?>
                        </option>
                    <?php
                    }
                    ?>
                </datalist>
            </div> -->

                            <!-- REGION -->
                            <!-- <div class="form-group">
                <label for="region">Entrer votre region :</label>
                <input list="region_ecole" name="region" placeholder="Auvergne-Rhône-Alpes ?" />

                <datalist id="region_ecole">
                    <?php
                    $reponse = $bdd->query('SELECT region FROM liste_ecoles ');
                    while ($donnees = $reponse->fetch()) {
                    ?>
                        <option value="<?php echo $donnees['region']; ?>">
                            <?php echo $donnees['region']; ?>
                        </option>
                    <?php
                    }
                    ?>
                </datalist>
            </div> -->

                            <br><br>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-secondary" name="validate">S'inscrire !</button>
                            </div>
                            <span class="login"><a href="login.php">J'ai déjà un compte. Je me connecte !</a></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <?php include './includes/footer.php'; ?>
</body>

</html>