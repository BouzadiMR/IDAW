<?php
$users = array(
    'Marouane' => 'Bouzadi',
    'yoda' => 'maitrejedi'
); 

$login = "anonymous"; 
$errorText = ""; // Retirez la barre oblique qui était ici.
$successfullyLogged = false; 

if (isset($_POST['login']) && isset($_POST['password'])) {
    $tryLogin = $_POST['login'];
    $tryPwd = $_POST['password'];
    if (array_key_exists($tryLogin, $users) && $users[$tryLogin] == $tryPwd) {
        $successfullyLogged = true;
        $login = $tryLogin;
    } else {
        $errorText = "Erreur de login/password";
    }
} else {
    $errorText = "Merci d'utiliser le formulaire de login";
}

if (!$successfullyLogged) {
    echo $errorText;
} else {
    echo "<h1>Bienvenu " . $login . "</h1>";
}
?>
