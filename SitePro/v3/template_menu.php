<?php

function renderMenuToHTML($currentPageId,$lang){
    $mymenu = array(
    
        'accueil' => array( 'Accueil' ),
        'CV' => array( 'CV' ),
        'Hobbies' => array('Hobbies'),
        'Projets' => array('Projets'),
        'Contact' => array('Contact me')
        );

        if(isset($_GET['page'])){
            $currentPageId = $_GET['page'];
        
        }
    

        echo '<nav class="menu">';
        echo '<ul>';
        foreach($mymenu as $pageId => $pageParameters) {
            $link = "index.php?page=" . $pageId . "&lang=" . $lang;
 

            if($pageId == $currentPageId) {
                echo '<li><a id="currentpage" href="' . $link .  '">' . $pageParameters[0] . '</a></li>';
            } else {
                echo '<li><a href="' . $link . '">' . $pageParameters[0] . '</a></li>';
            }
        }
        echo '</ul>';
        echo '</nav>';
    }
        
?>