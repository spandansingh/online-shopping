<ul class="list-group">
	<li class="list-group-item"><?php echo $this->Html->link('Add Category',array('controller'=>'Categories','action'=>'add'));?></li>
	<li class="list-group-item"><?php echo $this->Html->link('View Categories',array('controller'=>'Categories','action'=>'index'));?></li>
	<li class="list-group-item"><?php echo $this->Html->link('View Reviews',array('controller'=>'Reviews','action'=>'index'));?></li>
	<li class="list-group-item"><?php echo $this->Html->link('View Users',array('controller'=>'Users','action'=>'index'));?></li>
	<li class="list-group-item"><?php echo $this->Html->link('View Products',array('controller'=>'Products','action'=>'index1'));?></li>
	<li class="list-group-item"><?php echo $this->Html->link('View Orders',array('controller'=>'Orders','action'=>'index'));?></li>
	<li class="list-group-item"><?php echo $this->Html->link('Approve Products',array('controller'=>'Products','action'=>'approve'));?></li>
	<li class="list-group-item"><?php echo $this->Html->link('My Account',array('controller'=>'Accounts','action'=>'admin'));?></li>
</ul>
