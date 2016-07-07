<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h3>Search <?php echo $term;?></h3>
			<hr>
		</div>
		<?php foreach($matched as $product):
		?>
		<div class="col-lg-2">
			<div class="price">
				<?php echo $product['Product']['name']; ?>
			</div>
			<a href="#" class="thumbnail"> <?php echo $this -> Html -> Image('/products/' . $product['Product']['image']); ?></a>
			<div class="detailslink">
    						<?php echo $this->Html->link('View',array('controller'=>'Products','action'=>'details',$product['Product']['id']));?>
    		</div>
			<div class="product-detail">
				<?php echo $product['Product']['description']; ?>
			</div>
			<div class="price">
				<?php echo "Rs " . $product['Product']['price']; ?>
			</div>
			<div class="buy">
				<?php

				echo $this -> Form -> postLink('Buy', array('controller' => 'products', 'action' => 'buy', $product['Product']['id'], 'class' => 'buy'));
				?>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
</div>
