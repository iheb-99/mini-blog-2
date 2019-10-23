<?php 

require_once '../includes/config.php';

$ct = new CategTable();
if (isset($_POST['categorie']) ) {
    $categ = new Categ();
    $categ->setTitle($_POST['categorie']);
    $ct->create($categ);
}
$categs = $ct->all();

header('Location: index.php');
 
