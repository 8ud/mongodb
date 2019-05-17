<?php

require 'vendor/autoload.php' ; //include composer goodies

$connection = new MongoDB\Client("mongodb://172.20.255.210:27017");
$db = $connection->dbtest;
$reunion = $db->reunion;

if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mail']) && isset($_POST['tel'])){

   
   // $insertInscrit = $reunion->insertOne([
      // 'nom' => $_POST['nom'],
      // 'prenom' => $_POST['prenom'],
      // 'mail' => $_POST['mail'],
      // 'tel' => $_POST['tel'],
      
      // ]);

    }

   if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mail']) && isset($_POST['tel']) && isset($_GET['lieu'])) {

      echo "essai" . $_GET['lieu'] ." " . $_POST['nom'] ." " . $_POST['prenom'] ." " .$_POST['mail'] ." " . $_POST['tel'];
     
      $update = $reunion->updateOne(
     
      ['lieu' => $_GET['lieu']],
     
      ['$push' => [inscrit =>['nom' => $_POST['nom'],'prenom' => $_POST['prenom'],'mail' => $_POST['mail'],'tel' => $_POST['tel']]]],
     
      );
      echo "vous etes inscrits a la reunion";
   }

   






?>

<!DOCTYPE html>
    <html lang="fr">
    <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <meta http-equiv="X-UA-Compatible" content="ie=edge">
       <title>inscription</title>
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
    <h3 class="col-4 offset-4">S'inscrire à la Réunion</h3>
<form action="" method="post" class="col-4 offset-4">
  <div class="form-group">
  <br/>
    <label>Nom</label>
    <input type="text" class="form-control" name="nom"  placeholder="nom">   
  </div>
  <div class="form-group">
    <label >Prénom</label>
    <input type="text" class="form-control"  placeholder="prenom" name="prenom">
  </div>
    <label >Mail</label>
    <input type="mail" class="form-control"  placeholder="mail" name="mail">
  </div>
    <label >Telephone</label>
    <input type="text" class="form-control"  placeholder="tel" name="tel">
  </div>
    
  <button type="submit" class="btn btn-success">S'inscrire</button>
</form>
<a href="reunion.php">Retour à réunion</a>

    </body>
    </html>