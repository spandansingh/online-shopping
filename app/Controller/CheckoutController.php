<?php

class CheckoutController extends AppController {
	public $uses = array('User', 'Customer', 'Product', 'Order');

	public function index() {
		if ($this -> Auth -> loggedIn()) {
			$user = $this -> Auth -> user();
			$id = $user['id'];
			$customer = $this -> User -> findById($id);
			//pr($customer);
			$address = $this -> Customer -> Address -> findById($customer['Customer']['address_id']);
			$this -> set('address', $address);
			$order = $this -> Order -> find('all', array('conditions' => array('AND' => array('Order.customer_id' => $customer['Customer']['id'], 'Order.status' => 0))));

			$this -> set('order', $order);
		}else{
			return $this->redirect(array('controller'=>'GuestCheckout','action'=>'index'));
		}
	}

	public function finalCheckOut() {

	}

	public function thankyou() {
		//pr($this->request->data);
		$this->Session->delete('cart');
		if ($this -> request -> is('post')) {
			foreach ($this->request->data['Order'] as $orderid) {
				// pr($orderid);
				$this -> Order -> updateAll(array('Order.status' => 1), array('Order.id =' => $orderid));
			}
		}
	}

}
?>