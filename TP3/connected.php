<?php
session_start(); 

$users = array('marouane' => '1234', 'yoda' => 'maitrejedi');

if(isset($_POST['login']) && isset($_POST['password'])) {
  if(array_key_exists($_POST['login'], $users) && $users[$_POST['login']] == $_POST['password']) {
    $_SESSION['login'] = $_POST['login']; 
    echo "Bienvenue, " . $_SESSION['login'] . "!";
    echo '<br><a href="logout.php">Se déconnecter</a>';
  } else {
    echo "Identifiants incorrects.";
  }
} else {
    echo "Veuillez remplir le formulaire de connexion.";
}
?>
