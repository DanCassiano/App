
<div class="janela " id="janelaCalendario" ng-controller="controllerCalendar"  >
<!-- 	<header>
		asdasd
	</header> -->
	<div class="corpo">
		<div class="span8 calendar" ui-calendar="uiConfig.calendar" ng-model="eventSource" calendar="myCalendar"></div> 
	</div>
</div>

<div class="dialogo padrao" ng-controller="controllerEvento">
	<form action="" name="EventoForm">
		<div class="titulo">
			Novo Evento
		</div>
		<div class="corpo">
			<div class="row">
				<label for="inputTitulo">Titulo</label>
				<input type="text" ng-model="evento.titulo" ng-required="true" >
			</div>
			{{evento}}
		</div>
		<div class="rodape text-right">
			<a href="#cancelar">Cancelar</a>
			<div class="btn btn-sucesso" ng-disabled="EventoForm.$invalid" ng-click="setEvento(evento)" >Salvar</div>
		</div>
	</form>
</div>