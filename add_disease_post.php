<?php
session_start();



$url = "http://localhost:8080/api";
include('translations/translation.php');


// Configuration de la requête cURL
$ch = curl_init();


// Exécution de la requête GET

/*Nom des maladies*/
$url_desc = $url . '/names' . '?nomFr=' . $_POST['diseaseNameFR'] . '&nomEn=' . $_POST['diseaseNameEN'];
curl_setopt($ch, CURLOPT_URL, $url_desc);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
$response = curl_exec($ch);
// Vérification des erreurs
if (curl_errno($ch)) {
    echo 'Erreur cURL : ' . curl_error($ch);
}
$response = json_decode($response, true);
$id_name = $response['id'];
echo 'id : ' . $id_name;

/*Description des maladies*/
$url_desc = $url . '/descriptions' . '?nomFr=' . $_POST['diseaseDescriptionFR'] . '&nomEn=' . $_POST['diseaseDescriptionEN'];
curl_setopt($ch, CURLOPT_URL, $url_desc);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
$response = curl_exec($ch);
// Vérification des erreurs
if (curl_errno($ch)) {
    echo 'Erreur cURL : ' . curl_error($ch);
}
$response = json_decode($response, true);
$id_desc = $response['id'];
//console_log($id_desc);
//header("Location: name.php");


/*Description des médicaments*/
$url_desc = $url . '/medicationdescription' . '?descriptionFr=' . $_POST['medDescriptionFR'] . '&descriptionEn=' . $_POST['medDescriptionEN'];
curl_setopt($ch, CURLOPT_URL, $url_desc);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
$response = curl_exec($ch);
// Vérification des erreurs
if (curl_errno($ch)) {
    echo 'Erreur cURL : ' . curl_error($ch);
}
$response = json_decode($response, true);
$id_med_desc = $response['id'];
echo 'id : ' . $id_med_desc;
//console_log($id_med_desc);

/*Description des symptômes*/
$url_desc = $url . '/symptomdescriptions' . '?nomFr=' . $_POST['symptomsDescriptionFR'] . '&nomEn=' . $_POST['symptomsDescriptionEN'];
curl_setopt($ch, CURLOPT_URL, $url_desc);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
$response = curl_exec($ch);
// Vérification des erreurs
if (curl_errno($ch)) {
    echo 'Erreur cURL : ' . curl_error($ch);
}
$response = json_decode($response, true);
$id_symp_desc = $response['id'];
echo 'id : ' . $id_symp_desc;
//console_log($id_symp_desc);

/*Personnes à risque*/
$url_desc = $url . '/whois' . '?descFr=' . $_POST['riskPeopleDescriptionFR'] . '&descEn=' . $_POST['riskPeopleDescriptionEN'];
curl_setopt($ch, CURLOPT_URL, $url_desc);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
$response = curl_exec($ch);
// Vérification des erreurs
if (curl_errno($ch)) {
    echo 'Erreur cURL : ' . curl_error($ch);
}
$response = json_decode($response, true);
$id_risk_desc = $response['id'];
echo 'id : ' . $id_risk_desc;


/*POST du disease*/
$medicationList = urlencode('[1,2]');
$procedureList = urlencode('[1,2]');
$symptomsList = urlencode('[[1,2],[1,2]]');
echo $symptomsList;


$url_desc = $url . '/disease' . '?nameId=' . $id_name . '&descriptionId=' . $id_desc . '&medicationDescId=' . $id_med_desc . '&symptomDescId=' . $id_symp_desc . '&whoisId=' . $id_risk_desc 
. '&medicationList=' . $medicationList . '&procedureList=' . $procedureList . '&symptomsList=' . $symptomsList;
curl_setopt($ch, CURLOPT_URL, $url_desc);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
$response = curl_exec($ch);
// Vérification des erreurs
if (curl_errno($ch)) {
    echo 'Erreur cURL : ' . curl_error($ch);
}
$response = json_decode($response, true);

// Fermeture de la connexion cURL
curl_close($ch);
?>
