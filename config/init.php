<?php
session_start();

require 'function.php';

require 'config.php';

$dsn = 'mysql:host=' . HOSTNAME . ';dbname=' . DATABASE;

try { // on essai ce code
    $pdo = new PDO($dsn,USERNAME,PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) { // en cas d'erreur on la capture
    die('<ul><li>Erreur sur le fichier : '. $e->getFile() . '</li><li>Erreur à la ligne ' . $e->getLine() . '</li><li>Message derreur : ' . $e->getMessage() . '</li></ul>');
}

$content = "";

// Page inscription

if(isset($_POST['envoyer']) && $_POST['envoyer'] == 'Envoyer') {

    $erreur = false;

    if (isset($_POST['name']) && ($_POST['name'] !==''))  {
        $name = htmlspecialchars($_POST['name']);
      } else {
        $content .= '<div>Le nom doit être remplit ! </div>';
        $erreur = true;
      }

    if (isset($_POST['email']) && ($_POST['email'] !==''))  {
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

          $email = htmlspecialchars($_POST['email']);

          $emails = explode("@", $email);

          $banned_domaine = [
            "yopmail.com",
            "yopmail.fr"
          ];

          if(!in_array($emails[1], $banned_domaine)) {
            $email = htmlspecialchars($_POST['email']);
          } else {
            $content .= '<div>Votre adress email est une adresse poubelle</div>';
            $erreur = true;
          } 
        } else {
          $content .= '<div>Votre adress email est invalide</div>';
          $erreur = true;
        }   
      } else {
        $content .= '<div>Le mail doit être remplit ! </div>';
        $erreur = true;
      }

    if(checkEmail($email, $pdo)) {
        $content .= '<div>Votre email est déja enregistré</div>';
        $erreur = true;
      }
      
    if (isset($_POST['cd']) && ($_POST['cd'] !==''))  {
        if((iconv_strlen($_POST['cd']) == 5)) {
            $cd = htmlspecialchars($_POST['cd']);
        } else {
            $content .= '<div>Le code postal doit être de 5 chiffres ! </div>';
        }
      } else {
        $content .= '<div>Le code postal doit être remplit ! </div>';
        $erreur = true;
      } 

    if (isset($_POST['tel']) && ($_POST['tel'] !==''))  {
        if((iconv_strlen($_POST['tel']) == 10)) {
            $tel = htmlspecialchars($_POST['tel']);
        } else {
            $content .= '<div>Le numéro de téléphone doit être de 10 chiffres ! </div>';
        }
      } else {
        $content .= '<div>Le numéro de téléphone doit être remplit ! </div>';
        $erreur = true;
      }

    if (isset($_POST['password']) && ($_POST['password'] !=='') && ($_POST['password']) === ($_POST['verifypassword'])) {
        if(preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[%!?*]).{10,20}$/', $_POST['password'])) {
            $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
        } else {
            $content .= '<div>Le mot de passe est invalide, il doit contenir 1 lettre minuscule, 1 lettre majuscule, 1 chiffre, 1 caractère spécial(%!?*)</div>';
            $erreur = true;
        }
      } else {
        $content .= '<div>Le mot de passe doit être remplit et doit être le même que le mot de passe vérifié! </div>';
        $erreur = true;
      }

    if (isset($_POST['genre']) && ($_POST['genre'] !==''))  {
        $genre = htmlspecialchars($_POST['genre']);
      } else {
        $content .= '<div>Le numéro de téléphone doit être remplit ! </div>';
        $erreur = true;
      }

    if (empty($content) && $erreur == false) {

        addClient($pdo, $name, $email, $cd, $tel, $password, $genre);

        $content = '<div class="succes">Bravo giga bg, tu es inscris</div>';

        header("Refresh: 3;URL=login.php");
    }
}


//Page login

if(isset($_POST['formconnexion']) && $_POST['formconnexion'] == 'Se connecter') {

  $mailconnect = htmlspecialchars($_POST['mailconnect']);
  $mdpconnect = htmlspecialchars($_POST['mdpconnect']);

  if(!empty($mailconnect) && !empty($mdpconnect)){

    $requser = $pdo->prepare("SELECT * FROM clients WHERE email_client = ?");
    $requser->execute(array($mailconnect));
    if($requser->rowCount() == 1)
    {
      $userinfo = $requser->fetch();
      if(password_verify($mdpconnect, $userinfo['password_client'])){
      $_SESSION['id'] = $userinfo['id_client'];
      $_SESSION['pseudo'] = $userinfo['nom_client'];
      $_SESSION['mail'] = $userinfo['email_client'];
      $_SESSION['genre'] = $userinfo['genre_client'];
      $_SESSION['cp'] = $userinfo['postal_code'];
      $_SESSION['phone'] = $userinfo['phone_number'];
      $_SESSION['loggedin'] = true;
      $_SESSION['role'] = $userinfo['role_client'];
      redirectRole();
      }else{
        $content = '<div class="erreur">Mauvais mot de passe ou mail !</div>';
      }
    }else{
      $content = '<div class="erreur">Cette utilisateur n\'existe pas !</div>';
    }
  }else {
    $content = '<div class="erreur">Tous les champs doivent être complétés !</div>';
  }
}

 

