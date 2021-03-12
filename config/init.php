<?php

require 'function.php';

// Connexion à la bdd
define('HOSTNAME', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DATABASE', 'locky');

$dsn = 'mysql:host=' . HOSTNAME . ';dbname=' . DATABASE;

try { // on essai ce code
    $pdo = new PDO($dsn,USERNAME,PASSWORD);
} catch(PDOException $e) { // en cas d'erreur on la capture
    die('<ul><li>Erreur sur le fichier : '. $e->getFile() . '</li><li>Erreur à la ligne ' . $e->getLine() . '</li><li>Message derreur : ' . $e->getMessage() . '</li></ul>');
}

$content = "";

echo '<pre>';
print_r($_POST);
echo '</pre>';

if(isset($_POST['envoyer']) && $_POST['envoyer'] == 'Envoyer') {

    $erreur = false;

    if (isset($_POST['name']) && ($_POST['name'] !==''))  {
        $name = htmlspecialchars($_POST['name']);
      } else {
        $content .= '<div>Le nom doit être remplit ! </div>';
        $erreur = true;
      }

    if (isset($_POST['email']) && ($_POST['email'] !==''))  {
        $email = htmlspecialchars($_POST['email']);
      } else {
        $content .= '<div>Le mail doit être remplit ! </div>';
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

    if (isset($_POST['password']) && ($_POST['password'] !=='')) {
        if(preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[%!?*]).{10,20}$/', $_POST['password'])) {
            $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
        } else {
            $content .= '<div>Le mot de passe est invalide, il doit contenir 1 lettre minuscule, 1 lettre majuscule, 1 chiffre, 1 caractère spécial(%!?*)</div>';
            $erreur = true;
        }
      } else {
        $content .= '<div>Le mot de passe doit être remplit ! </div>';
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
//variable d'affichage etc. 

//constantes système 

