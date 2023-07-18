<?php
session_start();


// URL de l'API que vous souhaitez appeler
$url = "http://localhost:8080/api/names";

// Configuration de la requête cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

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
    $response= $response['_embedded']['nameList'];
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

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
        <img src="logo_moi_malade.png" alt="Logo" style="width: 75px;">
        Moi Malade
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Menu
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="symptoms.php">Symptômes</a>
                    <a class="dropdown-item" href="disease.php">Names</a>
                    <a class="dropdown-item" href="medication.php">Médicaments</a>
                    <a class="dropdown-item" href="description.php">Description</a>
                    <a class="dropdown-item" href="sympt_desc.php">Symptômes Description</a>
                    <a class="dropdown-item" href="medic_desc.php">Médicaments Description</a>
                    <a class="dropdown-item" href="whois.php">WhoIs</a>
                    <a class="dropdown-item" href="tests_proc.php">Tests Procedure</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Déconnexion</a>
            </li>
        </ul>
    </div>
</nav>


<!-- Inclure les fichiers CSS et JavaScript de Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <div class="container">
    <br/>
    <h2>Liste des Names</h2><br/>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="search-bar">
                    <form action="#" method="get">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Rechercher...">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit">Rechercher</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br/>

    <table class="table table-striped">
        <thead class="table-lign">
            <tr>
                <th>Id</th>
                <th>Nom names en français</th>
                <th>Nom names en anglais</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($response as $mydata): ?>
                <tr>
                    <td><?= $mydata['id']; ?></td>
                    <td><?= $mydata['nomFr']; ?></td>
                    <td><?= $mydata['nomEn']; ?></td>
                    <td>
                    <span class="material-symbols-outlined" style="color:red">delete</span>
                    <span class="material-symbols-outlined">edit</span>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
