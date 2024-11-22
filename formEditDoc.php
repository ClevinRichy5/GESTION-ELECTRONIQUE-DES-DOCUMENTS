<?php

        session_start();
        require("DbConnexion.php");
  $id = $_GET['id'];
 $req="SELECT * FROM document WHERE id_document = $id ";
 $requete=$base->query($req);
 $document=$requete->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SOCIETE CAMLAIT</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="upload.css">
    <link rel="icon" type="image/svg+xml" href="img/img.png">
    <link rel="stylesheet" href="save.css">

</head>
<body>
    <!-- partial:index.partial.html -->
    <div class="container" id="container">
        <div class="form-container sign-in-container">
            <form action="UpdateDoc.php" method="post" enctype="multipart/form-data">
                <h1>Ajouter un document</h1>
                <span>Bienvenue chez CAMLAIT CAMEROUN</span>
                <input type="text" name="titre" placeholder="Titre du document" value="<?php echo $document['titre']?>">
                <input type="text" name="description" placeholder="Description du document" value="<?php echo $document['description']?>" >
                <input type="date"  name="date" placeholder="Date de création du document"  value="<?php echo $document['date']?>">
                <input type="text" name="auteur" placeholder="Auteur du document"  value="<?php echo $document['auteur']?>">
                 <div class="wrapper">
                    <div class="box">
                        <div class="input-bx">
                            <h2 class="uploard-area-title">IMPORTER LE DOCUMENT</h2>
                            <form action="">
                                <input type="file" name="fichier" id="upload" accept=".doc,.docx,.pdf,.Excel,.png,.jpg,.mp3" value="<?php echo $document['fichier']?>" hidden>
                                <label for="upload" class="uploadlabel">
                                    <span><i class="fa fa-upload"></i></span>
                                    <p>Click ici</p>
                                </label>
                              <div class="savedoc">
                                <button name="update">Modifier le Document</button>
                              </div>  
                            </form>
                        </div>
                        <div id="filewrapper">
                            <!-- <h3 class="uploaded">Uploaded Document</h3> -->
                            <!-- <div class="showfilebox">
                                <div class="left">
                                    <span class="filetype">PDF</span>
                                    <h3>Ravi Web.pfd</h3>
                                </div>
                                <div class="right">
                                    <span>&#215;</span>
                                </div>
                            </div> -->
                        </div>
                    </div>
                 </div>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Hello Bienvenue!</h1>
                    <p>CAMALIT CAMEROUN LA FORCE DU LAIT DEPUIS DES DECENNIES </p>
                    <button class="ghost" id="signIn">Se Connecter</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello Bienvenue!</h1>
                    <p>CAMALIT CAMEROUN LA FORCE DU LAIT DEPUIS DES DECENNIE </p>
                </div>
            </div>
        </div>
    </div>
    <!-- partial -->
    <script src="upload.js"></script>

</body>

</html>