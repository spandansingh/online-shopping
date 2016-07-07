<div style="height: 40px;"></div>
<ul class="list-group sidebar">
	<li class="list-group-item active">
		<i class="fa fa-home"></i>
		<?php echo $this->Html->link("Home",array('controller'=>'home'));?>
	</li>
<?php foreach($cats as $cat):?>
	<li class="list-group-item">
		<?php echo $this -> Html -> link($cat['Category']['name'], array('controller' => 'categories', 'action' => 'view', $cat['Category']['id'])); ?>
	</li>
<?php endforeach;?>
</ul>