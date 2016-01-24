
<div class="janela " ng-controller="userController" >
	<div class="titulo" >
		Usuarios
		<div class="controle right">
			<div class="pull-right">	
				<input type="serach" ng-model="query" placeholder="Buscar..">
			</div>
			<div class="pull-right">
				<select name="" id="" ng-model="orderList" >
					<option value="1" selected="selected">Ativos</option>
					<option value="0">Inativos</option>
				</select>
			</div>
			<div class="pull-right">
				<a href="#add">
					<i class="fa fa-plus"></i>
					adicionar
				</a>
			</div>
		</div>
	</div>
	<div class="corpo">
		<table class="table">
			<thead>
				<tr>
					<th class="t-small">
						<input type="checkbox" class="squaredFour">
					</th>
					<th class="t-large">Nome</th>
					<th class="t-mediun">Data de cadastro:</th>
					<th class="t-mediun"></th>
				</tr>
			</thead>
			<tbody>
				<tr ng-repeat="user in usuarios | filter:{ login:query, ativo:orderList }   | orderBy:'login' " >
					<td>
						<input type="checkbox" value="{{user.id}}">
					</td>
					<td>{{user.login}}</td>
					<td>
						{{user.data_cadastro}}
					</td>
					<td>
						<a href="#acao" class="btn">
							<i class="fa fa-ban"></i>
							{{ user.ativo == 1 ? "inativar" : "ativar" }}
						</a>
					</td>
				</tr>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="4">
						<div class="pull-right">
							<ul class="paginacao"  ng-show="usuarios.length > limit" >
								<li><a href="#ant" class="btn">Anterior</a></li>
								<li class="atual"><a href="#1" class="btn">1</a></li>
								<li><a href="#2" class="btn">2</a></li>
								<li><a href="#prox" class="btn">Proximo</a></li>
							</ul>
						</div>

						<div class="pull-right" >
							<select ng-model="limit" ng-change="changeQtd(limit)">
								<option value="5">5</option>
								<option value="10">10</option>
								<option value="15">15</option>
							</select>
						</div>
					</td>
				</tr>
			</tfoot>
		</table>
	</div>
</div>