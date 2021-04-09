<?php

// Admin, ajout des produits

$err_prt = '';

if (isset($_POST['submit'])) {

  if (!empty($_FILES['img_produit']['name']) && !empty($_FILES['img_produit2']['name']) && !empty($_FILES['img_produit3']['name'])) {

    $img_produit = $_FILES['img_produit']['name'];
    $img_produit2 = $_FILES['img_produit2']['name'];
    $img_produit3 = $_FILES['img_produit3']['name'];
    $target_dir = $_SERVER['DOCUMENT_ROOT'] . '/Projet-Back/asset/upload/';
    $target_file = $target_dir . basename($_FILES["img_produit"]["name"]);
    $target_file2 = $target_dir . basename($_FILES["img_produit2"]["name"]);
    $target_file3 = $target_dir . basename($_FILES["img_produit3"]["name"]);
    // Select file type
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $imageFileType2 = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));
    $imageFileType3 = strtolower(pathinfo($target_file3, PATHINFO_EXTENSION));
    // Valid file extensions
    $extensions_arr = array("jpg", "jpeg", "png", "gif");

    if (isset($_POST['titre_produit']) && $_POST['titre_produit'] !== '') {
      $titre_produit = htmlspecialchars($_POST['titre_produit']);
      if (isset($_POST['desc_produit']) && $_POST['desc_produit'] !== '') {
        $desc_produit = htmlspecialchars($_POST['desc_produit']);
        if (isset($_POST['prix_produit']) && $_POST['prix_produit'] !== '') {
          $prix_produit = htmlspecialchars($_POST['prix_produit']);
          if (in_array($imageFileType, $extensions_arr) && in_array($imageFileType2, $extensions_arr) && in_array($imageFileType3, $extensions_arr)) {
            if (move_uploaded_file($_FILES['img_produit']['tmp_name'], $target_file) && move_uploaded_file($_FILES['img_produit2']['tmp_name'], $target_file2) && move_uploaded_file($_FILES['img_produit3']['tmp_name'], $target_file3)) {
              $uniq_file_name = str_replace(' ', '_', uniqid() . '_' . basename($_FILES["img_produit"]["name"]));
              $uniq_file_name2 = str_replace(' ', '_', uniqid() . '_' . basename($_FILES["img_produit2"]["name"]));
              $uniq_file_name3 = str_replace(' ', '_', uniqid() . '_' . basename($_FILES["img_produit3"]["name"]));
                if (rename($target_dir . basename($_FILES["img_produit"]["name"]), $target_dir . $uniq_file_name))
                  if (rename($target_dir . basename($_FILES["img_produit2"]["name"]), $target_dir . $uniq_file_name2)) 
                    if (rename($target_dir . basename($_FILES["img_produit3"]["name"]), $target_dir . $uniq_file_name3))

              try {

                //On insère les données reçues
                $sth = $pdo->prepare("
                        INSERT INTO produits(img_produit, img_produit2, img_produit3, titre_produit, desc_produit, prix_produit)
                        VALUES(:img_produit, :img_produit2, :img_produit3, :titre_produit, :desc_produit, :prix_produit)");
                $sth->bindParam(':img_produit', $uniq_file_name);
                $sth->bindParam(':img_produit2', $uniq_file_name2);
                $sth->bindParam(':img_produit3', $uniq_file_name3);
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
              $err_prt = '<div class="err-prdt">Erreur de traitement du fichier image</div>';
            }
          } else {
            $err_prt = '<div class="err-prdt">Vous devez avoir un fichier de type jpg jpeg png ou gif</div>';
          }
        } else {
          $err_prt = '<div class="err-prdt">Veuillez rentrez le prix de votre produit</div>';
        }
      } else {
        $err_prt = '<div class="err-prdt">Veuillez rentrer la description de votre produit</div>';
      }
    } else {
      $err_prt = '<div class="err-prdt">Veuillez rentrer le nom de votre produit</div>';
    }
  } else {
    $err_prt = '<div class="err-prdt">Veuillez insérer votre image</div>';
  }
}
