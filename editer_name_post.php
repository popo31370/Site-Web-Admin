<?php
session_start();

$url = "http://localhost:8080/api/names/";

// Configuration de la requête cURL
$ch = curl_init();



/*Récupération du champ "id"*/

$url = $url . $_POST['id'];
$url = $url . '?nomFr=' . $_POST['nomFr'] . '&nomEn=' . $_POST['nomEn'];
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
$response = curl_exec($ch);
// Vérification des erreurs
if (curl_errno($ch)) {
    echo 'Erreur cURL : ' . curl_error($ch);
}
header("Location: name.php");


// Fermeture de la connexion cURL
curl_close($ch);
?>
