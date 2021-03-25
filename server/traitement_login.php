<?php

//Page login

if (isset($_POST['formconnexion']) && $_POST['formconnexion'] == 'Se connecter') {

  $mailconnect = htmlspecialchars($_POST['mailconnect']);
  $mdpconnect = htmlspecialchars($_POST['mdpconnect']);

  if (!empty($mailconnect) && !empty($mdpconnect)) {

    $requser = $pdo->prepare("SELECT * FROM clients WHERE email_client = ?");
    $requser->execute(array($mailconnect));
    if ($requser->rowCount() == 1) {
      $userinfo = $requser->fetch();
      if (password_verify($mdpconnect, $userinfo['password_client'])) {
        $_SESSION['id'] = $userinfo['id_client'];
        $_SESSION['pseudo'] = $userinfo['nom_client'];
        $_SESSION['mail'] = $userinfo['email_client'];
        $_SESSION['genre'] = $userinfo['genre_client'];
        $_SESSION['cp'] = $userinfo['postal_code'];
        $_SESSION['phone'] = $userinfo['phone_number'];
        $_SESSION['loggedin'] = true;
        $_SESSION['role'] = $userinfo['role_client'];
        redirectRole();
      } else {
        $content = '<div class="erreur">Mauvais mot de passe ou mail !</div>';
      }
    } else {
      $content = '<div class="erreur">Cette utilisateur n\'existe pas !</div>';
    }
  } else {
    $content = '<div class="erreur">Tous les champs doivent être complétés !</div>';
  }
}
