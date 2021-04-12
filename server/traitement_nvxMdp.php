<?php

include_once('config/init.php');

$changMdp ='';

//Si le client à validé le bouton on prepare la requete bdd

if (isset($_POST['submit-newMdp']) && $_POST['submit-newMdp'] == 'Envoyer') {

    $cmdp = $pdo->prepare('SELECT password_client FROM clients WHERE id_client = '.$_SESSION['id'].'');
    $cmdp->execute();
    $oldcmdp = $cmdp->fetch();

    //Si le client à bien saisis le bon ancien mot de passe coresspondant et que le nouveau respecte bien les différents caractères,
    //on lance la requete pour modifier la table clients

    if (isset($_POST['oldMdp']) && ($_POST['oldMdp'] !== '') && password_verify($_POST['oldMdp'], $oldcmdp['0'])) {
        $oldMdp = password_hash(htmlspecialchars($_POST['oldMdp']), PASSWORD_DEFAULT);
        if(isset($_POST['newMdp']) && ($_POST['newMdp']) !== '') {
            if (preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[%!?*]).{10,20}$/', $_POST['newMdp'])) {
                $newMdp = password_hash(htmlspecialchars($_POST['newMdp']), PASSWORD_DEFAULT);
                
                try {

                    //On insère les données reçues
                    $sth = $pdo->prepare("
          UPDATE clients SET password_client=:password_client WHERE id_client =:id");
                    $sth->bindParam(':password_client', $newMdp);
                    $sth->bindParam(':id', $_SESSION['id']);
                    $sth->execute();

                    //On renvoie l'utilisateur vers la page profil
                    $changMdp =  '<div class="validate">Votre mot de passe à été mis à jour</div>';
                    // header( "refresh:1;url=../profil.php");
                } catch (PDOException $e) {
                    echo 'Impossible de traiter les données. Erreur : ' . $e->getMessage();
                }                   
            } else {
                $changMdp = '<div class="err-prdt">Le mot de passe est invalide</div>';                
            }
        } else {
            $changMdp = '<div class="err-prdt">Veuillez rentrer votre nouveau mot de passe</div>';           
        }
    } else {
        $changMdp = '<div class="err-prdt">Veuillez rentrer votre ancien mot de passe</div>'; 
    }
}