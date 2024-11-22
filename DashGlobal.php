<?php
session_start();
require("DbConnexion.php");

// Vérification si l'utilisateur est connecté
if (!isset($_SESSION['id_service'])) {
    header("Location: Login.php"); // Rediriger vers la page de connexion
    exit;
}

// Récupérer les informations relatives à l'id_service de l'utilisateur connecté
$id_service = $_SESSION['id_service'];

// Récupérer les informations du document de l'utilisateur connecté
$sql = "SELECT * FROM document WHERE id_service = :id_service";
$stmt = $base->prepare($sql);
$stmt->bindParam(':id_service', $id_service);
$stmt->execute();
$documents = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?php
  // Vérifiez si le formulaire de recherche a été soumis
if (isset($_POST['recherche'])) {
  // Récupérer le titre saisi par l'utilisateur
  $titre_recherche = $_POST['titre'];

  // Préparer une requête SQL pour chercher le document par titre
  $stmt = $base->prepare("SELECT * FROM documents WHERE titre LIKE :titre");
  $stmt->execute(['titre' => '%' . $titre_recherche . '%']);
  
  // Récupérer les documents correspondants
  $documents = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
  // Si ce n'est pas une recherche, récupérer tous les documents
  $stmt = $base->query("SELECT * FROM documents");
  // $documents = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SOCIETE CAMLAIT</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="icon" type="image/svg+xml" href="img/img.png">
  <link rel="stylesheet" href="styleDash.css">
</head>
<body>
<?php
require("DbConnexion.php");

// Vérifiez si l'utilisateur est connecté
if (isset($_SESSION['id_service'])) {
    // Récupérez le nom du service correspondant à l'ID de service
    $id_service = $_SESSION['id_service'];
    $sql = "SELECT nom_service FROM service WHERE id_service = :id_service";
    $stmt = $base->prepare($sql);
    $stmt->bindParam(':id_service', $id_service);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $nom_service = $result['nom_service'];

    // Remplacez le texte "Service" par le nom du service
    $entête_de_service = '<p>' . $nom_service . '</p>';
} else {
    // Si l'utilisateur n'est pas connecté, affichez le texte par défaut
    $entête_de_service = '<p>Service</p>';
}

// Affichez le code HTML avec le nom du service dynamique
echo '<div class="table_header">
        ' . $entête_de_service . '
        
        <input type="text" placeholder="Recherche Document" name="titre" class="search-input"> 
        <button class="add_new"> 
        <i class="fas fa-arrow-left previous-icon"></i>
        <a href="acceuil.php">Precedent</a>
     </button>
        <button class="add_new"> 
            <i class="fas fa-plus-circle add-icon"></i>
            <a href="SaveDocument.php">Add document</a>
        </button>
    </div>';
?>
      <div class="table_section">
        <table>
          <thead>
            <tr>
              <th>Reference</th>
              <th>Titre</th>
              <th>Description</th>
              <th>Date</th>
              <th>Auteur</th>
              <th>Document</th>
             <div class="action"><th>Action</th></div> 
            </tr>
          </thead>
          <tbody>
            <?php foreach ($documents as $document) { ?>
            <tr>
              <td><?php echo $document['id_document']; ?></td>
              <td><?php echo $document['titre']; ?></td>
              <td><?php echo $document['description']; ?></td>
              <td><?php echo $document['date']; ?></td>
              <td><?php echo $document['auteur']; ?></td>
              <td><a href="<?php echo 'document/' . $document['fichier']; ?>"><i class="fas fa-download"></i></a></td>
              <td>
              <a href="formDeleteDoc.php?id=<?= $document["id_document"]?>"name="delete"><button><i class="fa fa-trash-alt"></i></a></button>
              <a href="formEditDoc.php?id=<?= $document["id_document"]?>"name="edit"><button><i class="fa fa-edit"></i></a></button>
              </td>
            </tr>
            <?php 
          }
       ?>
          </tbody>
        </table>
      </div>
    </div>
</body>
</html>