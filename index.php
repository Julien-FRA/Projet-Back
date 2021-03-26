<?php include 'server/config/template/head.php'; ?>

<?php include 'server/config/template/nav.php'; ?>

<?php
    $prd = $pdo->query('SELECT titre_produit, prix_produit, img_produit, id_produit FROM produits');
?>

<main>
  <!-- <h2 class="">Page Accueil</h2> -->

  <section class="section_hero">
    <div class="hero-inner">
      <h1>Locky</h1>
      <p>Les virus les plus performants</p>
      <a href="#" class="btn-hero">Voir plus...</a>
    </div>
  </section>

  <section class="section_article">

  <?php while ($donn = $prd->fetch()){
   ?>
   <figure>
    <figcaption>
      <h3><?php echo $donn['titre_produit'];?></h3>
    </figcaption>
    <div class="product">
    <img src="asset/upload/<?= $donn['img_produit']; ?>" alt="photo article virus" class="article-pictures" />
      <img src="asset/img/star.png" alt="notation produit" />
      <p class="price">$<?php echo $donn['prix_produit'];?></p>
      <a href="fiche_produit.php?id=<?php echo $donn['id_produit'];?>" class="discover-button button-fx">DECOUVRIR</a>
    </div>
  </figure>

<?php
  }
?>

  </section>
  <section class="section_hero">
    <div class="hero-inner">
      <h1>A propos de nous</h1>
      <p>Nous sommes une entreprise à la pointe de la technologie</p>
      <a href="#" class="btn-hero">Voir plus...</a>
    </div>
  </section>

</main>
<hr>
<?php include 'server/config/template/footer.php'; ?>