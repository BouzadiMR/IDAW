<?php

function renderMenuToHTML($currentPageId){
    $mymenu = array(
        // idPage titre
        'accueil' => array( 'Accueil' ),
        'cv' => array( 'Cv' ),
        'hobbies' => array('Hobbies'),
        'infos-techniques' => array('Infos techniques'),
        'contact' => array('Contact me')
        );

        if(isset($_GET['page'])){
            $currentPageId = $_GET['page'];
        }
    
    

        echo '<nav class="menu">';
        echo '<ul>';
        foreach($mymenu as $pageId => $pageParameters) {
            $link = "index.php?page=" . $pageId ;

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
