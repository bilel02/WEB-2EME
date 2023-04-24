<?php
require_once('C:\xampp\htdocs\projetweb\Controller\reclamationC.php');

$reclamation = new Reclamation();
$allReclamations = $reclamation->getAllReclamations();

if ($allReclamations) {
    ob_start();
    ?>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Family Name</th>
                <th>Email</th>
                <th>Reclamation Text</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allReclamations as $reclamation) { ?>
                <tr>
                    <td><?= $reclamation->getName() ?></td>
                    <td><?= $reclamation->getFamilyName() ?></td>
                    <td><?= $reclamation->getEmail() ?></td>
                    <td><?= $reclamation->getReclamationText() ?></td>
                    <td><a href="modifierPage.php?id=<?= $reclamation->getId() ?>" class="btn btn-primary">Modifier</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php
    $reclamations_html = ob_get_clean();
} else {
    $reclamations_html = 'No reclamations found.';
}
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Website</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<!-- Navigation -->

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">RECLAMATION</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Ajouter</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="afficherPage.php">Afficher</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="suppPage.php">Rechercher</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<body class="masthead">
    <div class="container h-100">
        <h2 class="text-center" style=" color:brown;  ">Toutes les reclamations</h2>
        <div style="margin-top: 20px;">
            <?= $reclamations_html ?>
        </div>
    </div>
</body>
