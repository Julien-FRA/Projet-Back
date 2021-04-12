<?php

//On test si la session n'est pas active

if ($_SESSION['loggedin'] == false) {

  header("Location:login.php");
} else {

  //Si oui on prépare les différentes requêtes pour la bdd

  $panier = $pdo->prepare('SELECT * FROM panier WHERE id_client =?');
  $panier->bindParam(1, $_SESSION['id'], PDO::PARAM_INT);
  $panier->execute();

  $sommes = $pdo->prepare('SELECT SUM(prix_produit) FROM panier WHERE id_client =?');
  $sommes->bindParam(1, $_SESSION['id'], PDO::PARAM_INT);
  $sommes->execute();

  $somm = $sommes->fetch();
  $somm = $somm[0];
  $somm = $somm + 5;

  //On test si l'utilisateur  est connecté et si l'ID est présente dans l'url

  if (isset($_GET['id']) && ($_SESSION['loggedin'] == true)) {

    $test = $_SESSION['id'];
    $idprod = $_GET['id'];

    $dun = selectProduit(intval($idprod), $pdo);
    if (count($dun) > 0) {

      $titre = $dun['titre_produit'];
      $prix = $dun['prix_produit'];
      $img = $dun['img_produit'];


      addPanier($pdo, $test, $idprod, $prix, $img, $titre);
    } else {
    }
  }
}

//Si le panier est validé est applique la fonction addComand et on redirige vers le panier

if (isset($_POST['envoyer']) && $_POST['envoyer'] == 'Paiement') {
  $test = $_SESSION['id'];
  addCommand($pdo, $test, $somm);
  header("Refresh: 1;URL=recap_panier.php");
}
