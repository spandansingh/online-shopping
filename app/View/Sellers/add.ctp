<div class="sellers col-lg-4 ">
<?php echo $this->Form->create('Seller'); ?>
	<fieldset>
		<legend><?php echo __('Seller Register'); ?></legend>
	<?php
		echo $this->Form->input('email',array('type'=>'email'));
		echo $this->Form->input('name');
		echo $this->Form->input('address');
		echo $this->Form->input('chalan_no');
		echo $this->Form->input('password',array('type'=>'password'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
