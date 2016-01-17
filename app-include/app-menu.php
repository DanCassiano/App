<?php 
	/**
 	* App Menu
 	*
 	* @package App-Admin
 	* @author Jordan
 	*/

 	/**
 	 * Funcao para montar o menu da parte do app-admin
 	 * @return html
 	 */
	function montaMenu( $atual ) {

		$pdo = new Core\Pdo();
		$menus = $pdo->read("SELECT `id`,`package`,sobre FROM `package` ");
		$iconesPackages = array( 
								 1=> "fa-users",
								 2=>"fa-user-secret",
								 3=>"fa-clone",
								 4 => "fa-calendar-o",
								 5=> "fa-archive");

		if( !empty( $menus )) {

			$classe = "";
			foreach ($menus as $indice => $menu ) {
				$classe = "";
				if( $menu['package']  == $atual )
					$classe = "atual";
				?>
				<div class="row">
					<a href="<?php echo URL_BASE ?>/app-admin/<?php echo $menu['package'] ?>" class="icone menu <?php echo $classe ?>">
						<i class="fa <?php echo $iconesPackages[ $menu['id'] ] ?> icone icone-x2" title="" > </i>
					</a>
				</div>
				<?php
			}
		}
	}