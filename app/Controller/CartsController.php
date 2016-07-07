<?php

App::uses('AppController','Controller');

class CartsController extends AppController{
	public $uses = array('Product','Order');
	public function index(){
		
		$data = $this->Session->read('cart');
		$orders = array();
		if(sizeof($data)!=0){
			foreach($data as $key=>$value){
			$this->Product->recursive = 0;
			$productDetails = $this->Product->findById($key);
			$orders[]=array('key'=>$key,'count'=>$value['count'],'details'=>$productDetails);
			$this->Session->write('cartcount',$value['count']);
		}
		$this->set('orders',$orders);
		}
		else{
			$this->Session->setFlash("Your Cart is Empty");
		}
		
	}
	
	public function remove($id){
		$this->Session->delete('cart.'.$id);
		$this->redirect(array('action'=>'index'));
	}
}


?>