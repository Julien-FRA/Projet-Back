<?php

// Admin, ajout des produits

if (isset($_POST['submit'])) {

  if (!empty($_FILES["img_produit"]["name"])) {

    $img_produit = $_FILES['img_produit']['name'];    
    $target_dir = "wamp64/www/Projet-Back/asset/img/";
    $target_file = $target_dir . basename($_FILES["img_produit"]["name"]);
    // Select file type
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Valid file extensions
    $extensions_arr = array("jpg", "jpeg", "png", "gif");

    if (isset($_POST['titre_produit']) && $_POST['titre_produit'] !== '') {
      $titre_produit = $_POST['titre_produit'];
      if (isset($_POST['desc_produit']) && $_POST['desc_produit'] !== '') {
        $desc_produit = $_POST['desc_produit'];
        if (isset($_POST['prix_produit']) && $_POST['prix_produit'] !== '') {
          $prix_produit = $_POST['prix_produit'];
          if(move_uploaded_file($img_produit, "$target_file")) {

            try {

              //On insère les données reçues
              $sth = $pdo->prepare("
                        INSERT INTO produits(img_produit, titre_produit, desc_produit, prix_produit)
                        VALUES(:img_produit, :titre_produit, :desc_produit, :prix_produit)");
              $sth->bindParam(':img_produit', $img_produit);
              $sth->bindParam(':titre_produit', $titre_produit);
              $sth->bindParam(':desc_produit', $desc_produit);
              $sth->bindParam(':prix_produit', $prix_produit);
              $sth->execute();

              //On renvoie l'utilisateur vers la page liste
              header("Location:admin.php");
            } catch (PDOException $e) {
              echo 'Impossible de traiter les données. Erreur : ' . $e->getMessage();
            } 
          } else {
            echo 'Erreur de traitement du fichier image';
          }
        } else {
          echo 'Veuillez rentrer le prix du produit';
        }
      } else {
        echo 'Veuillez rentrez la description de votre produit';
      }
    } else {
      echo 'Veuillez rentrer le nom du produit';
    }
  } else {
    echo 'Veuillez insérer votre image';
  }
}
