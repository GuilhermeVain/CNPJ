<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

	//$consulta = $this->Usuario->query("SELECT creditos FROM usuario WHERE id = 4");


?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('adminlte');
		echo $this->Html->css('adminlte.min');
		echo $this->Html->css('all.min');
		echo $this->Html->css('bootstrap-grid');
		echo $this->Html->css('bootstrap.min');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body class="hold-transition sidebar-mini">
	<div id="container">
		<div id="header">
			<nav class="main-header navbar navbar-expand navbar-white navbar-light">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
					</li>
					<li class="nav-item d-none d-sm-inline-block">
						<a href="" class="nav-link">Inicio</a>
					</li>
					<li class="nav-item d-none d-sm-inline-block">
						<a href="" class="nav-link">Logs</a>
					</li>
				</ul>
				<ul class="navbar-nav ml-auto">
					<li class="nav-item d-none d-sm-inline-block">
						<a id="creditos" class="nav-link"><?php //echo $consulta['creditos']; ?></a>
					</li>
					<div class="dropdown">  
						<button type="button" class="btn text-primary dropdown-toggle" data-toggle="dropdown">  
							<i class="fas fa-user" aria-hidden="true" alt="" title=""></i>
						</button>  
						<div class="dropdown-menu" style="margin: .125rem -6rem 0;">  
							<button class="dropdown-item" id='alterarSenha' type="button"> <i class="fas fa-key text-success"></i> Mudar senha</button>  
							<a href="" class="nav-link"><i class="fas fa-sign-out-alt text-danger"></i> Sair</a>
						</div>  
					</div> 
				</ul>
			</nav>	
		</div>
		<div id="content">
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<a href="" class="brand-link">
				<img src="<?php echo $this->webroot; ?>img/LOGO-corbee.png" class="brand-image img-circle elevation-3" style="opacity: .8">
				<span class="brand-text font-weight-light">Consulta CNPJ</span>
			</a>
			<div class="sidebar">
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="info">
						<a class="d-block"><?php //echo ($_SESSION['nome']);?></a>
					</div>
				</div>
				<?php //if($_SESSION['perfilID'] == 1 ) {?>
					<nav class="mt-2">
						<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
							<li class="nav-item">
								<a href="" class="nav-link">
									<i class="nav-icon fas fa-search"></i>
									<p>
										Consulta CNPJ
									</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="" class="nav-link">
									<i class="nav-icon far fa-address-book"></i>
									<p>
										Cadastrar Usuário
									</p>
								</a>
							</li>
						</ul>
					</nav>

				<?php //} else {?>
					<!-- <nav class="mt-2">
						<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
							<li class="nav-item">
								<a href="" class="nav-link">
									<i class="nav-icon fas fa-search"></i>
									<p>
										Consulta CNPJ
									</p>
								</a>
							</li>
						</ul>
					</nav> -->
				<?php //}?>
			</div>
		</aside>
			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">

		</div>
	</div>
</body>
</html>
