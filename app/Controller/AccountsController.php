<?php

class AccountsController extends AppController {
    
    public $uses = array(
        'Seller'
    );
    
    public function seller() {
        $this->layout = 'seller';
        $this->Seller->recursive = 0;
		
		$userid = $this->Session->read('sellerid');
		$sellerid = $this->Seller->find('first',array('fields'=>array('id'),'conditions'=>array('Seller.user_id'=>$userid)));
		$sellerid = $sellerid['Seller']['id'];
	
		$orders = $this->Seller->Product->Order->find('all',array(
			'conditions'=>array(
			    'Product.seller_id' => $sellerid,
				'Order.status' => 1		
			)
		));
		
		$seller_total = 0;

		foreach ($orders as $order) {
			$seller_total += $order['Order']['seller_amount'];
		}

		$this->set('seller_total', $seller_total);
		$this->set('orders', $orders);
	
	}

	public function admin() {
		$this->layout = 'admin';
        $this->Seller->recursive = 0;
		
		$userid = $this->Session->read('sellerid');
		$sellerid = $this->Seller->find('first',array('fields'=>array('id'),'conditions'=>array('Seller.user_id'=>$userid)));
		$sellerid = $sellerid['Seller']['id'];
	
		$orders = $this->Seller->Product->Order->find('all',array(
			'conditions'=>array(
				'Order.status' => 1		
			)
		));
		
		$admin_total = 0;

		foreach ($orders as $order) {
			$admin_total += $order['Order']['admin_amount'];
		}

		$this->set('admin_total', $admin_total);
		$this->set('orders', $orders);

	}

}