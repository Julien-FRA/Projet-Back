<?php include 'config/template/head.php'; ?>
<header>
    <?php include 'config/template/nav.php'; ?>
    <?php include 'config/admin_check.php'; ?>
</header>
<main>
<section class="dashboard">

  <div class="left-dashboard">
    <ul class="vetical-ul">
        <li class="vertical-li"><a href="#home">Produits</a></li>
        <li class="vertical-li"><a href="#news">Clients</a></li>
        <li class="vertical-li"><a href="#contact">Commentaires</a></li>
    </ul>
  </div>

<div class="produit-dashboard">

<article class="form-produit">
  <h2 class="add-produit">Ajoutez un produit</h2>
  <form method="post">
    <div class="form-img-produit">
      <label for="">Image du produit :</label>
      <input type="file" class="input-file" id="" name="" value="">
    </div>
    <label for="">Titre du produit :</label>
    <input class="input-titre" type="text" id="" name="" value="">
    <label for="">Description du produit :</label>
    <input class="input-desc" type="text" id="" name="" value="">
    <div class="form-prix-produit">
      <label for="">Prix du produit :</label>
      <input class="input-prix" type="number" id="" name="" min="0" max="1000" value="">
    </div>
    <button class="submit-produit" type="submit" name="submit">Ajouter le produit</button>
  </form>
</article>

<article class="tableau-produit">
  <h2 class="add-produit">Voici un tableau de récap des produits</h2>
  <table>

    <thead>
      <tr>
        <th>Id</th>
        <th>Image</th>
        <th>Description</th>
        <th>Prix</th>
        <th>Action</th>
      </tr>
    </thead>
  
   <tbody>
       <tr>
           <td>1</td>
           <td>Ceci est une description longue.Ceci est une description longue.Ceci est une description longue</td>
           <td>Hack</td>
           <td>Hack</td>
            <td>
              <a href="" class="btn-edit">Editer</a>
              <a href="" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')" class="btn-delete">Delete</a>
            </td>
       </tr>
   </tbody>

</table>
</article>
</div>
</section>
</main>

<?php include 'config/template/footer.php'; ?>