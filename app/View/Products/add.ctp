<div class="container">
	<div  class="row">
		<div class="col-lg-8">
			<?php echo $this->Form->create('Product',array('type'=>'file')); ?>
				<fieldset>
					<legend><?php echo __('Add Product'); ?></legend>
				<?php
					echo $this->Form->input('name');
					echo $this->Form->input('code');
					echo $this->Form->input('category_id');
					echo $this->Form->input('price');
					echo $this->Form->input('discount');
					echo $this->Form->input('description');
					echo $this->Form->input('views');
					echo $this->Form->input('popularity');
					echo $this->Form->input('sold');
					echo $this->Form->input('stock');
					echo $this->Form->input('seller_id',array('label','Seller'));
					echo $this->Form->input('image',array('type'=>'file'));
				?>
				</fieldset>
			<?php echo $this->Form->end(__('Submit')); ?>
		</div>
	</div>
</div>
