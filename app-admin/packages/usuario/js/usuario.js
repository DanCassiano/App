
angular
	.module("App")
	.controller("userController",userController)
	.service("userService", userService );

	function userController( $scope, userService ){

		$scope.orderList = "1";
		$scope.limit = "5";
		userService.list( $scope.limit ).then(success, error);
		function success(dados){
			console.log( dados.data )
			$scope.usuarios=  dados.data;
		}

		function error(error){

		}

		$scope.changeQtd = function( limit ){
			userService.list( limit ).then(success, error);
		}
	}

	function userService( $http ){

		function handleSuccess(res) {

			if( res.data )
				return res.data
		}
			
		function handleError(error) {
			return function () {
				return { success: false, message: error };
			};
		}
			
		this.list = function( limit ) {
			limit = limit || 5;
			return post({ controle: "usuario", metodo: "lista", limit: limit  });
		};

		function post( dados ){
			return $http({
						url:'/app/app-admin/app-ajax.php',
						method:'POST',
						data: $.param( dados ),
						headers: {'Content-Type': 'application/x-www-form-urlencoded'} 
					});
		}
		return this;
	}

	userController.$inject = ['$scope', 'userService'];  
	userService.$inject = ['$http'];
