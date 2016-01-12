<div class="nav nav-padrao">
	<!-- Menu -->
	<a href="#menu" class="trigger-menu">
		<i class="fa fa-cube icone icone-x2"></i>
	</a>
	<!-- Menu -->

	
	
	<!-- Card usuario -->
	<div class="card card-user float-right" class="dropdown-container" ng-controller="dropController" >

		<a href="#usuario" title="Usuario" ng-click="logChange( $event ); $event.preventDefault()">
			<img src="<?php echo URL_BASE ?>/app-admin/upload/user.png" width=40 alt="usuario">
		</a>

		<div class="card card-opcoes ng-hide" ng-hide="aberto" >
			<div class="corpo">
				<a href="#asdasd">Jordan</a>
				<hr>
				<a href="<?php echo URL_BASE ?>/app-admin/user/logoff/">Sair</a>
			</div>
		</div>
	</div>
	<!-- Card usuario -->

</div>
