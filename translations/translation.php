<?php

// Vérifier si l'utilisateur a sélectionné une langue
if(isset($_GET['lang'])) {
    // Récupérer la langue sélectionnée
    $lang = $_GET['lang'];

    // Stocker la langue dans la variable de session
    $_SESSION['lang'] = $lang;
} else {
    // Vérifier si la langue est déjà stockée dans la session
    if(isset($_SESSION['lang'])) {
        // Récupérer la langue depuis la session
        $lang = $_SESSION['lang'];
    } else {
        // Par défaut, utiliser le français
        $lang = 'fr';
    }
}

// Charger le fichier de langue correspondant
$langFile = 'translations/messages.' . $lang . '.php';
if(file_exists($langFile)) {
    $translations = include($langFile);
} else {
    // Si le fichier de langue n'existe pas, utiliser le français par défaut
    $translations = include('translations/messages.fr.php');
}


?>

