
<div class="row">
	<div class="col-lg-6">
		<div class="panel panel-info">
			 <div class="panel-heading">Your Most Sold Product</div>
			<div class="panel-body">
				<table class="table">
					<tr>
						<th>Product ID</th>
						<th>Product Name</th>
						<th>Product Code</th>
						<th>Product Price</th>
					</tr>
					<?php if(sizeof($mostsold)>0):?>
					<tr>
						<td>
							<?php
								echo $mostsold['Product']['id'];
							?>
						</td>
						<td>
							<?php
								echo $mostsold['Product']['name'];
							?>
						</td>
						<td>
							<?php
								echo $mostsold['Product']['code'];
							?>
						</td>
						<td>
							<?php
								echo $mostsold['Product']['price'];
							?>
						</td>
					</tr>
					<?php endif;?>
				</table>
			</div>
		</div>
		<div class="panel panel-info">
			 <div class="panel-heading">Your Least Sold Product</div>
			<div class="panel-body">
				<table class="table">
					<tr>
						<th>Product ID</th>
						<th>Product Name</th>
						<th>Product Code</th>
						<th>Product Price</th>
					</tr>
					<?php if(sizeof($leastsold)>0):?>
					<tr>
						<td>
							<?php
								echo $leastsold['Product']['id'];
							?>
						</td>
						<td>
							<?php
								echo $leastsold['Product']['name'];
							?>
						</td>
						<td>
							<?php
								echo $leastsold['Product']['code'];
							?>
						</td>
						<td>
							<?php
								echo $leastsold['Product']['price'];
							?>
						</td>
					</tr>
					<?php endif;?>
				</table>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="panel panel-info">
			 <div class="panel-heading">State with Hisghest Revenue/Orders</div>
			<div class="panel-body">
				<table class="table">
					<tr>
						<th>State ID</th>
						<th>State Name</th>
						<th>Quantity of Orders</th>
					</tr>
					<?php if(sizeof($highestate)>0):?>
					<tr>
						<td>
							<?php
								echo $highestate['State']['id'];
							?>
						</td>
						<td>
							<?php
								echo $highestate['State']['name'];
							?>
						</td>
						<td>
							<?php
								echo $num[0][0]['count'];
							?>
						</td>
						
					</tr>
					<?php endif;?>
				</table>
			</div>
		</div>
		<div class="panel panel-info">
			 <div class="panel-heading">Your Highest Selling Category</div>
			<div class="panel-body">
				<table class="table">
					<tr>
						<th>C Name</th>
						<th>Quantity</th>
					</tr>
					
					<tr>
						<td>
							<?php
								echo $hcategory[0]['categories']['name'];
							?>
						</td>
						<td>
							<?php
								echo $hcategory[0][0]['value'];
							?>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
