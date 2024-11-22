<?php
require('deleteservice.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOCIETE CAMLAIT</title>
    <link rel="stylesheet" href="delete.css">
</head>
<body>
    <form action="" method="post">
    <div class="container">
       <div class="texte">
       <h3>Voulez-vous supprimer ce service</h3>
       </div> 
       <div class="confirmation">
        <div class="deleteyes">
        <button type="submit" name="Oui">OUI</button>
        </div>
      <div class="deleteno">
      <button type="submit" name="Non">NON</button>
      </div>
       </div>
    </div>
</form>
</body>
</html>