<?php
require_once('C:\xampp\htdocs\projetweb\Controller\reclamationC.php');
   
// Check if action is set and is equal to 'edit'
if (isset($_GET['action']) && $_GET['action'] === 'edit') {
    // Get the ID of the reclamation to be edited
    $id = $_GET['id'];
    $reclamationC = new Reclamation();
  $reclamation = $reclamationC->getReclamationById($id);

  // If the form is submitted, update the reclamation details
  if (isset($_POST['submit'])) {
    $reclamation->updateReclamation($id, $_POST['name'], $_POST['familyName'], $_POST['email'], $_POST['category'], $_POST['reclamationText']);

    // Redirect to index.php after updating the reclamation details
    header('Location: afficherPage.php');
    exit;
  }

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
  <div class="row h-100 align-items-center">
    <div class="col-12 text-center">
      <div class="reclamation-box mx-auto" style="width: 600px; height: 600px; border: 2px solid black; background-color: white;"> 
        <h2 class="text-center">Modifier reclamation</h2>
        <form method="POST" action="afficherPage.php?action=update">
            
          <input type="hidden" name="id" value="8">
          <div class="form-group mb-3">
            <label for="nameInput" class="form-label">Prenom</label>
            <input type="text" class="form-control" id="nameInput" name="name" value="bilel" required>
          </div>
          <div class="form-group mb-3">
            <label for="familyNameInput" class="form-label">Nom</label>
            <input type="text" class="form-control" id="familyNameInput" name="familyName" value="chamkhi" required>
            <p style="color: red" id="nomEr"></p>
          </div>
          <div class="form-group mb-3">
            <label for="emailInput" class="form-label">Email</label>
            <input type="email" class="form-control" id="emailInput" name="email" value="bilel.chamkhi@esprit.tn" required>
          </div>
          <div class="form-group mb-3">
            <label for="dropdown" class="form-label">Type de reclamation</label>
            <select class="form-select" id="dropdown" name="category">
              <option value="option1">Option 1</option>
              <option value="option2">Option 2</option>
              <option value="option3">>Option 3</option>
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="reclamationText" class="form-label">Text de reclamation</label>
            <textarea class="form-control" id="reclamationText" rows="3" name="reclamationText" required>QAAA
              
            </textarea>
            <p style="color: red" id="descEr"></p>
          </div>
          <script src="saisir.js"></script>
          <button type="submit" class="btn btn-primary" onclick="return validateForm()">Modifier</button>
          <script>
            function validateForm() {
              var name = document.getElementById("nameInput").value;
              var fname = document.getElementById("familyNameInput").value;
              var email = document.getElementById("emailInput").value;

              if (!nameIsValid(name)) {
                alert("le PRENOM est invalide.");
                return false;
              }

              if (!nameIsValid(fname)) {
                alert("le NOM est invalide.");
                return false;
              }

              if (!emailIsValid(email)) {
                alert("Adresse email invalide.");
                return false;
              }

              return true;
            }

            function emailIsValid(email) {
              return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

function nameIsValid(name) {
  return /^[A-Za-z]+$/.test(name);
}
function nameIsValidd(fname) {
  return /^[A-Za-z]+$/.test(fname);
}


</script>
         
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
