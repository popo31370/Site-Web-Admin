<?php
session_start();

$url = "http://localhost:8080/api/disease/";

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
    <title>Maladies</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <style>
        .add-medication-link {
            text-decoration: none;
            color: #8FC067;
            font-size: 18px; /* Adjust the font size as needed */
            display: flex;
            align-items: center;
        }
        label {
            color:#B7ACF7;
        }
        h3 {
            font-size: small;
        }
        .centered-button {
        display: block;
        margin: 20px auto; /* Ajustez les marges comme souhaité */
        text-align: center;
    }
    </style>
</head>

<body>

    <?php
    include 'menu.php';
    ?>

    <div class="container mt-4">
        <h2>Edition de la maladie: </h2>
        </br>
        <form action="editer_disease_post.php" method="post">

            <!-- Using the Bootstrap Grid System with Flex -->
            <div class="row">

                <!-- Column 1 (French Descriptions) -->
                <div class="col-md-6">

                    <!-- Nom de la maladie (FR) -->
                    <div class="form-group">
                        <label for="diseaseNameFR"><?php echo $translations['diseaseNameFr']; ?></label>
                        <input type="text" class="form-control" id="diseaseNameFR" name="diseaseNameFR" value="<?php echo $response['name']['nomFr']; ?>">
                    </div>

                    <!-- Descriptions (FR) -->
                    <div class="form-group">
                        <label for="diseaseDescriptionFR"><?php echo $translations['descDiseaseFR']; ?></label>
                        <textarea class="form-control" id="diseaseDescriptionFR" name="diseaseDescriptionFR" rows="3" ><?php echo $response['description']['nomFr']; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="medDescriptionFR"><?php echo $translations['descMedicFR']; ?></label>
                        <textarea class="form-control" id="medDescriptionFR" name="medDescriptionFR" rows="3"><?php echo $response['medicationDescription']['descriptionFr']; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="symptomsDescriptionFR"><?php echo $translations['descSympFR']; ?></label>
                        <textarea class="form-control" id="symptomsDescriptionFR" name="symptomsDescriptionFR" rows="3"><?php echo $response['symptomDescription']['nomFr']; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="riskPeopleFR">Personnes à risque</label>
                        <h3 for="riskPeopleDescriptionFR">Description des personnes à risque (FR):</h3>
                        <textarea class="form-control" id="riskPeopleDescriptionFR" name="riskPeopleDescriptionFR" rows="3"><?php echo $response['whois']['descFr']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <h3 for="riskPeopleDescriptionEN">Ethnicité des personnes à risque</h3>
                        <input class="form-control" id="ethnicity" name="ethnicity" rows="3" value="<?php echo $response['whois']['ethnicity']; ?>">
                    </div>
                    <div class="form-group">
                        <h3 for="riskPeopleDescriptionEN">Track 1 START</h3>
                        <input class="form-control" id="track1Start" name="track1Start" rows="3" value="<?php echo $response['whois']['track1Start']; ?>">
                    </div>
                    <div class="form-group">
                        <h3 for="riskPeopleDescriptionEN">Track 2 START</h3>
                        <input class="form-control" id="track2Start" name="track2Start" rows="3" value="<?php echo $response['whois']['track2Start']; ?>">
                    </div>
                    <div class="form-group">
                        <h3 for="riskPeopleDescriptionEN">Track 3 START</h3>
                        <input class="form-control" id="track3Start" name="track3Start" rows="3" value="<?php echo $response['whois']['track3Start']; ?>">
                    </div>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
