<?php include 'server/config/template/head.php'; ?>
<?php include 'server/config/template/nav.php'; ?>

<!-- requete sql du produit correspondant -->

<?php
if (!isset($_GET['id'])) header("Location:index.php");
    $donnees = selectProduit(intval($_GET['id']), $pdo);
    $cli_comm = selectCommentaireClients(intval($_GET['id']), $pdo);
if (count($donnees) <= 0) header("Location:index.php");
?>

<main>
    <section class="info_produit">
        <div class="photo_produit">
            <img src="asset/upload/<?= $donnees['img_produit']; ?>" alt="photo article virus" class="" />
            <div class="small_photo_produit">
                <img src="asset/upload/<?= $donnees['img_produit']; ?>" alt="photo article virus" class="" />
                <img src="asset/upload/<?= $donnees['img_produit']; ?>" alt="photo article virus" class="" />
            </div>
        </div>
        <article class="desc_produit">
            <h4><?= $donnees['titre_produit'];?></h4>
            <p class="price">$<?= $donnees['prix_produit'];?></p>
            <p class="desc_text"><?= $donnees['desc_produit'];?></p>
            <a href="addpanier.php?id=<?= $donnees['id_produit'];?>" class="btn_achat">Achetez</a>
        </article>
    </section>
    <section class="more_info">
        <p class="tittle">Gameover Zeus</p>
        <p class="text">Gameover Zeus appartient à la famille de programmes malveillants et de virus « Zeus ». Ce programme malveillant est un cheval de Troie, un programme malveillant qui se fait passer pour un programme authentique, qui accède à vos données bancaires sensibles et vous dérobe vos fonds.</p>
        <p class="text">Le pire avec ce représentant de la famille de programmes malveillants « Zeus », c’est qu’il n’a pas besoin d’un serveur centralisé de « commandement et de contrôle » pour effectuer des opérations bancaires, une faiblesse de nombreuses autres cyberattaques que les autorités peuvent cibler. Gameover Zeus peut contourner les serveurs centralisés et créer des serveurs indépendants pour transmettre des informations sensibles. En substance, vous ne pouvez pas suivre vos données volées.</p>
    </section>
    <section class="ad_comments">
        <p class="tittle">Espace commentaire :</p>
        <form action="server/add_comments.php?id=<?= $donnees['id_produit'];?>" class="form" method="post">
            <input type="hidden" value="<?= $donnees['id_produit']; ?>">
            <label for="" class="info_comments">Commentaire :</label>
            <input type="text" name="text_commentaire" id="" class="comments" placeholder="Votre commentaire">
            <button type="submit" class="btn_achat send" name="submit-comm">Envoyer</button>
        </form>
    </section>
    <section class="section-commentaire">
        <p class="tittle commentaires">Les commentaire :</p>
        <?php 
        foreach($cli_comm as $commentaire) {
        ?>
        <div class="div-commentaire">
            <p class="nom-commentaire"><?= $commentaire['nom_client']; ?></p>
            <p class="date-commentaire"><?= $commentaire['date_commentaire']; ?></p>
            <p class="text-commentaire"><?= $commentaire['text_commentaire']; ?></p>
        </div>
        <?php
        }
        ?>
    </section>
</main>

<?php include 'server/config/template/footer.php'; ?>