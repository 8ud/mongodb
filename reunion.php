<?php

require 'vendor/autoload.php' ; //include composer goodies

$connection = new MongoDB\Client("mongodb://172.20.255.210:27017");
$db = $connection->dbtest;
$reunion = $db->reunion;


if(isset($_POST['lieu']) && isset($_POST['date']) && isset($_POST['heure']) && isset($_POST['theme']) && isset($_POST['duree'])){

   $insertOneResult = $reunion->insertOne([
      'lieu' => $_POST['lieu'],
      'date' => $_POST['date'],
      'heure' => $_POST['heure'],
      'theme' => $_POST['theme'],
      'duree' => $_POST['duree'],
      
      ]);
   }

   
?>

<h1 class="col-4 offset-4">Reunion</h1>

<h3 class="col-4 offset-4">Ajout Réunion</h3>
<form action="" method="post" class="col-4 offset-4">
  <div class="form-group">
  <br/>
    <label>Lieu</label>
    <input type="text" class="form-control" name="lieu"  placeholder="lieu">   
  </div>
  <div class="form-group">
    <label >Date</label>
    <input type="text" class="form-control"  placeholder="date" name="date">
  </div>
    <label >Heure de debut</label>
    <input type="text" class="form-control"  placeholder="heure" name="heure">
  </div>
    <label >Theme</label>
    <input type="text" class="form-control"  placeholder="theme" name="theme">
  </div>
    <label >Durée</label>
    <input type="text" class="form-control"  placeholder="duree" name="duree">
  </div>
  
  <button type="submit" class="btn btn-success">Enregistrer</button>
</form>



<!DOCTYPE html>
    <html lang="fr">
    <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <meta http-equiv="X-UA-Compatible" content="ie=edge">
       <title>Reunion</title>
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
    <div class="container">
<table class="table table-striped table-dark col-8 offset-2">
<thead>
     <tr>
        <th scope="col">
           Lieu
        </th>
        <th scope="col">
            Date
        </th>
        <th scope="col">
            Heure de début
        </th>
        <th scope="col">
            Theme
        </th>
        <th scope="col">
            Durée
        </th>
        <th scope="col">
            Inscription
        </th>
     </tr>
     </thead>
     <tbody>

<?php 
$affiche = $reunion->find();

// if(empty($_POST['lieu']) && empty($_POST['date']) && empty($_POST['heure']) && empty($_POST['theme']) && empty($_POST['duree'])){

   
   foreach ($affiche as $document) {
      echo "<tr>";
      echo "<td>" . $document->lieu . "</td><td>". $document->date . "</td><td>" . $document->heure . "</td><td>" . $document->theme . "</td><td>" . $document->duree . "</td><td><a href=\"inscription.php?lieu=".$document->lieu."\">s'inscrire</a></td>" ;
      echo "<tr/>";
   }
// }
?>



    </body>
    </html>