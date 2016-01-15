
<div class="janela " ng-controller="packageListController" >
	<div class="titulo" >
		Packages
		<div class="controle right">
			<div class="pull-right icones">
				<a href="#config">
					<i class="fa fa-cog icone icone-invert icone-x2"></i>
				</a>
			</div>
			<div class="pull-right">
				<input type="text" value="" placeholder="Buscar.." ng-model="filtraPack" >
			</div>
			
		</div>
	</div>
	<div class="corpo">
		<table class="table">
			<thead>
				<tr>
					<th class="t-small">
						<input type="checkbox">
					</th>
					<th class="t-medium" >Package</th>
					<th class="t-large">Sobre</th>
				</tr>
			</thead>
			<tbody>
				<tr ng-repeat="pack in packages | filter:filtraPack | orderBy:'package'" >
					<td>
						<input type="checkbox" value="{{pack.id}}">
					</td>
					<td>{{pack.package}}</td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>