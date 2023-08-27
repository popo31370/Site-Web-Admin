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
            <h2 class="card-title text-center">Ajouter un test et procédure</h2>
            <form action="add_tests_proc_post.php" method="post">
                <div class="form-group">
                    <label for="nomFr">Nom en français</label>
                    <input type="text" class="form-control" id="nomFr" name="nomFr" required>
                </div>
                <div class="form-group">
                    <label for="nomEn">Nom en anglais</label>
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
