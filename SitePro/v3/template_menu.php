<?php
function renderMenuToHTML($currentPageId) {
    $mymenu = array(
        'index' => 'Accueil',
        'cv' => 'Cv',
        'hobbies' => 'Hobbies'
        'infos-technique' => 'Infos techniques'

    );

    echo '<nav class="menu">';
    echo '<ul>';

    foreach($mymenu as $pageId => $pageParameters) {
        if($pageId == $currentPageId) {
            echo '<li><a id="currentpage" href="' . $pageId . '.php">' . $pageParameters . '</a></li>';
        } else {
            echo '<li><a href="' . $pageId . '.php">' . $pageParameters . '</a></li>';
        }
    }

    echo '</ul>';
    echo '</nav>';
}
?>
