<?php
session_start();

$url = "http://localhost:8080/api/";

// Configuration de la requête cURL
$ch = curl_init();

$headers = array('X-API-KEY: 3cfa26d6-5c52-480b-90ea-7aee7b40a5d6');
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
// Exécution de la requête GET


/*Récupération du champ "id"*/
if(isset($_GET['id_disease'])) {
    $url= $url . 'disease/' . $_GET['id_disease'];
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    $response = curl_exec($ch);
    $response= json_decode($response,true);
    $id_name=$response['name']['id'];
    $id_desc=$response['description']['id'];
    $id_medic_desc=$response['medicationDescription']['id'];
    $id_symp_desc=$response['symptomDescription']['id'];
    $id_whois=$response['whois']['id'];

    if(isset($_GET['id_proc'])) {
        $array = array();
        foreach ($response['testsProceduresList'] as $mydata):
            if ($_GET['id_proc'] != $mydata['id']) 
                array_push($array, $mydata['id']);
        endforeach;
        $testsProceduresList = urlencode("[" . implode(",", $array) . "]");
    }

    if(isset($_GET['id_medic'])) {
        $array = array();
        foreach ($response['medicationsList'] as $mydata):
        if ($_GET['id_medic'] != $mydata['id']) 
            array_push($array, $mydata['id']);
        endforeach;
        $medicationList = urlencode("[" . implode(",", $array) . "]");
    }

    if(isset($_GET['id_symp'])) {
        $array = array();
        foreach ($response['diseaseSymptoms'] as $mydata):
            if ($_GET['id_symp'] != $mydata['symptom']['id']) {
                $array2 = array();
                array_push($array2, $mydata['symptom']['id']);
                array_push($array2, $mydata['painIndex']);
                array_push($array, "[" . implode(",", $array2) . "]");
            }
        endforeach;
        $diseaseSymptoms = urlencode("[" . implode(",", $array) . "]");
    }
 
    $url= $url . '?nameId=' . $id_name . '&descriptionId=' . $id_desc . '&medicationDescId='. $id_medic_desc;
    $url= $url . '&symptomDescId=' . $id_symp_desc . '&whoisId=' . $id_whois;
    if(isset($_GET['id_medic'])) 
        $url= $url . '&medicationList=' . $medicationList;
    if(isset($_GET['id_proc'])) 
            $url= $url . '&procedureList=' . $testsProceduresList;
    if(isset($_GET['id_symp'])) 
        $url= $url . '&symptomsList=' . $diseaseSymptoms;
    echo $url;

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    $response = curl_exec($ch);

    // Vérification des erreurs
    if (curl_errno($ch)) {
        echo 'Erreur cURL : ' . curl_error($ch);
    }
    header("Location: editer_disease.php?id=" . $_GET['id_disease']);
}



// Fermeture de la connexion cURL
curl_close($ch);
?>
