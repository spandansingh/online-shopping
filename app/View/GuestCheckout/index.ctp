
<div class="categories col-lg-6">
<?php echo $this->Form->create(null,array('url'=>array('controller'=>'GuestCheckout','action'=>'showorders'))); ?>
	<fieldset>
		<legend><?php echo __('Guest Checkout'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('address',array('type'=>'textarea'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
