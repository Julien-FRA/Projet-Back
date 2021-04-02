<?php

include_once('../server/config/init.php');


if(isset($_GET['id']) && !empty($_GET['id'])) {

    $getid = htmlspecialchars($_GET['id']);
    $article = $pdo->prepare('SELECT * FROM produits WHERE id_produit = ?');
    $article->execute(array($getid));
    $article = $article->fetch();

    if(isset($_POST['submit-comm'])) {
        if (isset($_POST['text_commentaire']) && $_POST['text_commentaire'] !== '') {
            $text_commentaire = htmlspecialchars($_POST['text_commentaire']);

            if (isset($_SESSION['loggedin']) && ($_SESSION['loggedin'] == true)) {
                $id_client = $_SESSION['id'];

            try {

                //On insère les données reçues
                $ins = $pdo->prepare("
                        INSERT INTO commentaires(id_produit, text_commentaire, id_client)
                        VALUES(:id_produit, :text_commentaire, :id_client)");
                $ins->bindParam(':id_produit', $getid);
                $ins->bindParam(':text_commentaire', $text_commentaire);
                $ins->bindParam(':id_client', $id_client);
                $ins->execute();

                //On renvoie l'utilisateur vers la page liste
                header("Location:http://localhost/Projet-Back/fiche_produit.php?id=$getid");
              } catch (PDOException $e) {
                echo 'Impossible de traiter les données. Erreur : ' . $e->getMessage();
              }
            } else {
                echo 'Veuillez vous connecter';
            }  
        } else {
            echo 'Veuillez rentrer votre commentaire';
        }
    }
}
