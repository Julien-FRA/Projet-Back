<?php

if($_SESSION['loggedin'] == false){
 
  header("Location:login.php");

}else{


$panier = $pdo->query('SELECT * FROM panier WHERE id_client = '.$_SESSION['id'].'');

$sommes=$pdo->query('SELECT SUM(prix_produit) FROM panier WHERE id_client = '.$_SESSION['id'].'');
$somm = $sommes->fetch();
$somm =$somm[0];
if(isset($_GET['id']) && ($_SESSION['loggedin'] == true)){
  
  $test = $_SESSION['id'];
  $idprod = $_GET['id'];

  $dun = selectProduit(intval($idprod), $pdo);
  if(count($dun)>0){

  $titre= $dun['titre_produit'];
  $prix= $dun['prix_produit'];
  $img= $dun['img_produit'];
  

addPanier($pdo, $test, $idprod, $prix, $img, $titre);


  }else{
    
  }
}
}

  if (isset($_POST['envoyer']) && $_POST['envoyer'] == 'Paiement') {
    $test = $_SESSION['id'];
    addCommand($pdo, $test, $somm);
  header("Refresh: 1;URL=recap_panier.php");
  }