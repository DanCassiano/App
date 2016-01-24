
angular.module("App", []);
angular
	.module("App")
		.controller("dropController",dropController)
		.controller("menuController",menuController)
		.service("loginService", loginService );

		function dropController($scope, loginService){
			$scope.aberto = true;

			$scope.logChange = function( $event ) {
				$event.preventDefault()
				$scope.aberto = !$scope.aberto;
			};

			$scope.logoff = function( id ){
				loginService.logoff(id);
			}
		}

		function menuController( $scope ){
			$scope.aberto = false;

			$scope.menus = ["paginas","log","usuarios"];
			
			$scope.clickMenu = function( $event ){
				$event.preventDefault()
				$scope.aberto = !$scope.aberto;
			}
		}

		function loginService($http) {

			function handleSuccess(res) {
				if( res.data.status == 1 )
					location.reload();
			}
				
			function handleError(error) {
				return function () {
					return { success: false, message: error };
				};
			}
				
			this.logoff = function( id ) {
				var p = $http({
						url:'/app/app-admin/app-ajax.php',
						method:'POST',
						data: $.param({ controle: "login", metodo: "logout", id: id }),
						headers: {'Content-Type': 'application/x-www-form-urlencoded'}
					});
					p.then(handleSuccess, handleError('Error creating user'));
			};
			return this;
		}
		dropController.$inject = ['$scope', 'loginService'];  
		loginService.$inject = ['$http'];