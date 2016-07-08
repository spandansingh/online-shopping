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
		
		$this->set('orders', $orders);
	//	pe($orders);
	}

}