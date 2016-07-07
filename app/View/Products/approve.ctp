<div class="products ">
	<ol class="breadcrumb">
	  <li><a href="#">Home</a></li>
	  
	  <li class="active">Product Details</li>
	</ol>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th>id</th>
			<th>name</th>
			<th>code</th>
			<th>category</th>
			<th>price</th>
			<th>discount</th>
			<th>description</th>
			<th>stock</th>
			<th>image</th>
			<th class="actions">Actions</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($products as $product): ?>
	<tr>
		<td><?php echo h($product['Product']['id']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['name']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['code']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($product['Category']['name'], array('controller' => 'categories', 'action' => 'view', $product['Category']['id'])); ?>
		</td>
		<td><?php 
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
			?></td>
		<td><?php echo h($product['Product']['discount']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['description']); ?>&nbsp;</td>
		
		<td><?php echo h($product['Product']['stock']); ?>&nbsp;</td>
		<td><?php echo $this->Html->image('/products/'.$product['Product']['image'],array('width'=>60,'height'=>60)); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Form->postLink(__('Approve'), array('action' => 'approve', $product['Product']['id']), array(), __('Are you sure you want to approve the product ?')); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	
	</div>
</div>