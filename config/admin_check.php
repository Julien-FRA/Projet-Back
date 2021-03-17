<?php

if (isset($_SESSION['loggedin']) && ($_SESSION['loggedin'] == true) && ($_SESSION['role'] == 1)) {
  
} else {
  header("location: login.php");
  $_SESSION['flash_message'] = '<div class="erreur">Vous n\'avez pas les droits !</div>';
}