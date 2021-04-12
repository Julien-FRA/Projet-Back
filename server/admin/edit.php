<?php

include_once('../../server/config/bdd.php');

$err_prt = '';

if (isset($_GET['id'])) {
    $stmt = $pdo->prepare('SELECT * FROM produits WHERE id_produit=?');
    $stmt->bindParam(1, $_GET['id'], PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$row) {
        echo 'Votre produit n\'existe pas';
        header("refresh:1;url=../../admin.php");
    }
} else {
    http_response_code(404);
}
if (isset($_POST['submit'])) {

    if (!empty($_FILES['img_produit']['name'])) {


        $img_produit = $_FILES['img_produit']['name'];
        $img_produit2 = $_FILES['img_produit2']['name'];
        $img_produit3 = $_FILES['img_produit3']['name'];
        $target_dir = $_SERVER['DOCUMENT_ROOT'] . '/asset/upload/';
        $target_file = $target_dir . basename($_FILES["img_produit"]["name"]);
        $target_file2 = $target_dir . basename($_FILES["img_produit2"]["name"]);
        $target_file3 = $target_dir . basename($_FILES["img_produit3"]["name"]);
        // Select file type
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $imageFileType2 = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));
        $imageFileType3 = strtolower(pathinfo($target_file3, PATHINFO_EXTENSION));
        // Valid file extensions
        $extensions_arr = array("jpg", "jpeg", "png", "gif");

        if (isset($_POST['titre_produit']) && $_POST['titre_produit'] !== '') {
            $titre_produit = htmlspecialchars($_POST['titre_produit']);
            if (isset($_POST['desc_produit']) && $_POST['desc_produit'] !== '') {
                $desc_produit = htmlspecialchars($_POST['desc_produit']);
                if (isset($_POST['prix_produit']) && $_POST['prix_produit'] !== '') {
                    $prix_produit = htmlspecialchars($_POST['prix_produit']);
                    if (in_array($imageFileType, $extensions_arr) && in_array($imageFileType2, $extensions_arr) && in_array($imageFileType3, $extensions_arr)) {
                        if (move_uploaded_file($_FILES['img_produit']['tmp_name'], $target_file) && move_uploaded_file($_FILES['img_produit2']['tmp_name'], $target_file2) && move_uploaded_file($_FILES['img_produit3']['tmp_name'], $target_file3)) {
                            $uniq_file_name = str_replace(' ', '_', uniqid() . '_' . basename($_FILES["img_produit"]["name"]));
                            $uniq_file_name2 = str_replace(' ', '_', uniqid() . '_' . basename($_FILES["img_produit2"]["name"]));
                            $uniq_file_name3 = str_replace(' ', '_', uniqid() . '_' . basename($_FILES["img_produit3"]["name"]));
                            if (rename($target_dir . basename($_FILES["img_produit"]["name"]), $target_dir . $uniq_file_name))
                                if (rename($target_dir . basename($_FILES["img_produit2"]["name"]), $target_dir . $uniq_file_name2))
                                    if (rename($target_dir . basename($_FILES["img_produit3"]["name"]), $target_dir . $uniq_file_name3))

                                        try {

                                            //On insère les données reçues
                                            $sth = $pdo->prepare("
                          UPDATE produits SET img_produit=:img_produit, img_produit2=:img_produit2, img_produit3=:img_produit3,titre_produit=:titre_produit, desc_produit=:desc_produit, prix_produit=:prix_produit WHERE id_produit=:id;");
                                            $sth->bindParam(':img_produit', $uniq_file_name);
                                            $sth->bindParam(':img_produit2', $uniq_file_name2);
                                            $sth->bindParam(':img_produit3', $uniq_file_name3);
                                            $sth->bindParam(':titre_produit', $titre_produit);
                                            $sth->bindParam(':desc_produit', $desc_produit);
                                            $sth->bindParam(':prix_produit', $prix_produit);
                                            $sth->bindParam(':id', $_GET['id']);
                                            $sth->execute();

                                            //On renvoie l'utilisateur vers la page liste
                                            header("Location:../../admin.php");
                                        } catch (PDOException $e) {
                                            echo 'Impossible de traiter les données. Erreur : ' . $e->getMessage();
                                        }
                        } else {
                            $err_prt = '<div class="err-prdt">Erreur de traitement du fichier image</div>';
                        }
                    } else {
                        $err_prt = '<div class="err-prdt">Vous devez avoir un fichier de type jpg jpeg png ou gif</div>';
                    }
                } else {
                    $err_prt = '<div class="err-prdt">Veuillez rentrez le prix de votre produit</div>';
                }
            } else {
                $err_prt = '<div class="err-prdt">Veuillez rentrer la description de votre produit</div>';
            }
        } else {
            $err_prt = '<div class="err-prdt">Veuillez rentrer le nom de votre produit</div>';
        }
    } else {
        $err_prt = '<div class="err-prdt">Veuillez insérer votre image</div>';
    }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locky</title>
    <link rel="icon" type="image/jpg" href="../../asset/img/hacker.jpg" />
    <link rel="stylesheet" href="../../asset/style/style.css">
