<div class='container'>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">
					All  <?php echo $category['Category']['name'];?> Items
				</div>
			</div>
  			<div class="panel-body">
  				
    			<div class="row">
    				<?php foreach($products['Product'] as $product):?>
    				<div class="col-lg-2 product">
    					<a href="#" class="thumbnail">
    						<?php echo $this->Html->Image('/products/'.$product['image']);?>
    					</a>
    					<div class="detailslink">
    						<?php echo $this->Html->link('View',array('controller'=>'Products','action'=>'details',$product['id']));?>
    					</div>
    					<div class="product-detail">
    						<?php echo $product['description'];?>
    					</div>
    					<div class="price">
    						<?php echo "Rs ".$product['price'];?>
    					</div>
    					<div class="buy">
    						<?php
    						
    							echo $this->Form->postLink('Buy',array('controller'=>'products','action'=>'buy',$product['id']));
    							
    						?>
    					</div>	
    				</div>
    				
    				<?php endforeach;?>
    			</div>
  			</div>
		</div>
	</div>
</div>