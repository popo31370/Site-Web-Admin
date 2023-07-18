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
                    <a class="dropdown-item" href="disease.php">Maladies</a>
                    <a class="dropdown-item" href="medication.php">Médicaments</a>
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
    <div class="card">
        <div class="card-body">
            <h2 class="card-title text-center">Ajouter un médicament</h2>
            <form action="add_medication_post.php" method="post">
                <div class="form-group">
                    <label for="nomFr">Nom du médicament en français</label>
                    <input type="text" class="form-control" id="nomFr" name="nomFr" required>
                </div>
                <div class="form-group">
                    <label for="nomEn">Nom du médicament en anglais</label>
                    <input type="text" class="form-control" id="nomEn" name="nomEn" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-custom">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>






