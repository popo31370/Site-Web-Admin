<?php
session_start();

$url = "http://localhost:8080/api/medications/";

// Configuration de la requête cURL
$ch = curl_init();


// Exécution de la requête GET


/*Récupération du champ "id"*/
if(isset($_GET['id'])) {
    $url= $url . $_GET['id'];
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    $response = curl_exec($ch);
    // Vérification des erreurs
    if (curl_errno($ch)) {
        echo 'Erreur cURL : ' . curl_error($ch);
    }
    header("Location: medication.php");
}



// Fermeture de la connexion cURL
curl_close($ch);
?>
