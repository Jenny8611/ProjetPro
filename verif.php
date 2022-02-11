<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;


$bdd = new PDO('mysql:host=localhost;dbname=phrk9480_parentschool;charset=utf8;', 'phrk9480_JennyAll', 'Diablesse867311');
if (isset($_GET['id']) and !empty($_GET['id']) and isset($_GET['cle']) and !empty($_GET['cle'])) {
} else {
    echo "Aucun utilisateur trouvé";
}



// Mail de confirmation d'inscription
if (!empty($_POST['email'])) {
    $user_cle = rand(1000000, 9000000);
    $user_email = $_POST['email'];
    $insererUser = $bdd->prepare('INSERT INTO users (email, cle, confirme)VALUE(?, ?, ?)');
    $insererUser->execute(array($user_email, $user_cle, 0));

    $recupUser = $bdd->prepare('SELECT * FROM users WHERE email = ?');
    $recupUser->execute(array($user_email));
    if ($recupUser->rowCount() > 0) {
        $user_info = $recupUser->fetch();
        $_SESSION['id'] = $user_info['id'];


        function smtpmailer($to, $from, $from_name, $subject, $body)
        {
            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->SMTPAuth = true;

            $mail->SMTPSecure = 'ssl';
            $mail->Host = 'localhost';
            $mail->Port = 465;
            $mail->Username = 'contacts@parentschool.fr';
            $mail->Password = 'TiMyaBou867311';

            //   $path = 'reseller.pdf';
            //   $mail->AddAttachment($path);

            $mail->IsHTML(true);
            $mail->From = "contacts@parentschool.fr";
            $mail->FromName = $from_name;
            $mail->Sender = $from;
            $mail->AddReplyTo($from, $from_name);
            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->AddAddress($to);

            if (!$mail->Send()) {
                $error = "Une erreur s'est produite, veuillez réessayer !";
                return $error;
            } else {
                $error = "Merci. Votre mail a été correctement envoyé.";
                return $error;
            }
        }

        $to   = $user_email;
        $from = 'contacts@parentschool.fr';
        $name = 'ParentSchool';
        $subj = 'Email de confirmation de compte';
        $msg = 'https://parentschool/verif.php?id=' . $_SESSION['id'] . '&cle=' . $user_cle;

        $error = smtpmailer($to, $from, $name, $subj, $msg);
    }
} else {
    echo "Veuillez entrer votre email";
}
