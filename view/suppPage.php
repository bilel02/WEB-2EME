<?php
require_once('C:\xampp\htdocs\projetweb\Controller\reclamationC.php');

$reclamation = new Reclamation();

$reclamations_html = ''; // initialize variable to empty string

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $reclamations = $reclamation->getReclamationsByEmail($email);
    
    if ($reclamations != null) {
      ob_start();
      foreach ($reclamations as $r) {
        ?>
        <div class="reclamation-element" style="border: 2px solid yellow;">
          <div class="your-reclamations">
            <p>name: <?= $r['name'] ?></p>
            <p>family name: <?= $r['family_name'] ?></p>
            <p>email: <?= $r['email'] ?></p>
            <p>reclamation text: <?= $r['reclamation_text'] ?></p>
          </div>
          <form method="post">
            <input type="hidden" name="id" value="<?= $r['id'] ?>">
            <button type="submit"  class="btn btn-danger" name="delete">Supprimer</button>
          </form>
          <form method="get" action="modifPage.php">
            <input type="hidden" name="id" value="<?= $r['id'] ?>">
            <button type="submit" class="btn btn-primary" name="modify">Modifier</button>
          </form>
        </div>
        <?php
      }
      $reclamations_html = ob_get_clean();
    } else {
      $reclamations_html = 'No reclamations found for email ' . $email;
    }
}
    if (isset($_POST['delete'])) {
      $id = $_POST['id'];
      $reclamation->deleteReclamationById($id);
      exit();
      header('Location: suppPage.php');
    }

    if(isset($_POST['id'])){
      $id = $_GET['id'];
      header('Location: modifierPage.php?id=' . $id );
    }
?>


<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My Website</title>
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
          <a class="nav-link" href="#">Rechercher</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<body class="masthead" style="
    height: 100vh;
    min-height: 500px;
    background-image: url('https://source.unsplash.com/BtbjCFUvBXs/1920x1080');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
">
  <div class="container h-100">
    <div class="row h-100 align-items-center">
      <div class="col-12 text-center">
        <div class="reclamation-box mx-auto" style="width: 100%; height: 100%; border: 2px solid black; background-color: white;style=; margin-top:80px;"> 
          <div class="delete-box" style="margin-top:10px;">
            <h3 >Recherchez vos reclamations</h3>
            <form method="post" action="" style="margin-top:20px;">
                <input type="email" name="email" placeholder="Enter email">
                <button type="submit"  class="btn btn-primary" >Rechercher</button>
            </form>
            </div>
            <div class="search-result" style="
                display:flex;
                padding: 15px;
                ">
                <?= $reclamations_html ?>
            </div>
        </div>
      </div>
    </div>
  </div>
</body>