<!-- ... Autres champs ... -->

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Liste des médicaments:</h5>
                            <a href="add_medic_disease.php?id=<?= $_GET['id']?>" class="add-medication-link">
                                <span class="material-symbols-outlined">add_circle</span>
                                <span class="link-text">Ajouter un médicament à cette maladie</span>
                            </a>
                            <table class="table table-striped">
                                <thead class="table-lign">
                                    <tr>
                                        <th>id</th>
                                        <th>Médicament (FR)</th>
                                        <th>Médicament (EN)</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($response['medicationsList'] as $mymedication): ?>
                                        <tr>
                                            <td><?= $mymedication['id']; ?></td>
                                            <td><?= $mymedication['nomFr']; ?></td>
                                            <td><?= $mymedication['nomEn']; ?></td>
                                            <td>
                                                <a href="supprimer_medic_disease.php?id_medic=<?= $mymedication['id'] . '&id_disease=' . $_GET['id']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet élément ?');">
                                                    <span class="material-symbols-outlined delete-icon">delete</span>
                                                </a>                
                                                <a href="editer_medic.php?id=<?= $mymedication['id']; ?>"><span class="material-symbols-outlined">edit</span></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- ... Autres champs ... -->
                    <br/>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Liste des Symptômes:</h5>
                            <a href="add_sympt_disease.php?id=<?= $_GET['id']?>" class="add-medication-link">
                                <span class="material-symbols-outlined">add_circle</span>
                                <span class="link-text">Ajouter un symptôme à cette maladie</span>
                            </a>
                            <table class="table table-striped">
                                <thead class="table-lign">
                                    <tr>
                                        <th>id</th>
                                        <th>Symptômes (FR)</th>
                                        <th>Symptômes (EN)</th>
                                        <th>Pain Index</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($response['diseaseSymptoms'] as $mysympt): ?>
                                        <tr>
                                            <td><?= $mysympt['symptom']['id']; ?></td>
                                            <td><?= $mysympt['symptom']['nomFr']; ?></td>
                                            <td><?= $mysympt['symptom']['nomEn']; ?></td>
                                            <td><?= $mysympt['painIndex']; ?></td>
                                            <td>
                                                <a href="supprimer_medic_disease.php?id_symp=<?= $mysympt['symptom']['id'] . '&id_disease=' . $_GET['id']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet élément ?');">
                                                    <span class="material-symbols-outlined delete-icon">delete</span>
                                                </a>                
                                                <a href="editer_sympt.php?id=<?= $mysympt['symptom']['id']; ?>"><span class="material-symbols-outlined">edit</span></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <!-- Column 2 (English Descriptions) -->
                <div class="col-md-6">
                <input id="id" name="id" type="hidden" value="<?= $_GET['id']; ?>">


                    <!-- Nom de la maladie (EN) -->
                    <div class="form-group">
                        <label for="diseaseNameEN">Nom de la maladie (EN):</label>
                        <input type="text" class="form-control" id="diseaseNameEN" name="diseaseNameEN" value="<?php echo $response['name']['nomEn']; ?>">
                    </div>

                    <!-- Descriptions (EN) -->
                    <div class="form-group">
                        <label for="diseaseDescriptionEN">Description de la maladie (EN):</label>
                        <textarea class="form-control" id="diseaseDescriptionEN" name="diseaseDescriptionEN" rows="3" ><?php echo $response['description']['nomEn']; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="medDescriptionEN">Description des médicaments (EN):</label>
                        <textarea class="form-control" id="medDescriptionEN" name="medDescriptionEN" rows="3"><?php echo $response['medicationDescription']['descriptionEn']; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="symptomsDescriptionEN">Description des symptômes (EN):</label>
                        <textarea class="form-control" id="symptomsDescriptionEN" name="symptomsDescriptionEN" rows="3"><?php echo $response['symptomDescription']['nomEn']; ?></textarea>
                    </div>
                    <br/>
                    <div class="form-group">
                        <h3 for="riskPeopleDescriptionEN">Description des personnes à risque (EN):</h3>
                        <textarea class="form-control" id="riskPeopleDescriptionEN" name="riskPeopleDescriptionEN" rows="3"><?php echo $response['whois']['descEn']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <h3 for="riskPeopleDescriptionEN">Sexe des personnes à risque</h3>
                        <input class="form-control" id="sex" name="sex" rows="3" value="<?php echo $response['whois']['sex']; ?>">
                    </div>
                    <div class="form-group">
                        <h3 for="riskPeopleDescriptionEN">Track 1 END</h3>
                        <input class="form-control" id="track1End" name="track1End" rows="3" value="<?php echo $response['whois']['track1End']; ?>">
                    </div>
                    <div class="form-group">
                        <h3 for="riskPeopleDescriptionEN">Track 2 END</h3>
                        <input class="form-control" id="track2End" name="track2End" rows="3" value="<?php echo $response['whois']['track2End']; ?>">
                    </div>
                    <div class="form-group">
                        <h3 for="riskPeopleDescriptionEN">Track 3 END</h3>
                        <input class="form-control" id="track3End" name="track3End" rows="3" value="<?php echo $response['whois']['track3End']; ?>">
                    </div>
                    <div class="centered-button">
                        <button type="submit" class="btn btn-custom" style="background-color: #B7ACF7;">Mettre à jour</button>
                    </div>
                    <br/>
                    <br/>
     <!-- ... Autres champs ... -->

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Liste des Tests et Procédures:</h5>
                            <a href="add_test_disease.php?id=<?= $_GET['id']?>" class="add-medication-link">
                                <span class="material-symbols-outlined">add_circle</span>
                                <span class="link-text">Ajouter un test et procédure à cette maladie</span>
                            </a>
                            <table class="table table-striped">
                                <thead class="table-lign">
                                    <tr>
                                        <th>id</th>
                                        <th>Test et Procédure (FR)</th>
                                        <th>Test et Procédure (EN)</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($response['testsProceduresList'] as $mymtestandproc): ?>
                                        <tr>
                                            <td><?= $mymtestandproc['id']; ?></td>
                                            <td><?= $mymtestandproc['nomFr']; ?></td>
                                            <td><?= $mymtestandproc['nomEn']; ?></td>
                                            <td>
                                                <a href="supprimer_medic_disease.php?id_proc=<?= $mymtestandproc['id'] . '&id_disease=' . $_GET['id']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet élément ?');">
                                                    <span class="material-symbols-outlined delete-icon">delete</span>
                                                </a>                
                                                <a href="editer_tests_proc.php?id=<?= $mydata['id']; ?>"><span class="material-symbols-outlined">edit</span></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>

    <!-- JS files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="search_script.js"></script>

</body>

</html>
