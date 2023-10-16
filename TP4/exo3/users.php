<?php
require_once('config.php');

$connectionString = "mysql:host=" . _MYSQL_HOST;

if (defined('_MYSQL_PORT')) {
    $connectionString .= ";port=" . _MYSQL_PORT;
}

$connectionString .= ";dbname=" . _MYSQL_DBNAME;
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

$pdo = NULL;
try {
    $pdo = new PDO($connectionString, _MYSQL_USER, _MYSQL_PASSWORD, $options);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $erreur) {
    echo 'Erreur : ' . $erreur->getMessage();
    exit;
}

$request = $pdo->prepare("select * from users");
$request->execute();

$users = $request->fetchAll(PDO::FETCH_OBJ);

echo '<table border="1">';
echo '<thead>';
echo '<tr>';
echo '<th>Id</th>';
echo '<th>Nom</th>';
echo '<th>Email</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

foreach ($users as $user) {
    echo '<tr>';
    echo '<td>' . htmlspecialchars($user->id, ENT_QUOTES, 'UTF-8') . '</td>';
    echo '<td>' . htmlspecialchars($user->name, ENT_QUOTES, 'UTF-8') . '</td>';
    echo '<td>' . htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8') . '</td>';
    echo '</tr>';
}

echo '</tbody>';
echo '</table>';

$pdo = null;
?>
