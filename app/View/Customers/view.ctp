<div class="customers ">
	<ol class="breadcrumb">
	  <li><a href="#">Home</a></li>
	  <li><a href="#">Customer Details</a></li>
	</ol>
	<table class="table table-striped">
		<tr>
		<th>Name</th>
		<th>Address</th>
		</tr>
		<tr>
			
		<td><?php echo $customer['Customer']['firstname'] . $customer['Customer']['lastname'];?></td>
		<td>
			<?php 
				echo "House No:" .$customer['Address']['houseno']."<br>";
				echo "Street:" .$customer['Address']['streetname']."<br>";
				echo "Locallity:" .$customer['Address']['locality']."<br>";
				echo "Pincode:" .$customer['Address']['pincode']."<br>";
			?>
			</td>
		</tr>
	</table>
</div>


