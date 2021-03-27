<?php

include_once('../../server/config/bdd.php');

if (isset($_GET['id'])) {
    $stmt = $pdo->prepare('SELECT * FROM clients WHERE id_client=?');
    $stmt->bindParam(1, $_GET['id'], PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$row) {
        echo 'Votre client n\'existe pas';
        header("refresh:3;url=../../admin.php");
    }
} else {
    http_response_code(404);
}
if (isset($_POST['send'])) {
    if (isset($_POST['nom_client']) && $_POST['nom_client'] !== '') {
        $nom_client = $_POST['nom_client'];
        if(isset($_POST['role_client']) && $_POST['role_client'] !== '') {
            $role_client = $_POST['role_client'];
            $role_client = intval($role_client);

            try {

                //On insère les données reçues
                $sth = $pdo->prepare("
      UPDATE clients SET nom_client=:nom_client, role_client=:role_client WHERE id_client=:id;");
                $sth->bindParam(':nom_client', $nom_client);
                $sth->bindParam(':role_client', $role_client);
                $sth->bindParam(':id', $_GET['id']);
                $sth->execute();

                //On renvoie l'utilisateur vers la page liste
                header("Location:../../admin.php");
            } 
            catch (PDOException $e) {
                echo 'Impossible de traiter les données. Erreur : ' . $e->getMessage();
            }
        } else {
            echo 'Veuillez rentrer le role de votre client';
        }
    } else {
        echo 'Veuillez rentrer le nom de votre client';
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
                <h2 class="add-produit">Editer un client</h2>
                <form method="post" enctype='multipart/form-data'>
                    <label>Nouveau nom du client</label>
                    <input class="input-titre" type="text" name="nom_client" value="<?= $row['nom_client'] ?>">
                    <div class="form-prix-produit">
                        <label>Nouveau role du client</label>
                        <select name="role_client">
                            <option value="0" name="role_client">Membre</option>
                            <option value="1" name="role_client">Admin</option>
                        </select>
                    </div>
                    <button class="submit-produit" type="submit" name="send">Enregistrer</button>
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