<?php
session_start();
include('translations/translation.php');


// URL de l'API que vous souhaitez appeler
$url = "http://localhost:8080/api/testsprocedures";

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
    $response= $response['_embedded']['testsProceduresList'];
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
        /* CSS */
        .pagination {
        display: flex;
        justify-content: space-between;
        align-items: center;
        /* Add any additional styles you want for the pagination container */
        }

        .pagination-group {
        display: flex;
        align-items: center;
        /* Add any additional styles you want for the pagination groups */
        }

        .pagination-separator {
        margin: 0 10px; /* Adjust the spacing as needed */
        /* Add any additional styles you want for the separator */
        }
        /* CSS */
        .container {
            /* Add any additional styles for the container if needed */
        }

        .search-bar {
            position: relative;
            /* Add any additional styles for the search bar container if needed */
        }

        .input-group {
            display: flex;
            align-items: center;
            /* Add any additional styles for the input group if needed */
        }

        .search {
            /* Add any additional styles for the input field if needed */
        }

        #search_result {
            display: block;
            position: absolute;
            z-index: 1;
            /* Add any additional styles for the search result span if needed */
        }
        /* CSS */
        .add-medication-link {
            text-decoration: none;
            color: #8FC067;
            font-size: 18px; /* Adjust the font size as needed */
            display: flex;
            align-items: center;
        }

        .material-icons {
            font-family: 'Material Icons'; /* Use the Material Icons font family */
            font-size: 24px; /* Adjust the icon font size */
            margin-right: 5px; /* Adjust the spacing between the icon and the text */
        }

        .link-text {
            font-size: inherit; /* Use the same font size as the parent element */
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
    <h2>Liste Tests et Procédures</h2><br/>
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="search-bar">
                <div class="input-group">
                    <input type="text" name="search_box" class="search" placeholder=<?php echo $translations['search']; ?> id="search_box" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onkeyup="javascript:load_data(this.value)" />
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" onclick="window.location.href='medication_filtered.php?id='+document.getElementsByName('search_box')[0].step"><?php echo $translations['search']; ?></button>
                    </div>
                </div>
                <span id="search_result"></span>
            </div>
        </div>
    </div>
</div>

    <br/>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php
// Nombre maximum de lignes par page
$limit = 8;

// Récupérer le numéro de page à partir du paramètre de requête 'page'
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Calculer l'indice de début et de fin pour les éléments à afficher
$start = ($page - 1) * $limit;
$end = $start + $limit;

// Extraire les lignes à afficher selon la pagination
$currentPage = array_slice($response, $start, $limit);

// Total des pages
$totalPages = ceil(count($response) / $limit);
?>
<a href="add_tests_proc.php" class="add-medication-link">
    <span class="material-symbols-outlined">add_circle</span>
    <span class="link-text">Ajouter un élément</span>
</a>
<br/>
<table class="table table-striped">
    <thead class="table-lign">
        <tr>
            <th><?php echo $translations['id']; ?></th>
            <th>Nom en francais</th>
            <th>Nom en anglais</th>
            <th><?php echo $translations['actions']; ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($currentPage as $mydata): ?>
            <tr>
                <td><?= $mydata['id']; ?></td>
                <td><?= $mydata['nomFr']; ?></td>
                <td><?= $mydata['nomEn']; ?></td>
                <td>
                <a href="supprimer_tests_proc.php?id=<?= $mydata['id']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet élément ?');">
                    <span class="material-symbols-outlined delete-icon">delete</span>
                </a>                
                <a href="editer_tests_proc.php?id=<?= $mydata['id']; ?>"><span class="material-symbols-outlined">edit</span></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Afficher les liens de pagination -->
<div class="pagination">
    <div class="pagination-group">
        <?php if ($page > 1): ?>
            <a href="?page=1" class="text-dark">&laquo; <?php echo $translations['dPage']; ?></a>
            <a href="?page=<?= $page - 1; ?>" class="text-dark">&laquo; <?php echo $translations['pPage']; ?></a>
        <?php endif; ?>
    </div>

    <?php if ($page > 1 && $page < $totalPages): ?>
        <span class="pagination-separator">&nbsp;</span>
    <?php endif; ?>

    <div class="pagination-group">
        <?php if ($page < $totalPages): ?>
            <a href="?page=<?= $page + 1; ?>" class="text-dark"><?php echo $translations['nPage']; ?> &raquo;</a>
            <a href="?page=<?= $totalPages; ?>" class="text-dark"><?php echo $translations['fPage']; ?> &raquo;</a>
        <?php endif; ?>
    </div>
</div>
</div>
</body>
</html>
