<?php
session_start();

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}
require_once '../includes/config.php';

$pt = new PostTable();
$ct = new CategTable();
if (isset($_POST['title']) && isset($_POST['content'])) {
    $post = new Post();
    $post->setTitle($_POST['title']);
    $post->setContent($_POST['content']);
	$post->setid_cat($_POST['id_cat']);
    $pt->create($post);
}

$posts = $pt->all();
$categs = $ct->all();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Blog</title>
 <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
            
</head>
<body>
	<div class="container">

	<?php  if (isset($_SESSION['username'])) : ?>
			<p> <a href="index.php?logout='1'" style="color: red;">Déconnexion</a> </p>
		<?php endif ?>
    <div class="container">
        <h1 class="text-center">Blog</h1>
        <div class="row">
		<div class="divider"></div>
			<div class="section">
				<h5>Vos Articles</h5>
            <?php foreach($posts as $post): ?>
                <div class="col-md-4">
                    <h2><?= $post['title'] ?></h2>
                    <p><?= $post['content'] ?></p>
					<p><?= $post['cat_title'] ?></p>
					<form method="POST" action="action/action_post_modif.php">
						<label for="modif-tit">Titre : </label><input type="text" name="modif-tit" id="titre" placeholder="Entrez le nouveau titre..." maxlength="50" /><br />
						<label for="contenu">contenu : </label><br /><textarea name="modif-con" id="icon_prefix2" class="materialize-textarea" placeholder="Entrez le nouveau contenu..."></textarea><br />
						<select name="modif-cat"><option value="" disabled selected>Choose your new categorie</option><?php foreach($categs as $categ): ?><option value="<?= $categ['id'] ?>"><?= $categ['title'] ?></option><?php endforeach; ?></select>
	    				<input name="ind" type="hidden" value="<?php echo $post['id'] ;?>">
            			<input type="submit" class="btn btn-primary" value="modifier" />
					</form>
					<form method="POST" action="action/action_post_delete.php">
						<input name="id" type="hidden" value="<?php echo $post['id'] ;?>">
            			<input type="submit" class="btn btn-primary" value="supprimer" />
					</form>
                </div>
            <?php endforeach; ?>
        </div>
		</div>
		<div class="divider"></div>
			<div class="section">
				<h5>Add a Post</h5>
        <div class="row">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Entrez le titre..." maxlength="50">
                </div>
				<div class="form-group">
                    <label for="categorie">categorie</label>
					<div class="input-field col s12">
					<select name="id_cat"><option value="" disabled selected>Choose your categorie</option><?php foreach($categs as $categ): ?><option value="<?= $categ['id'] ?>"><?= $categ['title'] ?></option><?php endforeach; ?></select>
				</div>
                </div>
                  <div class="form-group">
                    <label for="title">Content</label>
                    <textarea id="icon_prefix2" class="materialize-textarea" name="content" placeholder="Entrez le contenu..." maxlength="50"></textarea>
                <input type="submit" class="btn btn-primary" value="ajouter">
            </form>
        </div>
		</div>


		<div class="divider"></div>
			<div class="section">
				<h5>Ajouter ou supprimer une categorie</h5>
        <div class="row">
            <form action="form_cat.php" method="POST">
				<div class="form-group">
                    <label for="categorie">categorie</label>
                    <input type="text" class="form-control" name="categorie" placeholder="Entrez la nouvelle categorie..." maxlength="50">
					<input type="submit" class="btn btn-primary" value="ajouter">
                </div>
            </form>
		
<script>document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems, []);
  });
</script>
			<form action="delete_cat.php" method="POST">
				<div class="form-group">
                    <label for="categorie">sélectionner la categorie a supprimer</label>
				<div class="input-field col s12">
                    <select name="sup_cat"><option value="" disabled selected>Choose your categorie</option><?php foreach($categs as $categ): ?><option value="<?= $categ['id'] ?>"><?= $categ['title'] ?></option><?php endforeach; ?></select>
				</div></br></br>
					<input type="submit" class="btn btn-primary" value="supprimer">
                </div>
            </form>
        </div>
		</div>
    </div>
</body>

          
</html>

