<?php include 'config/template/head.php'; ?>
<header>
    <?php include 'config/template/nav.php'; ?>
</header>
<main>
<section class="profil_section">
<article_one class="profil_nav">
<figure class="user_figure">
            <img
              src="asset/img/avatar.svg"
              alt="photo de profil de l'utilisateur"
              class="user_pictures"
            />
            <figcaption class="user_name">Bonjour, Julien</figcaption>
          </figure>
          <input type="button" value="Apercu du compte" class="btn_profil">
          <input type="button" value="Mes commandes" class="btn_profil">
          <input type="button" value="Modifier la photo" class="btn_profil">
          <input type="button" value="Modifier le mot de passe" class="btn_profil">
</article_one>
<article_two class="profil_information">
    <h2 class="profil_title">Mes informations</h2>

    <div class="information_container">
    <form action="" method="get" class="form_information">
  <div class="form_contain">
    <label for="name">PRENOM: </label>
    <input type="text" name="firstname" id="firstname">
  </div>
  <div class="form_contain">
    <label for="name">NOM: </label>
    <input type="text" name="name" id="name">
  </div>
  <div class="form_contain">
    <label for="email">ADRESSE E-MAIL: </label>
    <input type="email" name="email" id="email">
  </div>
</form>
</div>
</article_two>
</section>
</main>
<hr>
<?php include 'config/template/footer.php'; ?>