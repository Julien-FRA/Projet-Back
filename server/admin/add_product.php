<?php

// Admin, ajout des produits

if (isset($_POST['submit'])) {

  // var_dump($_POST);
  // die;

  if (!empty($_FILES['img_produit']['name'])) {


    $img_produit = $_FILES['img_produit']['name'];    
    $target_dir = "C:\wamp64\www\Projet-Back\asset\upload\\";//../../asset/upload/\\
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
          if (in_array($imageFileType, $extensions_arr)) {
            if (move_uploaded_file($_FILES['img_produit']['tmp_name'], $target_file)) {
              $uniq_file_name = str_replace(' ', '_', uniqid() . '_' . basename($_FILES["img_produit"]["name"]));
                if (rename($target_dir . basename($_FILES["img_produit"]["name"]), $target_dir . $uniq_file_name)) 
                  echo basename($_FILES["img_produit"]["name"]);

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
            echo 'Vous devez avoir un fichier de type jpg jpeg png ou gif';
          }
        } else {
          echo 'Veuillez rentrez le prix de votre produit';
        }
      } else {
        echo 'Veuillez rentrer la description de votre produit';
      }
    } else {
      echo 'Veuillez rentrer le nom de votre produit';
    }
  } else {
    echo 'Veuillez insérer votre image';
  }
}
