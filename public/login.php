<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Connexion</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>


<body>

	<div class="header">
		<h2>Connectez vous</h2>
	</div>
	
	<form method="post" action="login.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Prénom</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Mot de Passe</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_user">Connexion</button>
		</div>
		<p>
			Vous n'êtes pas encore membre ? <a href="register.php">S'enregistrer</a>
		</p>
	</form>


</body>
</html>
