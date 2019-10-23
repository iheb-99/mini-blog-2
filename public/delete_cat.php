<?php 

require_once '../includes/config.php';


$id=$_POST['sup_cat'];
$ct = new CategTable();
$ct -> delete ($id);
$categs = $ct->all();

header('Location: index.php');
