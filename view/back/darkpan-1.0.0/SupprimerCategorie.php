<?php
include '../../../controller/CategorieC.php';


$message = "" ;
$CategorieC = new CategorieC();

$CategorieC->SupprimerCategorie($_GET["idC"]);
header('Location:AfficherCategories.php');

?>