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
$sql = "SELECT `id_document`, `titre`, `description`, `date`, `auteur`, `fichier`, `id_service` FROM `document` WHERE id_service=4";
$stmt = $base->prepare($sql);
$stmt->bindParam(':id_service', $_SESSION['id_service']);
$stmt->execute();
$documents = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?php
    require("DbConnexion.php");

    // Vérification si l'utilisateur est connecté
    if (!isset($_SESSION['id_service'])) {
        header("Location: Login.php"); // Rediriger vers la page de connexion
        exit;
    }

    // Récupérer l'id_service de l'utilisateur connecté depuis la session
    $id_service = $_SESSION['id_service'];

    // Fonction de recherche de documents
    function rechercherDocuments($titre, $base, $id_service) {
        $sql = "SELECT * FROM document WHERE titre LIKE :titre AND id_service = :id_service";
        $stmt = $base->prepare($sql);
        $titre = '%' . $titre . '%'; // Ajouter des caractères joker pour une recherche partielle
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':id_service', $id_service);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Vérification si la recherche a été soumise
    if (isset($_POST['recherche'])) {
        $titre = $_POST['titre']; // Récupérer le titre saisi dans le champ de recherche
        $documentsTrouves = rechercherDocuments($titre, $base, $id_service); // Appeler la fonction de recherche

        // Afficher les résultats de la recherche
        if (count($documentsTrouves) > 0) {
            echo '<h2>Résultats de la recherche</h2>';
            echo '<ul>';
            foreach ($documentsTrouves as $document) {
                echo '<li>' . $document['titre'] . '</li>';
            }
            echo '</ul>';
        } else {
            echo 'Aucun document trouvé.';
        }
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
<div class="table_header">
        <button type="submit" name="recherche">Rechercher</button>
        <input type="text" placeholder="Recherche Document" name="titre" class="search-input"> 
        <button class="add_new"> 
            <i class="fas fa-plus-circle add-icon"></i>
            <a href="SaveDocument.php">Add document</a>
        </button>
    </div>
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