<?php include 'server/config/template/head.php'; ?>
<?php include 'server/config/template/nav.php'; ?>

<main>
    <section class="info_produit">
        <div class="photo_produit">
            <img src="asset/img/virus.png" alt="photo article virus" class="" />
            <div class="small_photo_produit">
                <img src="asset/img/virus.png" alt="photo article virus" class="" />
                <img src="asset/img/virus.png" alt="photo article virus" class="" />
            </div>
        </div>
        <article class="desc_produit">
            <h4>Gameover Zeus</h4>
            <p class="price">$499</p>
            <p class="desc_text">Ce terme générique désigne la capacité d’un programme
                informatique à infecter plusieurs fichiers sur un ordinateur.
                À la manière d’une maladie virale, ils se propagent sur
                le web et d’une machine à une autre par le biais d’une
                d’une intervention humaine. Que ce soit par e-mail,
                par téléchargement de fichier ou via des supports physiques
                (clés USB, CD…).</p>
            <input type="button" value="Achetez" class="btn_achat">
        </article>
    </section>
    <section class="more_info">
        <p class="tittle">Gameover Zeus</p>
        <p class="text">Gameover Zeus appartient à la famille de programmes malveillants et de virus « Zeus ». Ce programme malveillant est un cheval de Troie, un programme malveillant qui se fait passer pour un programme authentique, qui accède à vos données bancaires sensibles et vous dérobe vos fonds.</p>
        <p class="text">Le pire avec ce représentant de la famille de programmes malveillants « Zeus », c’est qu’il n’a pas besoin d’un serveur centralisé de « commandement et de contrôle » pour effectuer des opérations bancaires, une faiblesse de nombreuses autres cyberattaques que les autorités peuvent cibler. Gameover Zeus peut contourner les serveurs centralisés et créer des serveurs indépendants pour transmettre des informations sensibles. En substance, vous ne pouvez pas suivre vos données volées.</p>
    </section>
    <section class="ad_comments">
        <p class="tittle">Espace commentaire :</p>
        <form action="" class="form">
            <label for="" class="info_comments">Auteur :</label>
            <input type="text" name="" id="" class="author" placeholder="Votre pseudo">
            <label for="" class="info_comments">Commentaire :</label>
            <input type="text" name="" id="" class="comments" placeholder="Votre commentaire">
            <button type="submit" class="btn_achat send">Envoyer</button>
        </form>
    </section>
</main>

<?php include 'server/config/template/footer.php'; ?>