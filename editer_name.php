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

    <div class="container mt-4">
        <h2>Edition d'une maladie</h2>
        <form action="editer_disease_post.php" method="post">

            <!-- Using the Bootstrap Grid System with Flex -->
            <div class="row">

                <!-- Column 1 (French Descriptions) -->
                <div class="col-md-6">

                    <!-- Nom de la maladie (FR) -->
                    <div class="form-group">
                        <label for="diseaseNameFR">Nom de la maladie (FR):</label>
                        <input type="text" class="form-control" id="diseaseNameFR" name="diseaseNameFR" placeholder="Entrez le nom en français">
                    </div>

                    <!-- Descriptions (FR) -->
                    <div class="form-group">
                        <label for="diseaseDescriptionFR">Description de la maladie (FR):</label>
                        <textarea class="form-control" id="diseaseDescriptionFR" name="diseaseDescriptionFR" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="medDescriptionFR">Description des médicaments (FR):</label>
                        <textarea class="form-control" id="medDescriptionFR" name="medDescriptionFR" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="symptomsDescriptionFR">Description des symptômes (FR):</label>
                        <textarea class="form-control" id="symptomsDescriptionFR" name="symptomsDescriptionFR" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="riskPeopleDescriptionFR">Description des personnes à risque (FR):</label>
                        <textarea class="form-control" id="riskPeopleDescriptionFR" name="riskPeopleDescriptionFR" rows="3"></textarea>
                    </div>

                </div>

                <!-- Column 2 (English Descriptions) -->
                <div class="col-md-6">

                    <!-- Nom de la maladie (EN) -->
                    <div class="form-group">
                        <label for="diseaseNameEN">Nom de la maladie (EN):</label>
                        <input type="text" class="form-control" id="diseaseNameEN" name="diseaseNameEN" placeholder="Entrez le nom en anglais">
                    </div>

                    <!-- Descriptions (EN) -->
                    <div class="form-group">
                        <label for="diseaseDescriptionEN">Description de la maladie (EN):</label>
                        <textarea class="form-control" id="diseaseDescriptionEN" name="diseaseDescriptionEN" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="medDescriptionEN">Description des médicaments (EN):</label>
                        <textarea class="form-control" id="medDescriptionEN" name="medDescriptionEN" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="symptomsDescriptionEN">Description des symptômes (EN):</label>
                        <textarea class="form-control" id="symptomsDescriptionEN" name="symptomsDescriptionEN" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="riskPeopleDescriptionEN">Description des personnes à risque (EN):</label>
                        <textarea class="form-control" id="riskPeopleDescriptionEN" name="riskPeopleDescriptionEN" rows="3"></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-custom" style="background-color: #B7ACF7;">Editer</button>
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
