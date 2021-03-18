<?php include 'config/template/head.php'; ?>

<?php include 'config/template/nav.php'; ?>
<?php include 'config/admin_check.php'; ?>

<main>
<section class="dashboard">
<h1>Dashboard administrateur</h1>
  <div class="left-dashboard">
    <ul class="vetical-ul">
        <li class="vertical-li"><a href="#home">Produits</a></li>
        <li class="vertical-li"><a href="#news">Clients</a></li>
        <li class="vertical-li"><a href="#contact">Commentaires</a></li>
    </ul>
  </div>

<div class="produit-dashboard">

<article class="form-produit">
  <h2 class="add-produit">Ajoutez un produit :</h2>
  <form method="post">
    <div class="form-img-produit">
      <label >Image du produit :</label>
      <input type="file" class="input-file">
    </div>
    <label>Titre du produit :</label>
    <input class="input-titre" type="text">
    <label>Description du produit :</label>
    <input class="input-desc" type="text">
    <div class="form-prix-produit">
      <label>Prix du produit :</label>
      <input class="input-prix" type="number" min="0" max="1000" value="">
    </div>
    <button class="submit-produit" type="submit" name="submit">Ajouter le produit</button>
  </form>
</article>

<article class="tableau-produit">
  <h2 class="add-produit">Voici un tableau de récap des produits :</h2>
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
       <tr>
           <td>1</td>
           <td class="table-img"><img src="asset/img/ransomware.png" alt=""></td>
           <td>Hack</td>
           <td>Hack</td>
            <td>
              <div class="btn-table">
                <a href="" class="btn-see">Voir</a>
                <a href="" class="btn-edit">Editer</a>
                <a href="" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')" class="btn-delete">Delete</a>
              </div>
            </td>
       </tr>
   </tbody>

</table>
</article>
</div>
</section>
</main>

<?php include 'config/template/footer.php'; ?>