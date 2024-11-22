<?php  

 require("DbConnexion.php");

//  include 'selectlabo.php';

  // Récupérer tous les services
  $sql = "SELECT * FROM service";
  $stmt = $base->prepare($sql);
  $stmt->execute();
  $services = $stmt->fetchAll(PDO::FETCH_ASSOC);
 ?>
  <?php
// Connexion à la base de données
require("DbConnexion.php"); // Assurez-vous que ce fichier contient votre connexion à la base de données

// Requête pour compter le nombre de documents
$sql = "SELECT COUNT(*) as total_documents FROM document"; // Remplacez 'documents' par le nom de votre table
$stmt = $base->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Récupérer le nombre de documents
$total_documents = $result['total_documents'];

?>
  <?php
// Connexion à la base de données
require("DbConnexion.php");

// Requête pour compter le nombre de user
$sql = "SELECT COUNT(*) as total_user FROM user"; 
$stmt = $base->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Récupérer le nombre de user
$total_user = $result['total_user'];

?>
  <?php
// Connexion à la base de données
require("DbConnexion.php"); 

// Requête pour compter le nombre de service
$sql = "SELECT COUNT(*) as total_service FROM service";
$stmt = $base->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Récupérer le nombre de service
$total_service = $result['total_service'];
?>
  <?php
// Connexion à la base de données
require("DbConnexion.php"); 

// Requête pour compter le nombre de admin
$sql = "SELECT COUNT(*) as total_admin FROM admin";
$stmt = $base->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Récupérer le nombre de admin
$total_admin = $result['total_admin'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SOCIETE CAMALIT</title>
  <link rel="icon" type="image/svg+xml" href="img/img.png">
  <link rel="stylesheet" href="main.css">
  <!-- box icon -->
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>
<body>
<style>
      .sidebar{
            height: 200px; /* Taille de la div */
            overflow-y: auto; /* Activer le défilement vertical */
            border: 1px solid #ccc; /* Bordure pour visualiser */
            padding: 10px; /* Espacement intérieur */
            height:100%
        }
    </style>
  <div class="sidebar">
    <div class="logo_details">
      <i class="fa fa-building"></i> 
      <div class="logo_name">
        Bienvenue administrateur
      </div>
    </div>
    <ul>
      <li>
        <a href="#" class="active">
        <i class="fas fa-test-tube-bundle"></i>
          <span class="links_name">
           Acceuil
          </span>
        </a>
      </li>
      <li>
      <a href="selectInformatique.php">
          <i class='fa fa-laptop'></i>
          <span class="links_name" id="">
             Informatique
          </span>
        </a>
      </li>
      <li>
        <a href="selecttransport.php">
          <i class="fa fa-truck"></i> 
          <span class="links_name" >
           Logistiques
          </span>
        </a>
      </li>
      <li>
        <a href="selectressource.php">
          <i class='fa fa-users' ></i>
          <span class="links_name">
           Ressource Humaine
          </span>
        </a>
      </li>
      <li>
        <a href="selectmaintenance.php">
          <i class='fa fa-car'></i>
          <span class="links_name" id="">
           Maintenance  
          </span>
        </a>
      </li>
      </li>
      <li>
        <a href="selectlabo.php">
        <i class="fas fa-bacterium"></i>
          <span class="links_name" id="">
           Laboratoire  
          </span>
        </a>
      </li>
      </li>
      <li>
        <a href="selectComptabilite.php" class="">
          <i class='fa fa-briefcase'></i>
          <span class="links_name">
           Comptabiite
          </span>
        </a>
      </li>
      <li>
      <a href="selecttresorie.php" class="">
      <i class='fa fa-money-bill-wave'></i>
          <span class="links_name">
           Tresorerie
          </span>
        </a>
      </li>
      <li>
      <a href="selectcaisse.php" class="">
      <i class='fa fa-cash-register'></i>
          <span class="links_name">
           Caisse
          </span>
        </a>
      </li>
      <li>
        <a href="selectsecretariat.php" class="">
        <i class='fa fa-file-alt'></i>
          <span class="links_name">
           Secretariat
          </span>
        </a>
      </li>
      <li>
        <a href="selectComptabilite.php" class="">
        <i class='fa fa-chart-line'></i>
          <span class="links_name">
         Controles de gestion
          </span>
        </a>
      </li>
      <li>
        <a href="selectComptabilite.php" class="">
        <i class='fa fa-shopping-cart'></i>
          <span class="links_name">
          Achat
          </span>
        </a>
      </li>
      <li>
        <a href="Login.php" class="">
        <i class='bx bx-log-out'></i>
          <span class="links_name">
           Logout
          </span>
        </a>
      </li>
    </ul>
  </div>
  <!-- End Sideber -->
  <section class="home_section">
    <div class="topbar">
      <div class="toggle">
        <!-- <i class='bx bx-menu' id="btn"></i> -->
      </div>
      <!-- <form action="searchtitre.php" method="GET">
      <div class="search_wrapper">
        <label>
          <span>
            <i class='bx bx-search'></i>
          </span>
          <input type="search" placeholder="Search..." name="search_query">
          <button type="submit">Rechercher</button>
        </label>
      </div>
      </form> -->
      <div class="user_wrapper">
        <img src="img/user.jpg" alt="">
      </div>
    </div>
    <div class="card-boxes">
      <div class="box">
        <div class="right_side">
        <div class="numbers"><?php echo $total_user; ?></div>
          <div class="box_topic">Utilisateur </div>
        </div>
        <i class="bx bx-user"></i>
      </div>
      <div class="box">
        <div class="right_side">
        <div class="numbers"><?php echo $total_documents;?></div>
          <div class="box_topic">Document</div>
        </div>
        <i class="bx bxs-file"></i>
      </div>
      <div class="box">
        <div class="right_side">
        <div class="numbers"><?php echo $total_service;?></div>
          <div class="box_topic">Service</div>
        </div>
        <i class="bx bx-briefcase"></i>
      </div>
      <div class="box">
        <div class="right_side">
        <div class="numbers"><?php echo $total_admin;?></div>
          <div class="box_topic">administrateur</div>
        </div>
        <i class="bx bx-cog"></i>
      </div>
    </div>
   
    <!-- End Card Boxs -->
    <div class="details">
      <div class="recent_project">
        <div class="card_header">
        <a href="formaddservice.php"class="btn btn-primary">Ajouter</a>
          <h2>Service</h2>
        </div>
        <table class="table">
      <thead>
        <tr>
          <th>Nom</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($services as $service) { ?>
          <tr>
            <td><?php echo htmlspecialchars($service['nom_service']); ?></td>
            <td>
              <a href="formdelete.php?id=<?php echo $service['id_service']; ?>" class="btn btn-primary">Supprimer</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
      </div>
      </div>
    </div>
  </section>
</body>
</html>
