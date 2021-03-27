<?php

include_once('../server/config/bdd.php');

if (isset($_POST['submit-comm'])) {
    if (isset($_POST['nom_client']) && $_POST['nom_client'] !== '') {
        $nom_client = $_POST['nom_client'];
        if (isset($_POST['text_commentaire']) && $_POST['text_commentaire'] !== '') {
            $text_commentaire = $_POST['text_commentaire'];

            try {

                //On insère les données reçues
                $sth = $pdo->prepare("
                        INSERT INTO commentaires(nom_client, text_commentaire)
                        VALUES(:nom_client, :text_commentaire)");
                $sth->bindParam(':nom_client', $nom_client);
                $sth->bindParam(':text_commentaire', $text_commentaire);
                $sth->execute();

                //On renvoie l'utilisateur vers la page liste
                header("Location:fiche_produit.php");
            } catch (PDOException $e) {
                echo 'Impossible de traiter les données. Erreur : ' . $e->getMessage();
            }
        } else {
            echo 'Veuillez rentrer votre commentaire';
        }
    } else {
        echo 'Veuillez rentrer votre pseudo';
    }
}
