

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-danger">
			<div class="panel-heading">
				<div class="panel-title">
					All Pending Orders
				</div>
			</div>
				<div class="panel-body">
					<table class="table table-stripped">
						<tr>
							<th>Order Id</th>
							<th>Product Id</th>
							<th>Quantity</th>
							<th>Customer Id</th>
							<th>Customer Name</th>
							<th>Address</th>
						</tr>	
					
					<?php foreach($pendingOrders as $order):?>
						<tr>
							<td><?php echo $order['Order']['id'];?></td>
							<td><?php echo $order['Product']['id'];?></td>
							<td><?php echo $order['Order']['quantity'];?></td>
							<td><?php echo $order['Customer']['id'];?></td>
							<td><?php echo $order['Customer']['firstname']." ".$order['Customer']['lastname'];?></td>
							<td>
								<?php 
									$house_no = $order['Customer']['Address']['houseno'];
									$street = $order['Customer']['Address']['streetname'];
									$locality = $order['Customer']['Address']['locality'];
									$city = $order['Customer']['Address']['city'];
									$state = $order['Customer']['Address']['state'];
									$fullAddress = $house_no."/".$street."/".$locality."/".$city."/".$state;
									echo $fullAddress;
									
								?>
							</td
						</tr>	
					<?php endforeach;?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
