<?php
// Inclure le fichier "translation.php"
include('translations/translation.php');
?>

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
        <img src="logo_moi_malade.png" alt="Logo" style="width: 75px;">
        <?php echo $translations['siteName']; ?>
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
                    <a class="dropdown-item" href="symptoms.php"><?php echo $translations['symptoms']; ?></a>
                    <a class="dropdown-item" href="disease.php"><?php echo $translations['names']; ?></a>
                    <a class="dropdown-item" href="#"><?php echo $translations['medications']; ?></a>
                    <a class="dropdown-item" href="description.php"><?php echo $translations['description']; ?></a>
                    <a class="dropdown-item" href="sympt_desc.php"><?php echo $translations['sympDesc']; ?></a>
                    <a class="dropdown-item" href="medic_desc.php"><?php echo $translations['medicDesc']; ?></a>
                    <a class="dropdown-item" href="whois.php"><?php echo $translations['whoIs']; ?></a>
                    <a class="dropdown-item" href="tests_proc.php"><?php echo $translations['testProc']; ?></a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="langDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php if($lang == 'fr'): ?>
                        <img src="french_flag.png" alt="French" class="language-flag" style="width: 25px;">
                    <?php elseif($lang == 'en'): ?>
                        <img src="english_flag.png" alt="English" class="language-flag" style="width: 25px;">
                    <?php endif; ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="langDropdown">
                    <a class="dropdown-item" href="?lang=fr" alt="FR"><?php echo $translations['french']; ?></a>
                    <a class="dropdown-item" href="?lang=en" alt="EN"><?php echo $translations['english']; ?></a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><?php echo $translations['logout']; ?></a>
            </li>
        </ul>
    </div>
</nav>
