<?php

require('DbConnexion.php');
 if(isset($_POST['Oui'])){
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sql="DELETE FROM `document` WHERE id_document=$id";

        $query=$base->prepare($sql);
        $query->execute();

    }
    header('Location:./DashGlobal.php');
 }
 if(isset($_POST['Non'])){
    header('Location:./DashGlobal.php');
 }
?>
