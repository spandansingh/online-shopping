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
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this -> fetch('title'); ?>
	</title>
	<?php
	echo $this -> Html -> meta('icon');

	echo $this -> Html -> css(array('bootstrap.min.css', 'bootstrap-theme.min.css', 'font-awesome.min.css', 'jquery.fancybox', 'cake.generic'));
	echo $this -> Html -> script(array('jquery-2.1.3.min.js', 'bootstrap.min.js', 'ajax.js', 'jquery.fancybox'));
	echo $this -> fetch('meta');
	echo $this -> fetch('css');
	echo $this -> fetch('script');
	?>
	<script>
		$(document).ready(function() {

			/* This is basic - uses default settings */

			$("a#single_image").fancybox();

			/* Using custom settings */

			$("a#inline").fancybox({
				'hideOnContentClick' : true
			});

			/* Apply fancybox to multiple items */

			$("a.group").fancybox({
				'transitionIn' : 'elastic',
				'transitionOut' : 'elastic',
				'speedIn' : 600,
				'speedOut' : 200,
				'overlayShow' : false
			});

		});
	</script>
</head>
<body>
	<div id="container">
		<div class="container">
		
		<div id="header" class="row" >
			<div class="row">
				<div class="col-lg-6">
						
				</div>
				<div class="col-lg-6 pull-right seller">
					<?php 
						if (($name = $this -> Session -> read('username')) == "") {
							echo $this -> Html -> link('Seller Login', array('controller' => 'Users', 'action' => 'login'), array('class' => 'pull-right seller'));
						} 
					?>
					<?php echo $this -> Html -> link('Seller Register|', array('controller' => 'Sellers', 'action' => 'add'), array('class' => 'pull-right')); ?>
					
					<?php
					if (($name = $this -> Session -> read('username')) != "") {
						echo "welcome " . $name;

						echo $this -> Html -> link('Logout|', array('controller' => 'Users', 'action' => 'logout'), array('class' => 'pull-right'));
					}
					?>
					<?php
						
						if($this->Session->read('role')=='seller')
							echo $this->Html->link('Home',array('controller'=>'Sellers','action'=>'index'));
					?>

				</div>
			</div>
			<div class="col-lg-3">
				<?php echo $this -> Html -> image('logo.png', array('width' => 200, 'height' => '50')); ?>
				<p style="text-align: center">Online Shopping</p>
			</div>
			<div class="col-lg-7 search">
				<!-- <?php echo $this -> Form -> create(null, array('url' => array('controller' => 'Search', 'action' => 'search'))); ?>
				
					  <div class="form-group form-group-no-padding">
					    <input type="text" class="form-control" name="data[S][term]" id="exampleInputName2" placeholder="Search Products">
					  </div>
				<?php echo $this -> Form -> end(); ?>
				</form> -->
			</div>
			<div class="col-lg-2">
				<!-- <?php $cart = $this->Session->read('cart');if(sizeof($cart)):?>
				<button class="btn btn-danger">
					<?php
					$cart = $this -> Session -> read('cart');
					$total = 0;
					if (sizeof($cart)) {
						foreach ($cart as $c) {
							$total += $c['count'];
						}
					}
					?>
					<?php if(sizeof($cart)>0):?>
					<?php echo $this -> Html -> link('', array('controller' => 'carts'), array('class' => 'cart fa fa-shopping-cart fa-2x')); ?>
					<?php echo $total; ?>
					<?php endif; ?>
				</button>
				<?php endif; ?> -->
			</div>
		</div>
		</div>
		<div id="content">
			<div class="container ">
				<!-- <div class="row">
					<div class="col-lg-12 cattop">
						<ul class="list-inline">
							<li>Choose a Category &#x25B6;</li>
						<?php foreach($cats as $cat):?>
							<li><?php echo $this -> Html -> link($cat['Category']['name'], array('controller' => 'categories', 'action' => 'view', $cat['Category']['id'])); ?></li>
						<?php endforeach; ?>
						</ul>
					</div>
				</div> -->
			<div class="row ">
				<!-- <div class="col-lg-4">
						<?php echo $this -> element('categories', array('cats' => $cats)); ?>
				</div>
				<div class="col-lg-8">
					
					<div id="myCarousel" class="carousel slide " data-ride="carousel">
						  <ol class="carousel-indicators">
						    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						    <li data-target="#myCarousel" data-slide-to="1"></li>
						    <li data-target="#myCarousel" data-slide-to="2"></li>
						    <li data-target="#myCarousel" data-slide-to="3"></li>
						  </ol>
						  <div class="carousel-inner nocolor" role="listbox">
						    <div class="item active">
						      <?php echo $this -> Html -> Image('/products/20150330_194942_730x300_image-730-300-2.jpg', array('height' => '400px')); ?>
						    </div>
						
						    <div class="item">
						      <?php echo $this -> Html -> Image('/products/20150407_124526_730x300_image-730-300-18.jpg'); ?>
						    </div>
						 </div>
					</div>
				</div> -->
			</div>
			</div>
			
			<?php echo $this -> Session -> flash(); ?>

			<?php echo $this -> fetch('content'); ?>
		</div>
		<div id="footer">
			
		</div>
	</div>
	
</body>
</html>
