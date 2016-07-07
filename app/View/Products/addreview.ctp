<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<?php
				echo $this->Form->create(null,array('url'=>array('controller'=>'Products','action'=>'addreview')));
				echo $this->Form->input('review',array('type'=>'textarea'));
				echo $this->Form->input('id',array('value'=>$productid));
				echo $this->Form->end("Save");
			?>			
		</div>
	</div>
</div>