<?php include 'server/config/template/head.php'; ?>
<?php include 'server/config/template/nav.php'; ?>
<?php include 'server/config/login_check.php'; ?>
<?php include 'server/traitement_nvxMdp.php'; ?>

<?php
$cmd = $pdo->query('SELECT * FROM commandes WHERE id_client = '.$_SESSION['id'].'');

?>

<main id="profil">
  <section class="profil-section">
    <h2 class="section-title">Page du profil</h2>
    <article class="profil-nav">
      <h3>Navigation</h3>
      <figure class="user-figure">
        <img src="asset/img/avatar.svg" alt="photo de profil de l'utilisateur" class="user-pictures" />
        <figcaption class="user-name">Bonjour, <?= $_SESSION['pseudo'] ?></figcaption>
      </figure>
      <input type="button" value="Apercu du compte" class="btn-profil" id="infos">
      <input type="button" value="Mes commandes" class="btn-profil" id="cmd">
      <input type="button" value="Modifier le mot de passe" class="btn-profil" id="mdp">
      <?= $changMdp; ?>
    </article>
    <article class="profil-information" id="divinfo">
      <h2 class="profil-title">Mes informations</h2>

      <div class="information-container">
        <form method="get" class="form-information">
          <div class="form-contain">
            <label>STATUT: </label>
            <input type="text" name="firstname" value="<?= $statut ?>" disabled>
          </div>
          <div class="form-contain">
            <label>PSEUDO: </label>
            <input type="text" name="firstname" value="<?= $_SESSION['pseudo'] ?>" disabled>
          </div>
          <div class="form-contain">
            <label>TELEPHONE: </label>
            <input type="number" name="name" value="<?= $_SESSION['phone'] ?>" disabled>
          </div>
          <div class="form-contain">
            <label>ADRESSE E-MAIL: </label>
            <input type="email" name="email" value="<?= $_SESSION['mail'] ?>" disabled>
          </div>
          <div class="form-contain">
            <label for="genre">GENRE: </label>
            <input type="text" name="genre" id="genre" value="<?= $_SESSION['genre'] ?>" disabled>
          </div>
          <div class="form-contain">
            <label for="cp">CODE POSTAL: </label>
            <input type="number" name="cp" id="cp" value="<?= $_SESSION['cp'] ?>" disabled>
          </div>
        </form>
      </div>
    </article>

    <article class="my-mdp" id="divmdp">
      <h2 class="profil-title">Changer de mot de passe</h2>
      <form class="form-contain" method="post">
        <label for="oldMdp">Ancien mot de passe: </label>
        <input type="text" name="oldMdp" id="oldMdp">
        <label for="newMdp">Nouveau mot de passe: </label>
        <input type="text" name="newMdp" id="newMdp">
      <div class="submit-wrap">
        <input type="submit" value="Envoyer" class="submit" name="submit-newMdp">
      </div>
      </form>
    </article>

    <article class="my-order tableau-produit" id="divcmd">
      <h2 class="profil-title">Mes Commandes</h2>
      <table>

          <thead>
            <tr>
              <th>Id client</th>
              <th>Date</th>
              <th>Type</th>
              <th>Prix</th>
            </tr>
          </thead>

          <tbody>
            <?php 
            while (false !== ($al = $cmd->fetch(PDO::FETCH_ASSOC))) {
            ?>
            <tr>
              <td><?= $al['id_client']; ?></td>
              <td><?= $al['date_commande']; ?></td>
              <td><?= $al['paie_type']; ?></td>
              <td><?= $al['prix_commande']; ?></td>
            </tr>
            <?php
            }
            ?>
          </tbody>

        </table>
    </article>

  </section>
</main>

<?php include 'server/config/template/footer.php'; ?>


