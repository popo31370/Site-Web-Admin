<?php
session_start();

$url = "http://localhost:8080/api/medications/";

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
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            width: 400px;
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 40px;
        }

        .card-title {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        label {
            display: block;
            font-weight: bold;
            font-size: 16px;
            color: #555;
            margin-bottom: 10px;
        }

        .form-control {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn-custom {
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            background-color: #B7ACF7;
            transition: background-color 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #A399F0;
        }

    </style>
</head>
<body>

<?php
include 'menu.php';
?>

<div class="container">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title text-center">Editer un médicament</h2>
            <form method="POST" action="editer_medic_post.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nomFr">Nom du médicament en français</label>
                    <input type="text" class="form-control" id="nomFr" name="nomFr" required value="<?php echo $response['nomFr']; ?>">
                    <input id="id" name="id" type="hidden" value="<?= $_GET['id']; ?>">
                </div>
                <div class="form-group">
                    <label for="nomEn">Nom du médicament en anglais</label>
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
