<ul class="list-group">
	<li class="list-group-item"><?php echo $this->Html->link('Add Product',array('controller'=>'Products','action'=>'add'));?></li>
	<li class="list-group-item"><?php echo $this->Html->link('View Orders',array('controller'=>'Sellers','action'=>'index'));?></li>
	<li class="list-group-item"><?php echo $this->Html->link('View Stats',array('controller'=>'Sellers','action'=>'stats'));?></li>
	<li class="list-group-item"><?php echo $this->Html->link('View Your Products',array('controller'=>'Products','action'=>'allseller'));?></li>
	<li class="list-group-item"><?php echo $this->Html->link('My Account',array('controller'=>'Accounts','action'=>'seller'));?></li>
</ul>
