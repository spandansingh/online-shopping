<? //php pr($sellers);?>


    <script type = "text/javascript" >
function changeHashOnLoad() {
     window.location.href += "#";
     setTimeout("changeHashAgain()", "50"); 
}

function changeHashAgain() {
  window.location.href += "1";
}

var storedHash = window.location.hash;
window.setInterval(function () {
    if (window.location.hash != storedHash) {
         window.location.hash = storedHash;
    }
}, 50);


</script>

	<div class="row">
		<div class="col-lg-10">
			<p>Your Orders</p>
			<table class="table table-stripped">
				<tr>
					<th>OrderId</th>
					<th>Total/Price</th>
					<th>Admin Deductions (20%) </th>
					<th>Net Earning</th>
				</tr>
			<?php foreach($orders as $s):
			    
			    $admin = 0.2 * $s['Order']['total'];
			    $net =  $s['Order']['total'] - $admin;
			
			?>
				<tr>
					<td><?php echo $s['Order']['id']; ?></td>
					<td><?php echo $s['Order']['total']; ?></td>
					<td><?php echo $admin; ?></td>
					<td><?php echo $net; ?></td>
				</tr>
			<?php endforeach;?>
			</table>
		</div>
	</div>

