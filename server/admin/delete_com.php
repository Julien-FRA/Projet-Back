<?php

include_once('../../server/config/bdd.php');

if(isset($_GET['id'])) {
    $stmc = $pdo->prepare('SELECT * FROM commentaires');
    $stmc->bindParam(1, $_GET['id'], PDO::PARAM_INT);
    $stmc->execute();
    $rows = $stmc->fetch(PDO::FETCH_ASSOC);
    if($rows)
{
    $stmc = $pdo->prepare('DELETE FROM commentaires WHERE id_commentaire=?');
    $stmc->bindParam(1, $_GET['id'], PDO::PARAM_INT);
    $stmc->execute();
    echo 'Le commentaire à été supprimé';
    header( "refresh:3;url=../../admin.php");
}  
} else {
    http_response_code(404);
}

?>