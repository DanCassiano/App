<div class="nav nav-padrao">
	<!-- Menu -->
	<div ng-controller="menuController" class="card card-nav-menu" >
		<a href="#menu" class="trigger-menu" ng-click="clickMenu( $event );" >
			<i class="fa fa-bars icone icone-x2"></i>
		</a>
		<div class="card card-popover {{ aberto == false ? 'hide' : 'show' }}" >
			<div class="caret-top"></div>
			<header>
				<a href="#menu" class="trigger-menu" ng-click="clickMenu( $event );" >
					<i class="fa fa-rocket icone icone-x2"></i>
				</a>
			</header>
			<div class="corpo">
				<ul class="lista">
					<li ng-repeat="menu in menus">
						<a href="app/app-admin/{{menu}}">{{menu}}</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	
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


