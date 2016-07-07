<?php $grand=0;?>
<?php if(!empty($orders)):?>
<div class="row">
	<div class="col-lg-12">
		<table class="table">
			<tr>
				<th>Id</th>
				<th>Item</th>
				<th>Unit Price</th>
				<th>Quantity</th>
				<th>Total Price(Rs.)</th>
				<th>Action</th>
			</tr>
			
			<?php foreach($orders as $order):?>
				<tr>
					<td><?php echo $order['key'];?></td>
					<td><?php echo $order['details']['Product']['name'];?></td>
					<td><?php echo $order['details']['Product']['price'];?></td>
					<td><?php echo $order['count'];?></td>
					<td>
						<?php 
							$grand+=$order['details']['Product']['price']*$order['count'];
							echo $order['details']['Product']['price']*$order['count'];
						?>
					</td>
					<td>
						<?php echo $this->html->link('',array('controller'=>'carts','action'=>'remove',$order['key']),array('class'=>'fa fa-trash-o'));?>
					</td>
				</tr>
			<?php endforeach;?>	
			<tr>
				<td colspan="4">Total(INR)</td>
				<td colspan="1"><?php echo $grand;?></td>
			</tr>
		</table>
		<?php
			echo $this->Form->postLink('Confirm',array('controller'=>'orders','action'=>'add'),array('id'=>'confirm'));
		?>
		<?php endif;?>
	</div>
</div>
