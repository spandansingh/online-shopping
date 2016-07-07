<?php
//pr($details);
?>
<div class="container">
<div class="row">
	<ol class="breadcrumb">
	  <li><a href="#">Home</a></li>
	  <li><a href="#"><?php echo $details['Category']['name']; ?></a></li>
	  <li class="active"><?php echo $details['Product']['name']; ?></li>
	</ol>
	<div class="col-lg-4">
		<a id="single_image" href="<?php echo Router::url('/', true) . 'products/' . $details['Product']['image']; ?>">
		<?php

		echo $this -> Html -> image('/products/' . $details['Product']['image'], array('width' => 250, 'height' => 300, 'id' => 'single_image', 'href' => $details['Product']['image']));
		?>
		</a>
		<br>
		<p>
			<?php echo $details['Product']['description']; ?>
		</p>
	</div>
	<div class="col-lg-8">
		<h3><?php echo $details['Product']['name']; ?></h3>
		<hr>
			<div class="row">
				<div class="col-lg-4">
					<?php echo $this -> Html -> link('Write Review', array('controller' => 'Products', 'action' => 'addreview', $details['Product']['id'])); ?>
				</div>
				<div class="col-lg-4">
					<?php $customerid=$this->Session->read('customer');?>
					<?php echo $this -> Html -> link('Add to Wishlist', array('controller' => 'Wishes', 'action' => 'savewish',$customerid,$details['Product']['id'])); ?>
				</div>
			</div>
			
		<hr>
		<p>
			<?php echo $details['Product']['description']; ?>
		</p>
		<div class="row">
				<div class="col-lg-5">
					<h3>Price
					<?php
    						$discount = $details['Product']['discount'];
								$price =0;
								if($discount!=0){
									$price = $details['Product']['price'] -$details['Product']['price']*$discount/100; 
								}
    							if($details['Product']['discount']!=0){
    								
    								echo "<strike>Rs ".$details['Product']['price']."</strike><br>";
									echo "Offer Price : Rs ".$price;
								} 
								else	
    								echo "Offer Price : Rs ".$details['Product']['price'];
					?>
					</h3>
				</div>
				<div class="col-lg-3">
					<h3>Sold By <span class="label label-info"><?php echo $details['Seller']['name']; ?></span></h3>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-lg-4">
					<div class="buy">
    						<?php
							echo $this -> Form -> postLink('Buy', array('controller' => 'products', 'action' => 'buy', $details['Product']['id'], 'class' => 'buy'));
    						?>
    					</div>
				</div>
				
			</div>
			<hr>
			<div class="row">
				<div class="col-lg-4">
					<h3>Customer Reviews <span class="badge"><?php echo sizeof($details['Review']); ?></span></h3>
					<hr>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">	
				<?php if(sizeof($details['Review'])!=0):?>
					
				<?php foreach($details['Review'] as $r):?>
					<h5><i class="fa fa-user"></i> <?php echo $r['user']; ?></h5> 
					<p><?php echo $r['review']; ?></p>
					<hr>
				<?php endforeach; ?>
				<?php endif; ?>
				</div>
			</div>
			
			
	</div>
</div>
<hr>
			<h3>Related Products</h3>
			<hr>
			<?php if(sizeof($related)>0):?>
			<div class="row">
				<div class="col-lg-12">
					<?php foreach($related[0]['Product'] as $r):?>
						<!--<?php pr($r);?>-->
						<div class="col-lg-2 product">
    					<a href="#" class="thumbnail">
    						<?php echo $this -> Html -> Image('/products/' . $r['image']); ?>
    					</a>
    					<div class="detailslink">
    						<?php echo $this -> Html -> link('View', array('controller' => 'Products', 'action' => 'details', $r['id'])); ?>
    					</div>
    					<div class="product-detail">
    						<?php echo substr($r['name'], 0, 100); ?>
    					</div>
    					<div class="price">
    						<?php echo "Rs " . $r['price']; ?>
    					</div>
    					<div class="buy">
    						<?php

							echo $this -> Form -> postLink('Buy', array('controller' => 'products', 'action' => 'buy', $r['id'], 'class' => 'buy'));
    						?>
    					</div>
    					
    				</div>
					<?php endforeach; ?>
				</div>
			</div>
			<?php endif; ?>
</div>