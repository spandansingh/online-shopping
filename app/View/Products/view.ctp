<div class="customers ">
	<ol class="breadcrumb">
	  <li><a href="#">Home</a></li>
	  <li><a href="#">Product Details</a></li>
	</ol>
	<table class="table table-striped">
		<tr>
		<th>Product Name</th>
		
		<th>Code</th>
		<th>Price</th>
		</tr>
		<tr>
			
		<td><?php echo $product['Product']['name'];?></td>
		<td>
			<?php 
				echo $product['Product']['code'];
			?>
		</td>
		<td>
			<?php 
				$discount = $product['Product']['discount'];
								$price =0;
								if($discount!=0){
									$price = $product['Product']['price'] -$product['Product']['price']*$discount/100; 
								}
    							if($product['Product']['discount']!=0){
    								echo $price;
								} 
								else	
    								echo "Offer Price : Rs ".$product['Product']['price'];
			?>
		</td>
		</tr>
	</table>
</div>


