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
                <img src="asset/upload/<?= $donnees['img_produit2']; ?>" alt="photo article virus" class="" />
                <img src="asset/upload/<?= $donnees['img_produit3']; ?>" alt="photo article virus" class="" />
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
        <p class="tittle">Virus informatique</p>
        <p class="text">Un virus informatique est un automate logiciel autoréplicatif. Certains sont inoffensifs, d'autres contiennent du code malveillant (ce qui entraine le classement du logiciel comme logiciel malveillant). Dans tous les cas, un virus informatique est conçu pour se propager sur d'autres ordinateurs en s'insérant dans des logiciels légitimes, appelés « hôtes » à la manière d'un virus biologique.</p>
        <p class="text"> Il peut perturber plus ou moins gravement le fonctionnement de l'ordinateur infecté. Un virus se répand par tout moyen d'échange de données numériques, comme les réseaux informatiques ou les périphériques de stockage externes (clés USB, disques durs, etc.). </p>
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
        <p class="tittle commentaires">Les commentaires :</p>
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