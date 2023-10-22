<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="estils_pt03.css">
	<title>Insert</title>
</head>

<body>
<div class="topnav">
  <a class="active" href="webLogada.php">Home</a>
  <a href="logout.php">Cierra sesión</a>
</div>
	<div class="Insert">
		<label>Introduzca un artículo: </label>
		<form action="insertController.php" method="post">
			<input type="text" name="article" placeholder="Article">
			<input type="submit" name="enviaArticle" value="Añadir">
		</form>
	</div>

	<!-- Missatje d'exit o errors -->
<?php if (isset($successMessage)): ?>
    <div class="success-message"><?php echo $successMessage; ?></div>
<?php endif; ?>

<?php if (!empty($errores)): ?>
    <div class="error-message">
        <?php foreach ($errores as $error): ?>
            <p><?php echo $error; ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
</body>

</html>