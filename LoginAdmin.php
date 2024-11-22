
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
require("DbConnexion.php");
 
        if(isset($_POST['Envoyer'])) {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        
        $email = $_POST['email'];
        $password = $_POST['password'];
        $req = $base->prepare("SELECT * FROM admin WHERE email = :email AND password = :password");
        $req->bindParam(':email', $email);
        $req->bindParam(':password', $password);
        $req->execute();
        $result = $req->fetch();

        if ($result !== false) {
            // Début de la session
            session_start();
            // Redirection vers Dashboard.php
            header("Location: Dashboard.php");
            exit;
        } else {
            $message = "Erreur : Compte admin inexistant";
        }
    } else {
        $message = "Veillez remplir les champs svp";
    }
}
?>
</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="container" id="container">
        <div class="form-container sign-in-container">
            <form action="" method="post">
                <h1>BIENVENUE ADMINISTRATEUR</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                </div>
                <span>Veillez saisir vos informations</span>
                <input type="email" name="email" placeholder="Email" required />
                <input type="password" name="password"  placeholder="Password" required />
                <!-- <a href="#">Forgot your password?</a> -->
                <button name="Envoyer">Connexion</button>
                    <p class="text">
                        <i style="color:red">
                    <?php
                            if(isset($message)){
                                echo $message;
                            }
                    ?>
                    </i>
                    </p>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                <style>
                 h1, p {
                     position: relative;
                    transition: transform 0.3s ease-in-out, z-index 0s linear 0.3s;
                    cursor:pointer;
                    text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 40px #fff;
                    font-weight:bold;
                        }
                     h1:hover, p:hover {
                         transform: translateY(-10px);
                            z-index: 1;
                            }
                     h1:hover + p, p:hover {
                            z-index: 1;
                            }
                    </style>
                    <h1>Hello Bienvenue!</h1>
                    <p>CAMALIT CAMEROUN LA FORCE DU LAIT DEPUIS DES DECENIES </p>
                </div>
            </div>
        </div>
    </div>
    <!-- partial -->
    <script src="./script.js"></script>

</body>

</html>