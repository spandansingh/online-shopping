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
					<th>Product Id</th>
					<th>Quantity</th>
					<th>Customer/Address</th>
					<th>Total/Price</th>
				</tr>
			<?php foreach($sellers as $s):?>
				<tr>
					<td><?php echo $s['Order']['id'];?></td>
					<td>
						<?php 
							$pid = $s['Order']['product_id'];
							echo $this->Html->link($pid,array('controller'=>'products','action'=>'view',$pid));
							
						?>
					</td>
					<td><?php echo $s['Order']['quantity'];?></td>
					<td>
						<?php 
							$cid =  $s['Order']['customer_id'];
							if($cid == -1){
								echo $s['Order']['guestaddress'];
							}else
							echo $this->Html->link($cid,array('controller'=>'customers','action'=>'view',$cid));
						?>
					</td>
					<td><?php echo $s['Order']['total'];?></td>
					
				</tr>
			<?php endforeach;?>
			</table>
		</div>
	</div>

