<div class="sellers view">
<h2><?php echo __('Seller'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($seller['Seller']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
			<?php echo h($seller['Seller']['user_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($seller['Seller']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($seller['Seller']['address']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Seller'), array('action' => 'edit', $seller['Seller']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Seller'), array('action' => 'delete', $seller['Seller']['id']), array(), __('Are you sure you want to delete # %s?', $seller['Seller']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Sellers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Seller'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Products'); ?></h3>
	<?php if (!empty($seller['Product'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Code'); ?></th>
		<th><?php echo __('Category Id'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th><?php echo __('Discount'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Views'); ?></th>
		<th><?php echo __('Popularity'); ?></th>
		<th><?php echo __('Sold'); ?></th>
		<th><?php echo __('Stock'); ?></th>
		<th><?php echo __('Image'); ?></th>
		<th><?php echo __('Seller Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($seller['Product'] as $product): ?>
		<tr>
			<td><?php echo $product['id']; ?></td>
			<td><?php echo $product['name']; ?></td>
			<td><?php echo $product['code']; ?></td>
			<td><?php echo $product['category_id']; ?></td>
			<td><?php echo $product['price']; ?></td>
			<td><?php echo $product['discount']; ?></td>
			<td><?php echo $product['description']; ?></td>
			<td><?php echo $product['views']; ?></td>
			<td><?php echo $product['popularity']; ?></td>
			<td><?php echo $product['sold']; ?></td>
			<td><?php echo $product['stock']; ?></td>
			<td><?php echo $product['image']; ?></td>
			<td><?php echo $product['seller_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'products', 'action' => 'view', $product['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'products', 'action' => 'edit', $product['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'products', 'action' => 'delete', $product['id']), array(), __('Are you sure you want to delete # %s?', $product['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
