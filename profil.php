<?php include 'config/template/head.php'; ?>
<header>
    <?php include 'config/template/nav.php'; ?>
    <?php include 'config/login_check.php'; ?>
</header>
<main>
<section class="profil_section">
<article class="profil_nav">
<figure class="user_figure">
            <img
              src="asset/img/avatar.svg"
              alt="photo de profil de l'utilisateur"
              class="user_pictures"
            />
            <figcaption class="user_name">Bonjour, <?= $_SESSION['pseudo'] ?></figcaption>
          </figure>
          <input type="button" value="Apercu du compte" class="btn_profil" id="infos">
          <input type="button" value="Mes commandes" class="btn_profil" id="cmd">
          <input type="button" value="Modifier la photo" class="btn_profil" id="photos">
          <input type="button" value="Modifier le mot de passe" class="btn_profil" id="mdp">
</article>
<article class="profil_information" id="divinfo">
    <h2 class="profil_title">Mes informations</h2>

    <div class="information_container">
    <form action="" method="get" class="form_information">
  <div class="form_contain">
    <label for="name">PSEUDO: </label>
    <input type="text" name="firstname" id="firstname" value="<?= $_SESSION['pseudo'] ?>" disabled>
  </div>
  <div class="form_contain">
    <label for="name">TELEPHONE: </label>
    <input type="number" name="name" id="name" value="<?= $_SESSION['phone'] ?>" disabled>
  </div>
  <div class="form_contain">
    <label for="email">ADRESSE E-MAIL: </label>
    <input type="email" name="email" id="email" value="<?= $_SESSION['mail'] ?>" disabled>
  </div>
  <div class="form_contain">
    <label for="genre">GENRE: </label>
    <input type="text" name="genre" id="genre" value="<?= $_SESSION['genre'] ?>" disabled>
  </div>
  <div class="form_contain">
    <label for="cp">CODE POSTAL: </label>
    <input type="number" name="cp" id="cp" value="<?= $_SESSION['cp'] ?>" disabled>
  </div>
</form>
</div>
</article>

<article class="my_mdp" id=divmdp>
<h2 class="profil_title">Changer de mot de passe</h2>
  <div class="form_contain">
    <label for="name">Ancien mot de passe: </label>
    <input type="text" name="firstname" id="firstname">
  </div>
  <div class="form_contain">
    <label for="name">Nouveau mot de passe: </label>
    <input type="text" name="name" id="name">
  </div>
  <div class="submit-wrap">
    <input type="submit" value="Envoyer" class="submit">
  </div>
</article>

<article class="my_pictures" id=divphotos>
<h2 class="profil_title">Changer de photo</h2>
</article>

<article class="my_order" id=divcmd>
<h2 class="profil_title">Mes Commandes</h2>
</article>

</section>
</main>
<hr>
<?php include 'config/template/footer.php'; ?>