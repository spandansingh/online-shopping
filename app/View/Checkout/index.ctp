	<div class="row">
	<div class="col-lg-12">
		<p>Your Address</p>
		<table class="table table-bordered table-stripped">
			<tr>
				<th>House No</th>
				<th>Street</th>
				<th>Locality</th>
				<th>City</th>
				<th>State</th>
				<th>Pincode</th>
			</tr>
			<tr>
				<td><?php echo $address['Address']['houseno'];?></td>
				<td><?php echo $address['Address']['streetname'];?></td>
				<td><?php echo $address['Address']['locality'];?></td>
				<td><?php echo $address['Address']['city'];?></td>
				<td><?php echo $address['Address']['state'];?></td>
				<td><?php echo $address['Address']['pincode'];?></td>
			</tr>
		</table>
	</div>
	<div class="col-lg-12">
		<p>Your Order Details</p>
		<table class="table table-bordered table-stripped">
			<tr>
				<th>Order Id</th>
				<th>Product Id</th>
				<th>Name</th>
			
				<th>Price</th>
				<th>Description</th>
				<th>Quantity</th>
				
			</tr>
			<?php foreach($order as $detail):?>
			<tr>
				<td><?php echo $detail['Order']['id'];?></td>
				<td><?php echo $detail['Product']['id'];?></td>
				<td><?php echo $detail['Product']['name'];?></td>
				
				<td><?php echo $detail['Product']['price'];?></td>
				<td><?php echo $detail['Product']['description'];?></td>
				<td><?php echo $detail['Order']['quantity'];?></td>
				
			</tr>
			<?php endforeach;?>
		</table>
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">
					Choose Payment Method
				</div>
				
			</div>
			<div class="panel-body">
					<div class="col-lg-5">
						<select  class="form-control" id="payment">
							<option selected="true" id="0">Choose</option>
							<option id="1">Cash On Delivery</option>
							<option id="2">Debit Card</option>
							<option id="3">Credit Card</option>
							<option id="4">Netbanking</option>
						</select>
					</div>
					<div class="col-lg-7">
						<p id="paymentdesc"></p>
					</div>
					
			</div>
			<div class="container" id="question" style="display: none">
			<div class="row">
				<div class="col-lg-12">
					<p>Please answer this simple question to continue</p>
					<form id="challengeform" class="form" action="checkout/thankyou" method="post">
							<label></label><input type="text" class="form-control" id="answer"/>
							<?php foreach($order as $order):?>
								<input name="data[Order][]" type="hidden" value="<?php echo $order['Order']['id'];?>"/>
							<?php endforeach;?>
							<input id="go" type="submit" value="GO" />

					</form>
				</div>
			</div>
			</div>
		</div>
	</div>
</div>
