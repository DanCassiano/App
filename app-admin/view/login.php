<!DOCTYPE html>
<html lang="pt-BR" ng-app="App" >
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="<?php echo URL_BASE ?>/app-admin/assets/css/app.css">
	<style>
		body {
			text-align: center;
		}

		.card-login {
			padding: 10px;
			width: 280px;
			margin:90px auto;
			background-color: #fff;
			border-radius: 1px;
			box-shadow: 0 2px 2px 0 rgba(0,0,0,0.12);
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
	<form ng-controller="controlLogin" name="formLogin" ng-submit="send(login)" role="form">
		<div class="card card-login">
			<div class="row">
				<label for="">Login</label>
				<input type="text" class="input-anim" ng-model="login.login" name="login" required>
			</div>
			<div class="row">
				<label for="">Senha</label>
				<input type="password" class="input-anim" ng-model="login.senha" name="senha" required maxlength="8" >
			</div>
			<div class="row text-right">
				<a href="#esqueci">Esqueci minha senha</a>
				<button class="btn btn-padrao" ng-disabled="controlLogin.$invalid" >Login</button>
			</div>
		</div>
	</form>
	<script src="<?php echo URL_BASE ?>/app-admin/assets/js/lib/angular.min.js"></script>
	<script src="<?php echo URL_BASE ?>/app-admin/assets/js/lib/jquery-1.12.0.min.js"></script>
	<script>
		(function () {
			'use strict';
			angular.module("App",[])
					.controller('controlLogin',controlLogin )
					.service("loginService", loginService );

			function controlLogin( $scope, loginService ){
				$scope.send = function(){
					loginService.login($scope.login)
					return false;
				}
			}

			function loginService($http) {

				function handleSuccess(res) {
					if( res.data.status == 1 )
						location.href = "index.php";
				}
				
				function handleError(error) {
					return function () {
						return { success: false, message: error };
					};
				}
				
				this.login = function( user ) {
					user.controle = "login";
					user.metodo = "logar";
					console.log( user )
					var p = $http({
							url:'/app/app-admin/app-ajax.php',
							method:'POST',
							data: $.param( user ),
							headers: {'Content-Type': 'application/x-www-form-urlencoded'}
						});
						p.then(handleSuccess, handleError('Error creating user'));
				};
				return this;
			}
			controlLogin.$inject = ['$scope', 'loginService'];  
			loginService.$inject = ['$http'];
		})();
	</script>
</body>
</html>