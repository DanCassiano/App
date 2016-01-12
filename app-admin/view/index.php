<!DOCTYPE html>
<html lang="<?php echo $app->lang ?>">
<head>
	<meta charset="UTF-8">
	<title><?php echo $app->titulo ?></title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="<?php echo URL_BASE ?>/app-admin/assets/css/app.css">
	<?php $app->getCSS(); ?>
</head>
<body>
	<div class="content">
		<?php 
			$app
				->getHeader()
				->getModulo()
				->getFooter();
		 ?>
	</div>
	<script src="<?php echo URL_BASE ?>/app-admin/assets/js/lib/angular.min.js"></script>
	<script src="<?php echo URL_BASE ?>/app-admin/assets/js/app.js"></script>
	<?php $app->getScripts() ?>
</body>
</html>