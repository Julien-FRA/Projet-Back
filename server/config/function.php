<?php

function addClient($pdo, $name, $email, $cd, $tel, $password, $genre)
{

    $queryInsert = "INSERT INTO clients(nom_client, email_client, postal_code, phone_number, password_client, genre_client, role_client) VALUES (:nom_client,:email_client,:postal_code,:phone_number,:password_client,:genre_client,:role_client)";

    $reqPrep = $pdo->prepare($queryInsert);
    $reqPrep->execute(
        [
            'nom_client' => $name,
            'email_client' => $email,
            'postal_code' => $cd,
            'phone_number' => $tel,
            'password_client' => $password,
            'genre_client' => $genre,
            'role_client' => 0
        ]
    );
};

function checkFlashMessage()
{

    if (isset($_SESSION['flash_message']) && !empty($_SESSION['flash_message'])) {
        echo $_SESSION['flash_message'];
        $_SESSION['flash_message'] = "";
    }
};

function checkEmail($email, $pdo): bool
{

    $result = $pdo->prepare("SELECT * FROM clients WHERE email_client = ?");

    $result->execute([$email]);

    $user = $result->fetch();

    if ($user) {
        return true;
    }
    return false;
};

function redirectRole()
{

    if ($_SESSION['role'] == 1) {
        header("location: admin.php");
    } else {
        header("location: profil.php");
    }
};

function selectProduit($id_produit, $pdo): array
{
    if (!is_int($id_produit)) {
        return [];
    }

    $result = $pdo->prepare('SELECT * FROM produits WHERE id_produit = ?');

    $result->execute([$id_produit]);

    $produit = $result->fetch();
    return $produit;
};

function selectCommentaireClients($id_produit, $pdo): array
{
    if (!is_int($id_produit)) {
        return [];
    }

    $clt = $pdo->prepare('SELECT * FROM commentaires INNER JOIN clients ON commentaires.id_client = clients.id_client WHERE id_produit = ? ORDER BY date_commentaire ASC');

    $clt->execute([$id_produit]);

    $client = $clt->fetchAll();
    return $client;
};

function addPanier($pdo, $test, $idprod, $prix, $img, $titre)
{

    $queryInsert = "INSERT INTO panier(id_client, id_produit, prix_produit, img_produit, titre_produit) VALUES (:id_client,:id_produit,:prix_produit,:img_produit,:titre_produit)";

    $glo = $pdo->prepare($queryInsert);
    $glo->execute(
        [
            'id_client' => $test,
            'id_produit' => $idprod,
            'prix_produit' => $prix,
            'img_produit' => $img,
            'titre_produit' => $titre,
        ]
    );
    header("location: addpanier.php");
};

function addCommand($pdo, $test, $somm)
{

    $queryInsert = "INSERT INTO commandes(id_client, paie_type, prix_commande) VALUES (:id_client,:paie_type,:prix_commande)";

    $reqCom = $pdo->prepare($queryInsert);
    $reqCom->execute(
        [
            'id_client' => $test,
            'paie_type' => 'paypal',
            'prix_commande' => $somm,
        ]
    );
};
