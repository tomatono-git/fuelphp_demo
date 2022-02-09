<?php use Fuel\Core\Asset; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PHP Info</title>
	<?php echo Asset::css('bootstrap.css'); ?>
</head>
<body>
	<header>
		<div class="container">
			<div id="logo"></div>
		</div>
	</header>
	<div class="container">
		<?php phpinfo(); ?>
	</div>
</body>
</html>
