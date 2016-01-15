<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="<?php echo URL_BASE ?>/app-admin/assets/css/app.css">
	<style>
		.card-login {
			padding: 10px;
			display: inline-block;
			margin:90px auto;

		}

		.card-login .row {
			padding-top: 10px;
		}

		.card-login a {
			color: #000;
			text-decoration: none;
		}
	</style>
</head>
<body>
	<div class="card  card-padrao card-login">
		<div class="row">
			<label for="">Login</label>
			<input type="text" class="input-anim">
		</div>
		<div class="row">
			<label for="">Senha</label>
			<input type="password" class="input-anim">
		</div>
		<div class="row text-right">
			<a href="#esqueci">Esqueci minha senha</a>
			<button class="btn btn-padrao">Login</button>
		</div>
	</div>
	
	<script src="<?php echo URL_BASE ?>/app-admin/assets/js/lib/angular.min.js"></script>
</body>
</html>