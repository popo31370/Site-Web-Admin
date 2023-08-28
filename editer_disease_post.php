<?php
session_start();

$url = "http://localhost:8080/api/";

// Configuration de la requête cURL
$ch = curl_init();



/*Récupération du champ "id"*/
$url_disease = $url . 'disease/' . $_POST['id'];
curl_setopt($ch, CURLOPT_URL, $url_disease);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 

$headers = array('X-API-KEY: 3cfa26d6-5c52-480b-90ea-7aee7b40a5d6');
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch);
$response= json_decode($response,true);
$id_name=$response['name']['id'];
$id_desc=$response['description']['id'];
$id_medic_desc=$response['medicationDescription']['id'];
$id_symp_desc=$response['symptomDescription']['id'];
$id_whois=$response['whois']['id'];

// Vérification des erreurs
if (curl_errno($ch)) {
    echo 'Erreur cURL : ' . curl_error($ch);
}

$url_name = $url . 'names/' . $id_name;
$url_name = $url_name . '?nomFr=' . urlencode($_POST['diseaseNameFR']) . '&nomEn=' . urlencode($_POST['diseaseNameEN']);
curl_setopt($ch, CURLOPT_URL, $url_name);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
$response = curl_exec($ch);
// Vérification des erreurs
if (curl_errno($ch)) {
    echo 'Erreur cURL : ' . curl_error($ch);
}

$url_desc = $url . 'descriptions/' . $id_desc;
$url_desc = $url_desc . '?nomFr=' . urlencode($_POST['diseaseDescriptionFR']) . '&nomEn=' . urlencode($_POST['diseaseDescriptionEN']);
curl_setopt($ch, CURLOPT_URL, $url_desc);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
$response = curl_exec($ch);
// Vérification des erreurs
if (curl_errno($ch)) {
    echo 'Erreur cURL : ' . curl_error($ch);
}
$url_medic_desc = $url . 'medicationdescription/' . $id_medic_desc;
$url_medic_desc = $url_medic_desc . '?descriptionFr=' . urlencode($_POST['medDescriptionFR']) . '&descriptionEn=' . urlencode($_POST['medDescriptionEN']);
curl_setopt($ch, CURLOPT_URL, $url_medic_desc);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
$response = curl_exec($ch);
// Vérification des erreurs
if (curl_errno($ch)) {
    echo 'Erreur cURL : ' . curl_error($ch);
}

$url_symp_desc = $url . 'symptomdescriptions/' . $id_symp_desc;
$url_symp_desc = $url_symp_desc . '?nomFr=' . urlencode($_POST['symptomsDescriptionFR']) . '&nomEn=' . urlencode($_POST['symptomsDescriptionEN']);
curl_setopt($ch, CURLOPT_URL, $url_symp_desc);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
$response = curl_exec($ch);
// Vérification des erreurs
if (curl_errno($ch)) {
    echo 'Erreur cURL : ' . curl_error($ch);
}

$url_whois = $url . 'whois/' . $id_whois;
$url_whois = $url_whois . '?descFr=' . urlencode($_POST['riskPeopleDescriptionFR']) . '&descEn=' . urlencode($_POST['riskPeopleDescriptionEN']);
$url_whois = $url_whois . '&sex=' . urlencode($_POST['sex']) . '&ethnicity=' . urlencode($_POST['ethnicity']);
$url_whois = $url_whois . '&track1Start=' . urlencode($_POST['track1Start']) . '&track1End=' . urlencode($_POST['track1End']);
$url_whois = $url_whois . '&track2Start=' . urlencode($_POST['track2Start']) . '&track2End=' . urlencode($_POST['track2End']);
$url_whois = $url_whois . '&track3Start=' . urlencode($_POST['track3Start']) . '&track3End=' . urlencode($_POST['track3End']);

curl_setopt($ch, CURLOPT_URL, $url_whois);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
$response = curl_exec($ch);
// Vérification des erreurs
if (curl_errno($ch)) {
    echo 'Erreur cURL : ' . curl_error($ch);
}
echo $url_whois;

//header("Location: name.php");


// Fermeture de la connexion cURL
curl_close($ch);
?>
