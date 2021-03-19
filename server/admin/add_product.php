<?php

// Admin, ajout des produits

if(isset($_POST['submit'])) {

  if (isset($_POST['img_produit']) && $_POST['img_produit'] !== '') {
      $img_produit = $_POST['img_produit'];
      if(isset($_POST['titre_produit']) && $_POST['titre_produit'] !== '') {
              $titre_produit = $_POST['titre_produit'];
            if(isset($_POST['desc_produit']) && $_POST['desc_produit'] !== '') {
               $desc_produit = $_POST['desc_produit'];
                if(isset($_POST['prix_produit']) && $_POST['prix_produit'] !== '') {
                  $prix_produit = $_POST['prix_produit'];
                try{
              
                  //On insère les données reçues
                  $sth = $pdo->prepare("
                      INSERT INTO produits(img_produit, titre_produit, desc_produit, prix_produit)
                      VALUES(:img_produit, :titre_produit, :desc_produit, :prix_produit)");
                  $sth->bindParam(':img_produit',$img_produit);
                  $sth->bindParam(':titre_produit',$titre_produit);
                  $sth->bindParam(':desc_produit',$desc_produit);
                  $sth->bindParam(':prix_produit',$prix_produit);
                  $sth->execute();
                  
                  //On renvoie l'utilisateur vers la page liste
                  header("Location:admin.php");
              }
              catch(PDOException $e){
                  echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
              }
            } else {
              echo 'Veuillez rentrer le prix du produit';
            }
          } 
      } else {
          echo 'Le nom de votre produit est trop long';
      }
    } else {
        echo 'Veuillez rentrer le nom du produit';
    }
  }