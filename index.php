<?php

require 'vendor/autoload.php' ; //include composer goodies

$connection = new MongoDB\Client("mongodb://172.20.255.210:27017");
$db = $connection->dbtest;
$articles = $db->articles;

?>

<!-- <form action="" method="post">
   <input type="text" name="titre" placeholder="titre"/>
   <input type="text" name="contenu" placeholder="contenu"/>
   <input type="submit" value="Enregistrer" class="btn btn-success" />
</form> -->
<h1 class="col-4 offset-4">MongoDB</h1>

<h3 class="col-4 offset-4">Ajout</h3>
<form action="" method="post" class="col-4 offset-4">
  <div class="form-group">
  <br/>
    <label for="exampleInputEmail1">Titre</label>
    <input type="text" class="form-control" name="titre"  placeholder="titre">   
  </div>
  <div class="form-group">
    <label >Contenu</label>
    <input type="text" class="form-control"  placeholder="contenu" name="contenu">
  </div>
  
  <button type="submit" class="btn btn-success">Enregistrer</button>
</form>

<h3 class="col-4 offset-4">Suppression</h3>
<form action="" method="post" class="col-4 offset-4">
  <div class="form-group">
  <br/>
    <label >Titre</label>
    <input type="text" class="form-control" name="titres"  placeholder="titre">  
  </div>  
  <button type="submit" class="btn btn-danger">Supprimer</button>
</form>

<h3 class="col-4 offset-4">Rechercher</h3>
<form action="" method="post" class="col-4 offset-4">
  <div class="form-group">
  <br/>
    <label >Titre</label>
    <input type="text" class="form-control" name="rechercher"  placeholder="titre">  
  </div>  
  <button type="submit" class="btn btn-warning">Rechercher</button>
</form>


<?php

$date = Date('d/m/Y à H:i');
// echo $date;


 if(!empty($_POST['titre']) && !empty($_POST['contenu']) && !empty($date))
 {
// rajouter les éléments
   $insertOneResult = $articles->insertOne([
      'titre' => $_POST['titre'],
      'contenu' => $_POST['contenu'],
      'date' =>  $date,
      ]);

 }


    if(!empty($_POST['titres'])){
      // supprimer un element
       $deleteOneResult = $articles->deleteOne([
          'titre' => $_POST['titres'],
          ]);
          echo "<h3 class=\"col-4 offset-4\" style=\"color : red\"> vous avez supprimer le contenu : " . $_POST['titres']. "</h3>";
         }

if(isset($_POST['rechercher'])){

   $findOneResult= $articles->findOne([

      'titre' => $_POST['rechercher']
     
      
   ]);
}


?>

<!DOCTYPE html>
    <html lang="fr">
    <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <meta http-equiv="X-UA-Compatible" content="ie=edge">
       <title>MongoDB</title>
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
<div class="container">
<table class="table table-striped table-dark col-8 offset-2">
<thead>
     <tr>
        <th scope="col">
           Titre
        </th>
        <th scope="col">
            Contenu
        </th>
        <th scope="col">
            Date
        </th>       
     </tr>
     </thead>
     <tbody>
<?php

$updateResult = $articles->updateMany(

   ['date' => ['$exists' => false]],
  
   ['$set' => ['date' => $date]]
  
  );

   $affiche = $articles->find();
   
if(!empty($_POST['rechercher'])){
   echo "<td>" . $document->titre . "</td><td>". $document->contenu . "</td><td>" . $document->date . "</td>" ;
}
else
{
   foreach ($affiche as $document) {
      echo "<tr>";
      echo "<td>" . $document->titre . "</td><td>". $document->contenu . "</td><td>" . $document->date . "</td>" ;
      echo "<tr/>";
      
   }
}

?>
</tbody>
</table>
</div>



    </body>
    </html>

    <!-- ObjectId("5cde86ffb1613d144000754a") -->