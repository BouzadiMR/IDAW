<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<body>
  <form action="connected.php" method="POST">
    <label for="login">Login :</label>
    <input type="text" name="login" required><br>

    <label for="password">Mot de passe :</label>
    <input type="password" name="password" required><br>

    <input type="submit" value="Se connecter">
  </form>
</body>
</html>