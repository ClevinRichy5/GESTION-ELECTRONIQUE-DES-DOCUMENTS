<?php
    session_start();

    require("DbConnexion.php");

    // Vérifier si l'utilisateur est connecté
    if (!isset($_SESSION['id_service'])) {
        header("Location: Login.php"); // Rediriger vers la page de connexion
        exit;
    }

    // Récupérer l'id_service de l'utilisateur connecté depuis la session
    $id_service = $_SESSION['id_service'];

    if (isset($_POST['savedocument'])) {
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

            // Insertion des données dans la table documents
            $sql = "INSERT INTO document (titre, description, date, auteur, fichier, id_service) 
                    VALUES (:titre, :description, :date, :auteur, :nom_fichier, :id_service)";
            $stmt = $base->prepare($sql);
            $stmt->bindParam(':titre', $titre);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':auteur', $auteur);
            $stmt->bindParam(':nom_fichier', $nom_fichier);
            $stmt->bindParam(':id_service', $id_service); // Utiliser l'id_service de la session
            if ($stmt->execute()) {
                header("Location: DashGlobal.php");
            } else {
                $message= 'Erreur d\'enregistrement : ' . implode(', ', $base->errorInfo());
            }
        } else {
            $message= 'Erreur de téléchargement du fichier.';
        }
    }
?>