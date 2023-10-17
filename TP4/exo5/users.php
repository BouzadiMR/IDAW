<?php
require_once('config.php');

header('Content-Type: application/json'); 
$connectionString = "mysql:host=" . _MYSQL_HOST;
if(defined('_MYSQL_PORT')) {
    $connectionString .= ";port=" . _MYSQL_PORT;
}
$connectionString .= ";dbname=" . _MYSQL_DBNAME;
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

try {
    $pdo = new PDO($connectionString, _MYSQL_USER, _MYSQL_PASSWORD, $options);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $erreur) {
    echo json_encode(['error' => 'Erreur de connexion à la base de données']);
    exit;
}

$method = $_SERVER['REQUEST_METHOD'];

switch($method) {
    case 'GET': 
        $request = $pdo->prepare("SELECT * from users");
        $request->execute();
        $users = $request->fetchAll(PDO::FETCH_OBJ);
        echo json_encode($users);
        break;

    case 'POST': 
        $input = json_decode(file_get_contents('php://input'), true); 

        if (isset($input['action']) && $input['action'] == 'add') {
            $name = $input['name'];
            $email = $input['email'];
            $stmt = $pdo->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
            $stmt->execute([$name, $email]);
            echo json_encode(['status' => 'User added successfully', 'id' => $pdo->lastInsertId()]);

        } elseif (isset($input['action']) && $input['action'] == 'update') {
            $id = $input['id'];
            $name = $input['name'];
            $email = $input['email'];
            $stmt = $pdo->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
            $stmt->execute([$name, $email, $id]);
            echo json_encode(['status' => 'User updated successfully']);

        } elseif (isset($input['action']) && $input['action'] == 'delete') {
            $id = $input['id'];
            $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
            $stmt->execute([$id]);
            echo json_encode(['status' => 'User deleted successfully']);
        } else {
            echo json_encode(['error' => 'Invalid action']);
        }
        break;

    default:
        echo json_encode(['error' => 'Unsupported request method']);
        break;
}

$pdo = NULL;
?>
