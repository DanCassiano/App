angular
	.module("App")
	.controller("controllerEvento",function($scope){

		$scope.setEvento = function(contato){

			console.log( contato  )

		}
	});

angular
	.module("App")
	.controller('controllerCalendar', function($scope) {

		$scope.alertEventOnClick = function(date, jsEvent, view){
				// $(".dialogo").show();
				// $(".mascara-dialog").show();
				console.log( date, jsEvent, view )
				$scope.addEvent({ events: [{ title: "tesdsds",start: date  }]})
		},

		 $scope.addEvent = function(Evento) {
			$scope.events.push(Evento);
		};

			/* config object */
		$scope.uiConfig = {
			calendar:{
				editable: true,
				height: 540,
				defaultDate: new Date(),
				lang:"pt-br",
				header: {
					left: 'prev,next today',
					center: 'title',
					right: 'month,agendaWeek,agendaDay'
				},
				dayClick: $scope.alertEventOnClick,
				// eventDrop: $scope.alertOnDrop,
				// eventResize: $scope.alertOnResize
		
			}
		};

		
		$scope.eventSource = { 
			 url: "http://localhost:3000/app/app-admin/app-ajax.php?acao=eventos",
			 className: 'gcal-event',           // an option!
            currentTimezone: 'America/Chicago' // an option!
		}
});