</head>

<body>

    <?php include '../config/template/nav.php'; ?>

    <main id="admin">

        <section class="dashboard">

            <h1>Dashboard administrateur</h1>

            <div class="produit-dashboard">

                <article class="form-produit">
                    <h2 class="add-produit">Editer un produit</h2>
                    <form method="post" enctype='multipart/form-data'>
                        <div class="form-img-produit">
                            <label>Nouvelle image du produit</label>
                            <input type="file" class="input-file" name="img_produit" value="<?= $row['img_produit'] ?>">
                        </div>
                        <div class="form-img-produit">
                            <label>Nouvelle image du produit2</label>
                            <input type="file" class="input-file" name="img_produit2" value="<?= $row['img_produit2'] ?>">
                        </div>
                        <div class="form-img-produit">
                            <label>Nouvelle image du produit3</label>
                            <input type="file" class="input-file" name="img_produit3" value="<?= $row['img_produit3'] ?>">
                        </div>
                        <label>Nouveau titre du produit</label>
                        <input class="input-titre" type="text" name="titre_produit" value="<?= $row['titre_produit'] ?>">
                        <label>Nouvelle description du produit</label>
                        <input class="input-desc" type="text" name="desc_produit" value="<?= $row['desc_produit'] ?>">
                        <div class="form-prix-produit">
                            <label>Nouveau prix du produit</label>
                            <input class="input-prix" type="number" min="0" max="1000" value="<?= $row['prix_produit'] ?>" name="prix_produit">
                        </div>
                        <button class="submit-produit" type="submit" name="submit">Ajouter le produit</button>
                        <?= $err_prt; ?>
                    </form>
                </article>
            </div>
        </section>

    </main>

    <footer>
        <nav class="footer-nav">
            <div class="footer-card">
                <h4>Paiement sécurisé</h4>
                <p>Vos achats peuvent être éffectué en toute sécurité</p>
                <img src="../../asset/img_footer/security.svg" alt="paiement sécurisé">
            </div>
            <div class="footer-card">
                <h4>Livraison sécurisé</h4>
                <p>Vos commandes vous sont livrés en toute sécurité</p>
                <img src="../../asset/img_footer/truck.svg" alt="paiement sécurisé">
            </div>
            <div class="footer-card">
                <h4>Site certifié</h4>
                <p>Nos produits sont certifiés par des professionnels</p>
                <img src="../../asset/img_footer/medal.svg" alt="paiement sécurisé">
            </div>
            <div class="footer-card">
                <h4>Nous contacter</h4>
                <p>Contacter nos experts afin d'avoir plus d'informations</p>
                <img src="../../asset/img_footer/chat.svg" alt="paiement sécurisé">
            </div>
        </nav>
    </footer>

    <script src="asset/script/script.js"></script>

</body>

</html>