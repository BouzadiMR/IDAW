<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connected</title>
</head>
<body>
    <?php
        if(isset($_GET['login']) && isset($_GET['password'])) {
            $login = htmlspecialchars($_GET['login']);
            $password = htmlspecialchars($_GET['password']);

            echo "<h1>Informations reçues</h1>";
            echo "<p>Login: ".$login."</p>";
            echo "<p>Mot de passe: ".$password."</p>";
        } else {
            echo "<p>Erreur: Aucune donnée reçue!</p>";
        }
    ?>
</body>
</html>
