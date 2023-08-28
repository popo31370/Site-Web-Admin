<?php
session_start();

$url = "http://localhost:8080/api/";

// Configuration de la requête cURL
$ch = curl_init();


// Exécution de la requête GET


/*Récupération du champ "id"*/
if(isset($_POST['id'])) {
    $url= $url . 'disease/' . $_POST['id'];
    curl_setopt($ch, CURLOPT_URL, $url);
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

    if(isset($_POST['id_proc'])) {
        $array = array();
        foreach ($response['testsProceduresList'] as $mydata):
                array_push($array, $mydata['id']);
        endforeach;
        array_push($array, $_POST['id_proc']);
        $testsProceduresList = urlencode("[" . implode(",", $array) . "]");
    }

    if(isset($_POST['id_medic'])) {
        $array = array();
        foreach ($response['medicationsList'] as $mydata):
            array_push($array, $mydata['id']);
        endforeach;        
        array_push($array, $_POST['id_medic']);
        $medicationList = urlencode("[" . implode(",", $array) . "]");
    }

    if(isset($_POST['id_symp'])) {
        $array = array();
        foreach ($response['diseaseSymptoms'] as $mydata):
                $array2 = array();
                array_push($array2, $mydata['symptom']['id']);
                array_push($array2, $mydata['painIndex']);
                array_push($array, "[" . implode(",", $array2) . "]");
        endforeach;
        $array2 = array();
        array_push($array2, $_POST['id_symp']);
        array_push($array2, $_POST['pain_index']);
        array_push($array, "[" . implode(",", $array2) . "]");
        $diseaseSymptoms = urlencode("[" . implode(",", $array) . "]");
    }
 
    $url= $url . '?nameId=' . $id_name . '&descriptionId=' . $id_desc . '&medicationDescId='. $id_medic_desc;
    $url= $url . '&symptomDescId=' . $id_symp_desc . '&whoisId=' . $id_whois;
    if(isset($_POST['id_medic'])) 
        $url= $url . '&medicationList=' . $medicationList;
    if(isset($_POST['id_proc'])) 
            $url= $url . '&procedureList=' . $testsProceduresList;
    if(isset($_POST['id_symp'])) 
        $url= $url . '&symptomsList=' . $diseaseSymptoms;
    echo $url;

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    $response = curl_exec($ch);

    // Vérification des erreurs
    if (curl_errno($ch)) {
        echo 'Erreur cURL : ' . curl_error($ch);
    } 
    //header("Location: editer_disease.php?id=" . $_GET['id_disease']);
}
