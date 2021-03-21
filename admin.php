<?php include 'server/config/template/head.php'; ?>

<?php include 'server/config/template/nav.php'; ?>
<?php include 'server/config/admin_check.php'; ?>
<?php include 'server/admin/add_product.php'; ?>


<main id="admin">
<section class="dashboard">
<h1>Dashboard administrateur</h1>
  <div class="left-dashboard">
    <ul class="vetical-ul">
    
        <li class="vertical-li" ><input type="button" value="Produits" id="produits" class="admin-input"></li>
        <li class="vertical-li" ><input type="button" value="Clients" id="clients" class="admin-input"></li>
        <li class="vertical-li" ><input type="button" value="Commentaires" id="com" class="admin-input"></li>
    </ul>
  </div>

<div class="produit-dashboard">

<article class="form-produit">
  <h2 class="add-produit">Ajoutez un produit</h2>
  <form method="post" enctype='multipart/form-data'>
    <div class="form-img-produit">
      <label >Image du produit</label>
      <input type="file" class="input-file" name="img_produit">
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
  </form>
</article>

<article class="nb-vues">
<h2 class="add-produit">Activité</h2>

<?php
$nb_visites = file_get_contents('data/pagesvues.txt');
$nb_visites++;
file_put_contents('data/pagesvues.txt', $nb_visites);
echo 'Nombre de pages vues : <strong>' . $nb_visites . '</strong><br/>';

$f_records = fopen('data/records.txt', 'r+'); 
$dernierRecord = fgets($f_records); 
$dernierRecord = explode(' ', $dernierRecord); 
echo 'Record du nombre de pages vues : <strong>'; 

if ($nb_visites > $dernierRecord[0]) 
{
	rewind($f_records); 
	$ligne = $nb_visites . ' ' . date('d/m/Y'); 
	fwrite($f_records, $ligne); 
	echo $nb_visites . '</strong> établi le <strong>' . date('d/m/Y');
} else { 
	echo $dernierRecord[0] . '</strong> établi le <strong>' . $dernierRecord[1];
}

echo '</strong><br/>'; 
fclose($f_records); 
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
    <tr>
        <td>1</td>
        <td>Julien</td>
        <td>Admin</td>
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

<article class="commentaire-dashboard" id="divCom">
  <h2 class="add-commentaire">Voici un tableau de récap des commentaires</h2>
  <table>

  <thead>
    <tr>
      <th>Id</th>
      <th>Autheur</th>
      <th>Commentaire</th>
      <th>Action</th>
    </tr>
  </thead>

  <tbody>
    <tr>
        <td>1</td>
        <td>Julien</td>
        <td class="td-commentaire">Voici un exemple de commentaire Voici un exemple de commentaire Voici un exemple de commentaire Voici un exemple de commentaire Voici un exemple de commentaire Voici un exemple de commentaire Voici un exemple de commentaire Voici un exemple de commentaire</td>
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

<?php include 'server/config/template/footer.php'; ?>