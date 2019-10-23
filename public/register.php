<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>inscription</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>


<body>
	<div class="header">
		<h2>Veuillez rentrer vos informations</h2>
	</div>

	<form method="post" action="register.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Prénom</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>Mot de passe</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirmer Mot de passe</label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="reg_user">s'enregistrer</button>
		</div>
		<p>
			Vous êtes déja membre ? <a href="login.php">Connexion</a>
		</p>
	</form>
</body>
</html>
