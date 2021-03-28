<?php include 'server/config/template/head.php'; ?>
<?php include 'server/config/template/nav.php'; ?>
<?php include 'validation_panier.php'; ?>

<?php
$cmd = $pdo->query('SELECT * FROM commandes WHERE id_client = '.$_SESSION['id'].'');
?>

<article class="tableau-produit" id="divProds">
        <h2 class="add-produit">Mes commandes</h2>
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


 <?php include 'server/config/template/footer.php'; ?> 