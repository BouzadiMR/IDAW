<link rel="stylesheet" href="Style.css">
<?php
require_once("template_header.php");
require_once("template_menu.php");
$lang = isset($_GET['lang']) ? $_GET['lang'] : 'fr';
$currentPageId = 'accueil';

if(isset($_GET['page'])) {

$currentPageId = $_GET['page'];
}
?>
<header class="bandeau_haut">
<h1 class="titre">Welcome to my professional site!</h1>
</header>
<?php
renderMenuToHTML($currentPageId,$lang);

?>
<section class="corps">
<?php
$pageToInclude = $lang. "/" . $currentPageId . ".php";
if(is_readable($pageToInclude))
require_once($pageToInclude);

else
require_once("error.php");
?>
</section>
<?php
require_once("template_footer.php");
?>

</html>
