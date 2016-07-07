<h1>Your WishList</h1>
<table>
	<tr>
		<th>Product Id</th>
		<th>Product Name</th>
	</tr>
	<?php foreach($wishes as $wish):?>
		<tr>
			<td><?php echo $wish['Product']['id'];?></td>
			<td>
				<?php echo $wish['Product']['name'];?>
				<?php echo $this->Html->link('View',array('controller'=>'products','action'=>'details',$wish['Product']['id']));?>
			</td>
		</tr>
	<?php endforeach;?>
</table>