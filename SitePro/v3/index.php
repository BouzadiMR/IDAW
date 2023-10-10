<?php
require_once("template_header.php");
require_once("template_menu.php");

$currentPageId = 'accueil';
if(isset($_GET['page'])) {
   $currentPageId = $_GET['page'];
}

$lang = 'fr'; // Set default language to French
if(isset($_GET['lang'])) {
    $lang = $_GET['lang'];
}
?>
<header class="bandeau_haut">
<h1 class="titre">Bienvenue sur mon site professionnel!</h1>
</header>

<?php
renderMenuToHTML($currentPageId, $lang); // You need to modify the function to accept $lang as a parameter
?>
<section class="corps">
<?php
   $pageToInclude = $lang . '/' . $currentPageId . ".php"; // Change the path to include language
if(is_readable($pageToInclude))
   require_once($pageToInclude);
else
   require_once("error.php");
?>
</section>
<?php
require_once("template_footer.php");
?>

