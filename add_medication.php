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
                /* CSS */
        .card-body {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn-custom {
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #A399F0;
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
    <h2 class="card-title text-center mb-4">Ajouter un médicament</h2>
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
            <button type="submit" class="btn btn-custom" style="background-color: #B7ACF7;">Ajouter</button>
        </div>
    </form>
</div>

    </div>
</div>

</body>
</html>






