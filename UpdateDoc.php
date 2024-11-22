<?php
session_start();
require("DbConnexion.php");

if (isset($_POST['update'])) {
  // Récupérer l'id_service de l'utilisateur connecté depuis la session
  $id_service = $_SESSION['id_service'];
  
  // Récupération des données du formulaire
  $titre = $_POST['titre'];
  $description = $_POST['description'];
  $auteur = $_POST['auteur'];
  $date = date('Y-m-d H:i:s'); // Date actuelle
  
  // Récupération du fichier téléchargé

  $file = $_FILES['fichier'];
  
  // Vérification si le fichier est bien téléchargé
  if ($file['error'] == 0) {
      // Mise en forme du nom du fichier
      $nom_fichier = uniqid() . '_' . $file['name'];
  
      // Déplacement du fichier vers le répertoire uploads
      move_uploaded_file($file['tmp_name'], 'document/' . $nom_fichier);
  
      // Mise à jour des données dans la table documents
      $sql = "UPDATE document SET titre = '$titre', description = '$description', date = '$date', auteur = '$auteur', fichier = '$nom_fichier' WHERE id_service = '$id_service'";
      if ($base->query($sql)) {
        header("Location: DashGlobal.php");
        exit;
      } else {
          echo 'Erreur de mise à jour : ' . implode(', ', $base->errorInfo());
      }
  } else {
      echo 'Erreur de téléchargement du fichier.';
  }
}
?>