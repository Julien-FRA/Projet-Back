<?php include 'server/config/template/head.php'; ?>
<?php include 'server/config/template/nav.php'; ?>

<?php  

if($_SESSION['loggedin'] == false){
 
  header("Location:login.php");

}else{


$panier = $pdo->query('SELECT * FROM panier WHERE id_client = '.$_SESSION['id'].'');
$sommes=$pdo->query('SELECT SUM(prix_produit) FROM panier WHERE id_client = '.$_SESSION['id'].'');
$somm = $sommes->fetch();

if(isset($_GET['id']) && ($_SESSION['loggedin'] == true)){
  
  $test = $_SESSION['id'];
  $idprod = $_GET['id'];

  $dun = selectProduit(intval($idprod), $pdo);
  if(count($dun)>0){

  $titre= $dun['titre_produit'];
  $prix= $dun['prix_produit'];
  $img= $dun['img_produit'];
  

     // On insère les données reçues
      $glo = $pdo->prepare("
      INSERT INTO panier (id_client, id_produit, prix_produit, img_produit, titre_produit)
      VALUES(:id_client, :id_produit, :prix_produit, :img_produit, :titre_produit)");
$glo->bindParam(':id_client', $test);
$glo->bindParam(':id_produit', $idprod);
$glo->bindParam(':prix_produit', $prix);
$glo->bindParam(':img_produit', $img);
$glo->bindParam(':titre_produit', $titre);
$glo->execute();

// var_dump($sommes);
  }else{
    
  }
}
}



?>



<section class="page-panier">
        <h2>Mon Panier</h2>
        <table class="table-prdt">
            <thead class="thead-prdt">
                <tr class="tr-prdt">
                    <th class="th-prdt"></th>
              <th>Titre</th>
              <th>Prix</th>
              <th>Action</th>
            </tr>
          </thead>
<?php 
            while (false !== ($all = $panier->fetch(PDO::FETCH_ASSOC))) {
            ?>
<tbody class="tbody-prdt">
                <tr class="tr-info-prdt">
                <td class="td-prdt img"><img src="asset/upload/<?= $all['img_produit']; ?>" alt=""></td>
                <td class="td-prdt desc"><?= $all['titre_produit']; ?></td>
                <td class="td-prdt prix">$<?= $all['prix_produit']; ?></td>
                <td class="td-prdt retirer">
                <div class="btn-table">
                  <a href="delete_panier.php?id=<?= $all['id_produit']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')" class="btn-delete" >Delete</a>
                </div>
              </td>
            </tr>
            <?php
            }
            ?>
             </tbody>

</table>
<div class="position-table">
            <table class="table-info">
                <thead class="thead-info">
                    <tr class="tr-info">
                        <th class="th-info">Prix livraison</th>
                        <th class="th-info">Prix total</th>
                        <th class="th-info">Commander</th>
                    </tr>
                </thead>
                <tbody class="tbody-info">
                    <tr class="tr-info-desc">
                        <td class="td-info">$5</td>
                        <td class="td-info">$<?php echo($somm[0]);?></td>
                        <td class="td-prdt retirer td-info"><button>Paiement</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>


 <?php include 'server/config/template/footer.php'; ?> 