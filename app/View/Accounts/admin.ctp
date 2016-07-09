
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
			<h3>Account Statements</h3>
			<button class="btn btn-primary" type="button">
			  Total Earning <span class="badge">Rs <?= $admin_total ?></span>
			</button>
			<p> </p>
			<table class="table table-stripped">
				<tr>
					<th>OrderId</th>
					<th>Total/Price </th>
					<th>Seller Earning (80%) </th>
					<th>Your Earning (20%) </th>
				</tr>
			<?php foreach($orders as $s): ?>
				<tr>
					<td><?php echo $s['Order']['id']; ?></td>
					<td><?php echo $s['Order']['total']; ?></td>
					<td><?php echo $s['Order']['seller_amount']; ?></td>
					<td><?php echo $s['Order']['admin_amount']; ?></td>
				</tr>
			<?php endforeach;?>
			</table>
		</div>
	</div>

