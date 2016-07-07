<div class="row">
	<div class="col-lg-6 center-block">
		<?php echo $this->Form->create('Customer'); ?>
		<fieldset>
			<legend><?php echo __('Customer Registration'); ?></legend>
		<?php
			echo $this->Form->input('firstname');
			echo $this->Form->input('lastname');
			echo $this->Form->input('email');
			echo $this->Form->input('password',array('type'=>'password'));
			echo $this->Form->input('house_no');
			echo $this->Form->input('streetname');
			echo $this->Form->input('locality');
			echo $this->Form->input('state',array('options'=>$states));
			echo $this->Form->input('city');
			echo $this->Form->input('pincode');
			echo $this->Form->input('age');
			echo $this->Form->input('occupation');
		?>
		</fieldset>
		<?php echo $this->Form->end(__('Submit')); ?>
		
	</div>
</div>
