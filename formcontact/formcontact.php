<?php

//Base de donnée
if (!empty($_POST["send"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    $connexion = mysqli_connect("localhost", "phrk9480_jenny", "TiMyaBou867311", "phrk9480_contact_form") or die("Erreur de connexion: " . mysqli_error($connexion));
    $result = mysqli_query($connexion, "INSERT INTO contact (name, email, subject, message) VALUES ('" . $name . "', '" . $email . "', '" . $subject . "', '" . $message . "')");

    if ($result) {
        $db_msg = "Vos informations de contact ont bien été enregistrées avec succés.";
        $type_db_msg = "success";
    } else {
        $db_msg = "Erreur lors de la tentative d'enregistrement de contact.";
        $type_db_msg = "error";
    }
}


//l'envoie du mail
if (!empty($_POST["send"])) {
    $name = strtoupper($_POST["name"]);
    $email = $_POST["email"];
    $subject = ucwords($_POST["subject"]);
    $message = ucwords($_POST["message"]);

    $toEmail = "contacts@parentschool.fr";
    $mailHeaders = "From: " . $name . "<" . $email . ">\r\n";

    if (mail($toEmail, $subject, $message, $mailHeaders)) {
        $mail_msg = "Mme, Mr {$name}, votre message nous est bien parvenu !";
        $type_mail_msg = "success";
    } else {
        $mail_msg = "Erreur lors de l'envoi de l'e-mail.";
        $type_mail_msg = "error";
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
    <script type="text/javascript" src="contact.js"></script>

    <title>ParentSchool - Formulaire de contact</title>
</head>

<body class="is-preload">

    <!----- Wrapper ----->
    <div id="wrapper">
        <?php include_once('header_contact.php'); ?>
        <div class="row">
            <div class="container">
                <div class="cdr-ins">

                    <form id="form" enctype="multipart/form-data" onsubmit="return validate()" method="post">

                        <h1>Contactez-nous</h1>
                        <h4>et faites-nous part de tous ce qui pourraient vous être utile !</h4>
                        <br>

                        <div id="statusMessage">
                            <?php
                            if (!empty($db_msg)) {
                            ?>
                                    <p style="color:green" class='<?php echo $type_db_msg; ?> Message'><?php echo $db_msg; ?></p>
                                    <?php
                                }
                                    ?>
                                    <?php
                                    if (!empty($mail_msg)) {
                                    ?>
                                            <p style="color:green" class='<?php echo $type_mail_msg; ?> Message'><?php echo $mail_msg; ?></p>
                                    <?php
                                    }
                                    ?>
                        </div> <!-- FIN div status message -->

                        <!-- FORMULAIRE -->
                        <div class="form-group">
                            <label for="validationDefault01" class="form-label">Nom: <span style="color: red;">*</span></label>
                            <input type="text" id="name" class="form-control" style="color:#ff9900" name="name" placeholder="Nom" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputMail1" class="form-label">Email: <span style="color: red;">*</span></label><span id="info" class="info"></span>
                            <input type="email" id="email" class="form-control" style="color:#ff9900" name="email" placeholder="Email" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1" class="form-label">Sujet: <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="subject" style="color:#ff9900" name="subject" placeholder="Demande de renseignement" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1" class="form-label">Message:</label>
                            <textarea class="form-control" id="message" name="message" placeholder="Message..."></textarea>
                        </div>
                        
                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" id="validationFormCheck1" required>
                            <label class="form-check-label" for="validationFormCheck1">J'accepte les termes et conditions</label>
                            <div class="invalid-feedback">Veuillez cocher cette case pour continuer</div>
                        </div>
<br>
                        <input type="hidden" id="recaptchaResponse" name="recaptcha-response">
                        
                        <div class="mb-3">
                            <button type="submit" class="btn btn-dark" name="send" value="Envoyer le message">Envoyer le message</button>
                        </div>

                        <br>
                        <a href="../index.php" class="button">&#8592; Retour</a>
                    </form>
                    
                    <script src="https://www.google.com/recaptcha/api.js?render=6LdU_PEdAAAAACkdJlmS5AA4HscuA4JdzxBoXDSV"></script>
                    <script>
                        grecaptcha.ready(function() {
                            grecaptcha.execute('6LdU_PEdAAAAACkdJlmS5AA4HscuA4JdzxBoXDSV', {
                                action: 'homepage'
                            }).then(function(token) {
                                document.getElementById('recaptchaResponse').value = token
                            });
                        });
                    </script>
                    
                </div><!-- fin div container -->
            </div>
        </div>
    </div><!-- fin div wrapper -->


    <?php include_once('footer_contact.php'); ?>
</body>

</html>