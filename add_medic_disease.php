<?php
session_start();
include('translations/translation.php');


// URL de l'API que vous souhaitez appeler
$url = "http://localhost:8080/api/medications";

// Configuration de la requête cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$headers = array('X-API-KEY: 3cfa26d6-5c52-480b-90ea-7aee7b40a5d6');
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// Exécution de la requête GET
$response = curl_exec($ch);

// Vérification des erreurs
if (curl_errno($ch)) {
    echo 'Erreur cURL : ' . curl_error($ch);
}

// Fermeture de la connexion cURL
curl_close($ch);

// Traitement de la réponse
if ($response) {
    $response= json_decode($response,true);
    $response= $response['_embedded']['medicationsList'];
    //foreach($response as $mydata)

    //{
         //echo json_encode($mydata['nomFr']) . "\n";
    //}  
    //$response= json_encode($response);
    //echo "Réponse de l'API : " . $response;
} else {
    echo "Aucune réponse de l'API.";
}


?>

<!DOCTYPE html>
<html>

<head>
    <title>Maladies</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>

    <?php
    include 'menu.php';
    ?>

<div class="container mt-5">

        <h2 class="mb-4">Ajouter un médicament à la maladie ...</h2>

        <form action="add_item_disease_post.php" method="post">
            <input id="id" name="id" type="hidden" value="<?= $_GET['id']; ?>">
            <div class="row">
                <div class="col-md-6">
                    <select id="id_medic" name="id_medic" class="form-control mb-2">
                        <!-- Remplir la combo box avec les données de l'API -->
                        <?php
                        if (isset($response) && is_array($response)) {
                            foreach ($response as $medic) {
                                $nom = htmlspecialchars($medic['nomFr'], ENT_QUOTES, 'UTF-8');
                                echo "<option value='{$medic['id']}'>{$nom}</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-1">
                    <button id="addButton" class="btn btn-primary mb-2">+</button>
                </div>
            </div>
        </form>


</body>
</html>
