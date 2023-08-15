<?php
session_start();

$url = "http://localhost:8080/api/symptoms/";

// Configuration de la requête cURL
$ch = curl_init();



$headers = array('X-API-KEY: 3cfa26d6-5c52-480b-90ea-7aee7b40a5d6');
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);


/*Récupération du champ "id"*/
if(isset($_GET['id'])) {
    $url= $url . $_GET['id'];
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    $response = curl_exec($ch);
    $response= json_decode($response,true);
    // Vérification des erreurs
    if (curl_errno($ch)) {
        echo 'Erreur cURL : ' . curl_error($ch);
    }
}



// Fermeture de la connexion cURL
curl_close($ch);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tableau Bootstrap</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>

        .table-lign {
            background-color: #B7ACF7;
            border-color: #B7ACF7;
            color: white;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }


    </style>
</head>
<body>
<style>
.dropdown:hover .dropdown-menu {
    display: block;
}
</style>

<?php
include 'menu.php';
?>



<!-- Inclure les fichiers CSS et JavaScript de Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<div class="container">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title text-center">Editer un symptôme</h2>
                <form method="POST" action="editer_sympt_post.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nomFr">Nom du symptôme en français</label>
                        <input type="text" class="form-control" id="nomFr" name="nomFr" required value="<?php echo $response['nomFr']; ?>">
                        <input id="id" name="id" type="hidden" value="<?= $_GET['id']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="nomEn">Nom du symptôme en anglais</label>
                        <input type="text" class="form-control" id="nomEn" name="nomEn" required value="<?php echo $response['nomEn']; ?>">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-custom">Mettre à jour</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>