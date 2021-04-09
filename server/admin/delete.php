<?php

include_once('../../server/config/bdd.php');

if(isset($_GET['id'])) {
    $stmt = $pdo->prepare('SELECT * FROM produits WHERE id_produit=?');
    $stmt->bindParam(1, $_GET['id'], PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if($row)
{
    $stmt = $pdo->prepare('DELETE FROM produits WHERE id_produit=?');
    $stmt->bindParam(1, $_GET['id'], PDO::PARAM_INT);
    $stmt->execute();
    echo 'Votre produit à été supprimé';
    header( "refresh:1;url=../../admin.php");
}  
} else {
    http_response_code(404);
}

?>