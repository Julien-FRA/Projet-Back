<?php include 'server/config/template/head.php'; ?>

<?php include 'server/config/template/nav.php'; ?>
<?php include 'server/config/admin_check.php'; ?>
<?php include 'server/admin/add_product.php'; ?>
<?php include 'server/add_comments.php'; ?>

<?php

$req = $pdo->prepare('SELECT * FROM produits');
$req->execute();

$client = $pdo->prepare('SELECT * FROM clients');
$client->execute();

$comm = $pdo->prepare('SELECT * FROM commentaires');
$comm->execute();

$commande = $pdo->prepare('SELECT * FROM commandes');
$commande->execute();

?>

<main id="admin">
  <section class="dashboard">
    <h1>Dashboard administrateur</h1>
    <div class="left-dashboard">
      <ul class="vetical-ul">
        <li class="vertical-li"><input type="button" value="Produits" id="produits" class="admin-input"></li>
        <li class="vertical-li"><input type="button" value="Clients" id="clients" class="admin-input"></li>
        <li class="vertical-li"><input type="button" value="Commentaires" id="com" class="admin-input"></li>
        <li class="vertical-li"><input type="button" value="Commandes" id="commande" class="admin-input"></li>
      </ul>
    </div>

    <div class="produit-dashboard">

      <article class="form-produit">
        <h2 class="add-produit">Ajoutez un produit</h2>
        <form method="post" enctype='multipart/form-data'>
          <div class="form-img-produit">
            <label>Image du produit</label>
            <input type="file" class="input-file" name="img_produit">
          </div>
          <div class="form-img-produit">
            <label>Image du produit 2</label>
            <input type="file" class="input-file" name="img_produit2">
          </div>
          <div class="form-img-produit">
            <label>Image du produit 3</label>
            <input type="file" class="input-file" name="img_produit3">
          </div>
          <label>Titre du produit</label>
          <input class="input-titre" type="text" name="titre_produit">
          <label>Description du produit</label>
          <input class="input-desc" type="text" name="desc_produit">
          <div class="form-prix-produit">
            <label>Prix du produit</label>
            <input class="input-prix" type="number" min="0" max="1000" value="" name="prix_produit">
          </div>
          <button class="submit-produit" type="submit" name="submit">Ajouter le produit</button>
          <?= $err_prt; ?>
        </form>
      </article>

      <article class="recap-site">
        <h2 class="add-produit">Activité</h2>

        <?php
        $nb_prod = $pdo->prepare('SELECT COUNT(*) FROM produits');
        $nb_prod->execute();
        $nb_prods = $nb_prod->fetch();

        $nb_client = $pdo->prepare('SELECT COUNT(*) FROM clients');
        $nb_client->execute();
        $nb_clients = $nb_client->fetch();

        $nb_comd = $pdo->prepare('SELECT COUNT(*) FROM commandes');
        $nb_comd->execute();
        $nb_comds = $nb_comd->fetch();

        $prix_comd = $pdo->prepare('SELECT SUM(prix_commande) FROM commandes');
        $prix_comd->execute();
        $prix_comds = $prix_comd->fetch();


        echo '<p>Nombre de produits : <strong>' . $nb_prods[0] . '</strong></p>';
        echo '<p>Nombre de clients : <strong>' . $nb_clients[0] . '</strong></p>';
        echo '<p>Nombre de commandes : <strong>' . $nb_comds[0] . '</strong></p>';
        echo '<p>Revenu des commandes : <strong>$' . $prix_comds[0] . '</strong></p>';
        ?>

      </article>

      <article class="tableau-produit" id="divProds">
        <h2 class="add-produit">Voici un tableau de récap des produits</h2>
        <table>

          <thead>
            <tr>
              <th>Id</th>
              <th class="table-img">Image</th>
              <th>Titre</th>
              <th>Prix</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            <?php
            while (false !== ($all = $req->fetch(PDO::FETCH_ASSOC))) {
            ?>
              <tr>
                <td><?= $all['id_produit']; ?></td>
                <td class="table-img"><img src="asset/upload/<?= $all['img_produit']; ?>" alt=""></td>
                <td><?= $all['titre_produit']; ?></td>
                <td><?= $all['prix_produit']; ?></td>
                <td>
                  <div class="btn-table">
                    <a href="server/admin/edit.php?id=<?= $all['id_produit']; ?>" class="btn-edit">Editer</a>
                    <a href="server/admin/delete.php?id=<?= $all['id_produit']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')" class="btn-delete">Delete</a>
                  </div>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>

        </table>

      </article>

      <article class="client-dashboard" id="divClients">
        <h2 class="add-client">Voici un tableau de récap des clients</h2>
        <table>

          <thead>
            <tr>
              <th>Id</th>
              <th>Nom</th>
              <th>Role</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            <?php
            while (false !== ($inf = $client->fetch(PDO::FETCH_ASSOC))) {
            ?>
              <tr>
                <td><?= $inf['id_client']; ?></td>
                <td><?= $inf['nom_client']; ?></td>
                <td><?= $inf['role_client']; ?></td>
                <td>
                  <div class="btn-table">
                    <a href="server/admin/edit_client.php?id=<?= $inf['id_client']; ?>" class="btn-edit">Editer</a>
                    <a href="server/admin/delete_client.php?id=<?= $inf['id_client']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')" class="btn-delete">Delete</a>
                  </div>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>

        </table>

      </article>

      <article class="commentaire-dashboard" id="divCom">
        <h2 class="add-commentaire">Voici un tableau de récap des commentaires</h2>
        <table>

          <thead>
            <tr>
              <th>Id clients</th>
              <th>Id produit</th>
              <th>Commentaire</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            <?php
            while (false !== ($com = $comm->fetch(PDO::FETCH_ASSOC))) {
            ?>
              <tr>
                <td><?= $com['id_client']; ?></td>
                <td><?= $com['id_produit']; ?></td>
                <td><?= $com['text_commentaire']; ?></td>
                <td>
                  <div class="btn-table">
                    <a href="server/admin/delete_com.php?id=<?= $com['id_commentaire']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?')" class="btn-delete">Delete</a>
                  </div>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>

        </table>

      </article>

      <article class="commande-dashboard" id="divCommande">
        <h2 class="add-commande">Voici un tableau de récap des commandes</h2>
        <table>

          <thead>
            <tr>
              <th>Id commande</th>
              <th>Id client</th>
              <th>Date</th>
              <th>Prix</th>
            </tr>
          </thead>

          <tbody>
            <?php
            while (false !== ($cmd = $commande->fetch(PDO::FETCH_ASSOC))) {
            ?>
              <tr>
                <td><?= $cmd['id_commande']; ?></td>
                <td><?= $cmd['id_client']; ?></td>
                <td><?= $cmd['date_commande']; ?></td>
                <td><?= $cmd['prix_commande']; ?></td>
              </tr>
            <?php
            }
            ?>
          </tbody>

        </table>

      </article>

    </div>
  </section>

</main>

<?php include 'server/config/template/footer.php'; ?>