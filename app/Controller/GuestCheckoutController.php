<?php

App::uses('AppController','Controller');

class GuestCheckoutController extends AppController{
		
	public $uses=array('Order');
	public function index(){
		
	}
	
	public function remove($id){
		
	}
	
	public function showorders(){
		
		$address = $this->request->data['Order']['address'];
		
		$order = $this -> Order -> find('all', array('conditions' => array('AND' => array('Order.customer_id' => -1, 'Order.status' => 0))));

		$this -> set('order', $order);
		$this->set('address',$address);
	}
	
	public function checkout($s=null) {
		$this->view='thankyou';
		$a =$this->request->data['Address']['address'];
		//pr($this->request->data);
		if ($this -> request -> is('post')) {
			foreach ($this->request->data['Order'] as $orderid) {
				
				$this -> Order -> updateAll(array('Order.status' => 1,'Order.guestaddress' => "'$a'"), array('Order.id' => $orderid));
			}
		}
		$this->Session->delete('cart');
	}
}


?>