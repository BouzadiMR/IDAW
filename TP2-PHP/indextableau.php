<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP & MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    
    <body>
        <h1>Tableau des noms</h1>
        <?php
            $prenoms = ['Marouane', 'Pierre', 'Amandine', 'Florian'];
            
            
            $taille = count($prenoms);
            
            
            for($i = 0; $i < $taille; $i++){
                echo $prenoms[$i]. ', ';
            }
            
            echo '<br><br>';
            
            
            for($i = 0; $i < $taille; $i++){
                $p .= $prenoms[$i]. ', ';
            }
            echo $p;
        ?>
        <p>IMT  NORD  EUROPE</p>
    </body>
</html>

