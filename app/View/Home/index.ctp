<div class='container'>
<!--<div class="row">
	<div class="col-lg-12">
		
		<ul class="list-inline">
			<li>Choose a Category &#x25B6;</li>
		<?php foreach($categories as $cat):?>
			<li><?php echo $this->Html->link($cat['Category']['name'],array('controller'=>'categories','action'=>'view',$cat['Category']['id']));?></li>
		<?php endforeach;?>
		</ul>
	</div>
</div>-->
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">
					Electronics
				</div>
			</div>
  			<div class="panel-body">
    			<div class="row">
    				<?php foreach($electronics as $product):?>
    				<div class="col-lg-2 product">
    					<a href="#" class="thumbnail">
    						<?php echo $this->Html->Image('/products/'.$product['Product']['image']);?>
    					</a>
    					<div class="detailslink">
    						<?php echo $this->Html->link('View',array('controller'=>'Products','action'=>'details',$product['Product']['id']));?>
    					</div>
    					<div class="product-detail">
    						<?php echo substr($product['Product']['description'],0,100);?>
    					</div>
    					<div class="price">
    						<?php
    							$discount = $product['Product']['discount'];
								$price =0;
								if($discount!=0){
									$price = $product['Product']['price'] -$product['Product']['price']*$discount/100; 
								}
    							if($product['Product']['discount']!=0){
    								
    								echo "<strike>Rs ".$product['Product']['price']."</strike><br>";
									echo "Offer Price : Rs ".$price;
								} 
								else	
    								echo "Offer Price : Rs ".$product['Product']['price'];
								?>
    					</div>
    					<div class="buy">
    						<?php
    						
    							echo $this->Form->postLink('Buy',array('controller'=>'products','action'=>'buy',$product['Product']['id'],'class'=>'buy'));
    							
    						?>
    					</div>
    					
    				</div>
    				<?php endforeach;?>
    			</div>
  			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">
					Books
				</div>
			</div>
			
  			<div class="panel-body">
    			<div class="row">
    				<?php foreach($books as $product):?>
    				<div class="col-lg-2 product">
    					<a href="#" class="thumbnail">
    						<?php echo $this->Html->Image('/products/'.$product['Product']['image']);?>
    					</a>
    					<div class="detailslink">
    						<?php echo $this->Html->link('View',array('controller'=>'Products','action'=>'details',$product['Product']['id']));?>
    					</div>
    					<div class="product-detail">
    						<?php echo substr($product['Product']['description'],0,100);?>
    					</div>
    					<div class="price">
    						<?php 
    							$discount = $product['Product']['discount'];
								$price =0;
								if($discount!=0){
									$price = $product['Product']['price'] -$product['Product']['price']*$discount/100; 
								}
    							if($product['Product']['discount']!=0)
    								echo "Rs ".$price; 
								else	
    								echo "Rs ".$product['Product']['price'];
    						?>
    					</div>
    					<div class="buy">
    						<?php
    						
    							echo $this->Form->postLink('Buy',array('controller'=>'products','action'=>'buy',$product['Product']['id'],'class'=>'buy'));
    							
    						?>
    					</div>
    					
    				</div>
    				<?php endforeach;?>
    			</div>
  			</div>
		</div>
	</div>
</div>