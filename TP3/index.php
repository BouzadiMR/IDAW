<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Changer de Style</title>

    <?php
        $selected_style = "style1";

        if (isset($_GET['css'])) {
            $selected_style = htmlspecialchars($_GET['css']); 
            setcookie("selected_style", $selected_style, time() + (86400 * 30), "/");
        } elseif (isset($_COOKIE['selected_style'])) {
            $selected_style = htmlspecialchars($_COOKIE['selected_style']);
        }

        echo "<link rel='stylesheet' type='text/css' href='{$selected_style}.css'>";
    ?>
</head>
<body>
    <form id="style_form" action="index.php" method="GET">
        <select name="css">
            <option value="style1" <?php if ($selected_style == "style1") echo "selected"; ?>>style1</option>
            <option value="style2" <?php if ($selected_style == "style2") echo "selected"; ?>>style2</option>
        </select>
        <input type="submit" value="Appliquer">
    </form>
    
    <h1>Bienvenue sur Notre Site!</h1>
    <p>Choisissez un style et observez le changement!</p>
</body>
</html>
