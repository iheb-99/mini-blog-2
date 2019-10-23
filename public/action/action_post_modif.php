<?php 

require_once '../../includes/config.php';

$id=$_POST['ind'];
$title=$_POST['modif-tit'];
$content=$_POST['modif-con'];
$id_cat=$_POST['modif-cat'];
$pos=new Post();
$pos -> setID($id);
$pos -> setTitle($title);
$pos -> setContent($content);
$pos -> setid_cat($id_cat);
$pt=new PostTable();
$pt -> update ($pos,$id);

header('Location: ../index.php');

