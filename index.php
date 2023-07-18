<!DOCTYPE html>
<html>
<head>
    <title>Moi Malade - Accueil</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #343a40;
            color: #ffffff;
            padding: 40px;
            text-align: center;
        }

        .container {
            max-width: 600px;
        }

        .logo {
            margin-bottom: 40px;
        }

        .btn-custom {
            color: #000000;
            background-color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="container">
    <div class="logo">
            <img src="logo_moi_malade.png" alt="Logo" style="width: 200px;">
        </div>
        <h1 class="mb-4">Moi Malade</h1>
        <p class="mb-4">Ce site est dédié aux administrateurs de "Moi Malade" et permet la gestion de la base de données.</p>
        <form method="POST" action="login.html">
            <button type="submit" class="btn btn-custom">Se connecter</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>