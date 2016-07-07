<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'Online Bussiness');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
	<head>
		<?php echo $this -> Html -> charset(); ?>
		<title><?php echo $cakeDescription ?>:
			<?php echo $this -> fetch('title'); ?></title>
		<?php
		echo $this -> Html -> meta('icon');

		echo $this -> Html -> css(array('bootstrap.min.css', 'bootstrap-theme.min.css', 'cake.generic'));
		echo $this -> Html -> script(array('jquery-2.1.3.min.js', 'bootstrap.min.js', 'ajax.js'));
		echo $this -> fetch('meta');
		echo $this -> fetch('css');
		echo $this -> fetch('script');
	?>
	</head>
	<body>
		<div id="container">
			<div class="container">

				<div id="header" class="row" >
					<div class="col-lg-6">
						<h3 class="seller">Online Shop Admin Dashboard</h3>	
					</div>
					<div class="col-lg-6">
						<p class="pull-right">
							Welcome <i class="fa fa-user"></i><?php  echo $this->Session->read('username');?>
							<?php echo $this->Html->link('Logout',array('controller'=>'users','action'=>'logout'));?>
						</p>	
					</div>
				</div>
			</div>
			<div id="content">
				<?php echo $this -> Session -> flash(); ?>
				<div class="row">
					<div class="col-lg-3">
						<?php echo $this->element('adminsidebar');?>
					</div>
					<div class="col-lg-9">
						<h1>Welcome Admin!</h1>
						<?php echo $this -> fetch('content'); ?>
					</div>
				</div>
				
			</div>
			<div id="footer">
				
			</div>
		</div>
		
	</body>
</html>
