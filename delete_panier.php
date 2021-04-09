<?php

include_once('server/config/bdd.php');

//Si un ID est présent dans l'url on lance la requete bdd et on supprime le produit correspondant

if(isset($_GET['id'])) {
    $stmu = $pdo->prepare('SELECT * FROM panier WHERE id_produit=?');
    $stmu->bindParam(1, $_GET['id'], PDO::PARAM_INT);
    $stmu->execute();
    $row = $stmu->fetch(PDO::FETCH_ASSOC);
    if($row)
{
    $stmu = $pdo->prepare('DELETE FROM panier WHERE id_produit=? LIMIT 1');
    $stmu->bindParam(1, $_GET['id'], PDO::PARAM_INT);
    $stmu->execute();
    echo 'Votre produit à été supprimé';
    header( "refresh:1;url=addpanier.php");
}  
} else {
    http_response_code(404);
}

?>
