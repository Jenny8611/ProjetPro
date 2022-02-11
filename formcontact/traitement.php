<?php

// on vérifie que la méthode POST est utilisée
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // on vérifie si le champs "recaptcha-response" contient une valeur
    if (empty($_POST['recaptcha-response'])) {
        header('Location: formcontact.php');
    } else {
        // on prépare l'url
        $url = "https://www.google.com/recaptcha/api/siteverify?secret=6LdU_PEdAAAAAAvQaIkyn0lVjqa1jWV7oHEcd6GR&response={$_POST['recaptcha-response']}";

        // on vérifie si curl est installé
        if (function_exists('curl_version')) {
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_TIMEOUT, 1);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($curl);
        } else {
            // on utilisera file_get_contents
            $response = file_get_contents($url);
        }

        // on vérifie qu'on a une réponse
        if (empty($response) || is_null($response)) {
            header('Location: formcontact.php');
        } else {
            $data = json_decode($response);
            if ($data->success) { //
                if (
                    isset($_POST['name']) && !empty($_POST['name']) &&
                    isset($_POST['email']) && !empty($_POST['email']) &&
                    isset($_POST['subject']) && !empty($_POST['subject']) &&
                    isset($_POST['message']) && !empty($_POST['message'])
                ) {
                    // on nettoie le contenu
                    $name = strip_tags($_POST['name']);
                    $email = strip_tags($_POST['email']);
                    $subject = strip_tags($_POST['subject']);
                    $message = htmlspecialchars($_POST['message']);

                    echo "Message de {$name} envoyé";
                }
            } else {
                header('Location: formcontact.php');
            }
        }
    }
}
