<div class="row">
	<div class="col-lg-6">
		<form>
			<label for="username">Username</label><input type="text" name="username" />
			<label for="password">Password</label><input type="password" name="password" />
			<input type="Submit"  value="Login"/>
		</form>
		<?php
			echo $this->Html->link('Register',array('controller'=>'Customers','action'=>'add'));
		?>
	</div>
</div>


