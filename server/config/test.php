<?php
session_start();

require 'function.php';

// Connexion à la bdd
define('HOSTNAME', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DATABASE', 'locky');

$dsn = 'mysql:host=' . HOSTNAME . ';dbname=' . DATABASE;

try { // on essai ce code
  $pdo = new PDO($dsn, USERNAME, PASSWORD);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) { // en cas d'erreur on la capture
  die('<ul><li>Erreur sur le fichier : ' . $e->getFile() . '</li><li>Erreur à la ligne ' . $e->getLine() . '</li><li>Message derreur : ' . $e->getMessage() . '</li></ul>');
}

$content = "";

if (isset($_POST['submit'])) {

  if (!empty($_FILES["img_produit"]["name"])) {

    $img_produit = $_FILES['img_produit']['name'];
    $target_dir = "../../asset/upload/"; //C:\wamp64\www\Projet-Back\asset\upload\\
    $target_file = $target_dir . basename($_FILES["img_produit"]["name"]);
    // Select file type
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Valid file extensions
    $extensions_arr = array("jpg", "jpeg", "png", "gif");

    if (in_array($imageFileType, $extensions_arr)) {
      if (move_uploaded_file($_FILES['img_produit']['tmp_name'], $target_file)) {
        $uniq_file_name = str_replace(' ', '_', uniqid() . '_' . basename($_FILES["img_produit"]["name"]));
        if (rename($target_dir . basename($_FILES["img_produit"]["name"]), $target_dir . $uniq_file_name))
          echo basename($_FILES["img_produit"]["name"]);
      } else {
        echo 'Erreur de traitement du fichier image';
      }
    } else {
      echo 'Vous devez avoir un fichier de type jpg jpeg png ou gif';
    }
  } else {
    echo 'Veuillez insérer votre image';
  }
}


?>


<form method="post" action="" enctype='multipart/form-data'>
  <input type='file' name='img_produit' />
  <input type='submit' value='Save name' name='submit'>
</form>