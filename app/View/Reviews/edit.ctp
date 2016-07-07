<div class="reviews">
<?php echo $this->Form->create('Review'); ?>
	<fieldset>
		<legend><?php echo __('Edit Review'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user');
		echo $this->Form->input('review');
		echo $this->Form->input('product_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
