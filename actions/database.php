<?php

try {
    $bdd = new PDO('mysql:host=localhost;dbname=phrk9480_parentschool;charset=utf8;', 'phrk9480_jenny', 'TiMyaBou867311');
} catch (Exception $e) {
    die('Une erreur a été trouvée : ' . $e->getMessage());
}
