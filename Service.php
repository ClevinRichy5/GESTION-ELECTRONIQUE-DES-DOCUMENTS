<?php

session_start();
require("DbConnexion.php");
if (isset($_POST["Connexion"])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $service = $_POST['service'];

    // Hasher le mot de passe saisi
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Vous n'avez pas besoin de hasher le mot de passe ici pour la vérification, seulement pour l'enregistrement
    $sql = "SELECT id_service, nom_service FROM service";
    $stmt = $base->prepare($sql);
    $stmt->execute();
    $services = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $sql = "SELECT * FROM user WHERE email = :email AND password = :password AND id_service = :id_service"; // Ne pas utiliser le mot de passe ici
    $stmt = $base->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':id_service', $service);
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Vérification du mot de passe
        if (password_verify($password, $userData['password'])) {
            $_SESSION['id_service'] = $userData['id_service'];
            header("Location: acceuil.php");
            exit;
        } else {
            $message = "Mot de passe incorrect.";
        }
    } else {
        $message = "Nom d'utilisateur ou service incorrect.";
    }
}
?>