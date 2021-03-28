<?php include 'server/config/template/head.php'; ?>
<?php include 'server/config/template/nav.php'; ?>
<?php include 'validation_panier.php'; ?>


<section class="page-panier">
        <h2>Mon Panier </h2>
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
                        <td class="td-info">$<?=($somm);?></td>
                        <form class="validation" method="post">
                        <td class="td-prdt retirer td-info"><input type="submit" value="Paiement" name="envoyer" class="validation"></td>
                        </form>
                    </tr>
                </tbody>
            </table>
        </div>

        
    </section>


 <?php include 'server/config/template/footer.php'; ?> 