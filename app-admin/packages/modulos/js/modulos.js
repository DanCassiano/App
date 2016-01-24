angular
	.module("App")
		.controller("packageListController", packageListController )
		.service("packageService", packageService );


function packageListController( $scope, packageService ) {
	function success(obj){
		// console.log('Data: ', obj);
		// $scope.packages = obj.data;
	}
	function error(err){
		console.log('Erro: ', err);
	}

	packageService
		.getList()
		.then(success, error);
	
}

function packageService($http) {
	var REQ = {
			url: 'http://localhost:3000/app/app-admin/app-ajax.php',
			method: 'POST'
		};

		this.getList = function() {
			return $http(REQ);
		};
	return this;
}

packageListController.$inject = ['$scope', 'packageService'];  
packageService.$inject = ['$http'];  