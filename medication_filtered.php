<?php
session_start();
include('translations/translation.php');


// URL de l'API que vous souhaitez appeler
$url = "http://localhost:8080/api/medications/";

// Configuration de la requête cURL
$ch = curl_init();
$url= $url . $_GET['id'];
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

} else {
    echo "Aucune réponse de l'API.";
}


?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined" />
    <title>Tableau Bootstrap</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>

        .table-lign {
            background-color: #B7ACF7;
            border-color: #B7ACF7;
            color: white;
        }
        .search-bar {
            float: right;
            margin-right: 20px;
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
<script type="text/javascript" src="search_script.js"></script>

    <div class="container">
    <br/>
    <h2><?php echo $translations['listMedic']; ?></h2><br/>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="search-bar">
                        <div class="input-group">
                            <input type="text" name="search_box" class="search" placeholder=<?php echo $translations['search']; ?> id="search_box" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onkeyup="javascript:load_data(this.value)" />
                            <span id="search_result"></span>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" onclick="window.location.href='medication_filtered.php?id='+document.getElementsByName('search_box')[0].step"><?php echo $translations['search']; ?></button>
                                <button class="btn btn-outline-secondary" onclick="window.location.href='medication.php'">Reset</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <br/>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<a href="add_medication.php" style="text-decoration: underline; color: #8FC067;"><?php echo $translations['addMedic']; ?></a>

<table class="table table-striped">
    <thead class="table-lign">
        <tr>
            <th><?php echo $translations['id']; ?></th>
            <th><?php echo $translations['medicNameFR']; ?></th>
            <th><?php echo $translations['medicNameEn']; ?></th>
            <th><?php echo $translations['actions']; ?></th>
        </tr>
    </thead>
    <tbody>
            <tr>
                <td><?= $response['id']; ?></td>
                <td><?= $response['nomFr']; ?></td>
                <td><?= $response['nomEn']; ?></td>
                <td>
                <a href="supprimer_medic.php?id=<?= $response['id']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet élément ?');">
                    <span class="material-symbols-outlined delete-icon">delete</span>
                </a>                
                <a href="editer_medic.php?id=<?= $response['id']; ?>"><span class="material-symbols-outlined">edit</span></a>
                </td>
            </tr>
    </tbody>
</table>


</div>
</body>
</html>
