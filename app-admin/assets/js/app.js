
angular.module("App", []);
angular
	.module("App")
		.controller("dropController", function($scope) {
			
			$scope.aberto = true;

			$scope.logChange = function( $event ) {
				$event.preventDefault()
				$scope.aberto = !$scope.aberto;
			};
			
		});