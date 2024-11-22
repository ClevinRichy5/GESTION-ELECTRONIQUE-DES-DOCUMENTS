
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SOCIETE CAMLAIT</title>
    <link rel="icon" type="image/svg+xml" href="img/img.png">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">

    <?php
         session_start();

        require("DbConnexion.php");

        if(isset($_POST["Enregistre"])){

            $nom=$_POST["nom"];
            $email=$_POST["email"];
            $password=$_POST["password"];
            $service=$_POST["service"];
            $_SESSION['id_service'] = $user['id_service'];
            // Hasher le mot de passe saisi
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $PreparedStatement = "INSERT INTO user (nom, email, password, id_service) VALUES ('$nom','$email','$password','$service')";

            $stmt = $base->prepare($PreparedStatement);

            $stmt->execute();
            $message= "Le compte a été créé avec succès.";
        }
        // Récupération des services de la table service
        $sql = "SELECT id_service, nom_service  FROM service";
        $stmt = $base->prepare($sql);
        $stmt->execute();
        $services = $stmt->fetchAll(PDO::FETCH_ASSOC);

    ?>
    <?php

require("DbConnexion.php");
 
        if(isset($_POST['Connexion'])) {

        $email = $_POST['email'];
        $password = $_POST['password'];
        $id_service= $_POST['service'];
        $req = $base->prepare("SELECT * FROM user WHERE email = :email AND password = :password AND id_service = :id_service");
        $req->bindParam(':email', $email);
        $req->bindParam(':password', $password);
        $req->bindParam(':id_service', $id_service);
        $req->execute();
        $result = $req->fetch();

        if ($result !== false) {
            // Début de la session
            session_start();
            $_SESSION['id_service'] = $result['id_service'];
            // Redirection vers Dashboard.php
            header("Location: acceuil.php");
            exit;
        } else {
            $message = "Erreur : Nom d'utilisateur ou service incorrect.";
        }
    } else {
        $message = "Veillez remplir les champs svp";
    }
?>

</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="" method="post">
                <h1>SIGN UP</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                </div>
                <span>or use your email for registration</span>
                <input type="text" name="nom" placeholder="Name" required />
                <input type="email" name="email" placeholder="Email" required />
                <input type="password"  name="password" placeholder="Password" required />
                <select name="service" id="">
                <?php foreach ($services as $service): ?>
                <option value="<?php echo $service['id_service']; ?>">
                    <?php echo $service['nom_service']; ?>
                </option>
            <?php endforeach; ?>
                </select>
                <button name="Enregistre">Creer un compte</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="" method="post">
                <h1><a href="LoginAdmin.php">LOGIN</a></h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                </div>
                <span>or use your account</span>
                <input type="email" name="email" placeholder="Email" required />
                <input type="password" name="password"  placeholder="Password" required />
                <select name="service" id="">
                <?php foreach ($services as $service): ?>
                <option value="<?php echo $service['id_service']; ?>">
                    <?php echo $service['nom_service']; ?>
                </option>
            <?php endforeach; ?>
                </select>
                <!-- <a href="#">Forgot your password?</a> -->
                <button name="Connexion">Connexion</button>
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
                <div class="overlay-panel overlay-left">
                    <style>
                 h1, p {
                     position: relative;
                    transition: transform 0.3s ease-in-out, z-index 0s linear 0.3s;
                    cursor:pointer;
                    text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 40px #fff;
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
                    <span>CAMLAIT CAMEROUN LA FORCE DU LAIT DEPUIS DES DECENIES</span>
                    <button class="ghost" id="signIn">Se Connecter</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello Bienvenue!</h1>
                    <p>CAMLAIT CAMEROUN LA FORCE DU LAIT DEPUIS DES DECENNIE </p>
                    <button class="ghost" id="signUp">Creer un compte</button>
                </div>
            </div>
        </div>
    </div>
    <!-- partial -->
    <script src="./script.js"></script>

</body>

</html>