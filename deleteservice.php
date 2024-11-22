<?php

require('DbConnexion.php');
 if(isset($_POST['Oui'])){
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sql="DELETE FROM `service` WHERE id_service=$id";

        $query=$base->prepare($sql);
        $query->execute();

    }
    header('Location:Dashboard.php');
 }
 if(isset($_POST['Non'])){
    header('Location:Dashboard.php');
 }
?>
