
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SOCIETE CAMLAIT</title>
    <link rel="icon" type="image/svg+xml" href="img/img.png">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="styleLogin.css">
      <?php

        session_start();
        require("DbConnexion.php");

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $nom_service = $_POST['nomservice'];

    $sql = "INSERT INTO service (nom_service) VALUES (:nomservice)";
    $stmt = $base->prepare($sql);
    $stmt->bindParam(':nomservice', $nom_service);

    if ($stmt->execute()) {
        echo "Service ajouté avec succès.";
        
        //Redirection vers une autre page si nécessaire
        header("Location: Dashboard.php");
        exit();
    } else {
        echo "Erreur lors de l'ajout du service.";
    }
}
?>
</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="container" id="container">
        <div class="form-container sign-in-container">
            <form action="" method="post">
                <h1>Ajouter un service</h1><br>
                <input type="text" name="nomservice" placeholder="Nom du service" required /><br>
                <button name="addservice">Creer le service</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    <h1>Hello Bienvenue!</h1>
                    <p>CAMALIT CAMEROUN LA FORCE DU LAIT DEPUIS DES DECENNIEs </p>
                </div>
            </div>
        </div>
    </div>
    <!-- partial -->
    <script src="./script.js"></script>

</body>

</html>