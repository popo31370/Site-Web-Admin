<?php
session_start();

$url = "http://localhost:8080/api/medications/";

// Configuration de la requête cURL
$ch = curl_init();



/*Récupération du champ "id"*/

$url = $url . $_POST['id'];
$url = $url . '?nomFr=' . urlencode($_POST['nomFr']) . '&nomEn=' . urlencode($_POST['nomEn']);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 

$headers = array('X-API-KEY: 3cfa26d6-5c52-480b-90ea-7aee7b40a5d6');
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch);
// Vérification des erreurs
if (curl_errno($ch)) {
    echo 'Erreur cURL : ' . curl_error($ch);
}
header("Location: medication.php");


// Fermeture de la connexion cURL
curl_close($ch);
?>
