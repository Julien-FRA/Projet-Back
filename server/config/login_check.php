<?php

if (isset($_SESSION['loggedin']) && ($_SESSION['loggedin'] == true) && ($_SESSION['role'] == 0)) {
} else {
  header("location: login.php");
  $_SESSION['flash_message'] = '<div class="erreur">Veuillez vous connecter !</div>';
}
