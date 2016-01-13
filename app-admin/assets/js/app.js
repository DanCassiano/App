
angular.module("App", []);
angular
	.module("App")
		.controller("dropController", function($scope) {
			
			$scope.aberto = true;

			$scope.logChange = function( $event ) {
				$event.preventDefault()
				$scope.aberto = !$scope.aberto;
			};
			
		})
		.controller("menuController", function($scope) {
			$scope.aberto = false;

			$scope.menus = ["paginas","log","usuarios"];
			
			$scope.clickMenu = function( $event ){
				$event.preventDefault()
				$scope.aberto = !$scope.aberto;
			}
		});