<!DOCTYPE html>
<html lang="<?php echo $app->lang ?>" ng-app="App" >
<head>
	<meta charset="UTF-8">
	<title><?php echo $app->titulo ?></title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href='http://fonts.googleapis.com/css?family=Roboto+Mono&subset=greek' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php echo URL_BASE ?>/app-admin/assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo URL_BASE ?>/app-admin/assets/css/app.css">
	<link rel="stylesheet" href="<?php echo URL_BASE ?>/app-admin/assets/css/normalize.css">
	<?php $app->getCSS(); ?>
	<base href="<?php echo URL_BASE ?>">
	<style>
		.content {
			padding-top: 45px;
		}
	</style>
</head>
<body>
	<div class="content fluido">

		<?php 
			$app
				->getHeader()
				->getModulo()
				->getFooter();
		 ?>
	</div>
	<script src="<?php echo URL_BASE ?>/app-admin/assets/js/lib/angular.min.js"></script>
	<script src="<?php echo URL_BASE ?>/app-admin/assets/js/lib/jquery-1.12.0.min.js"></script>
	<script src="<?php echo URL_BASE ?>/app-admin/assets/js/app.js"></script>
	<?php $app->getScripts() ?>
	<div class="mascara-dialog"></div>
</body>
</html>