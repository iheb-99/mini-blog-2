<?php 

require_once '../../includes/config.php';

$id=$_POST['id'];
$pt=new PostTable();
$pt -> delete ($id);

header('Location: ../index.php');

