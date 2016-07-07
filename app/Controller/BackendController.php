<?php
    App::uses('AppController','Controller');
	class BackendController extends AppController{
		
		public $uses = array('Order','Customer','Address');
		
		public function index(){
			$this->Order->recursive = 2;
			$pendingOrders = $this->Order->find('all',array('conditions'=>array('Order.processingstatus'=>0)));
			$pendingOrderCount = $this->Order->find('count',array('condition'=>array('Order.status'=>0)));
			$this->set('pendingOrders',$pendingOrders);
			$this->set('pendingOrderCount',$pendingOrderCount);
			
		}
		
		public function pendingOrders(){
			$pendingOrders = $this->Order->find('all',array('conditions'=>array('Order.processingstatus='=>0)));
			$pendingOrderCount = $this->Order->find('count',array('condition'=>array('Order.processingstatus'=>0)));
			$this->set('pendingOrders',$pendingOrders);
			$this->set('pendingOrderCount',$pendingOrderCount);
		}
		
		public function allOrders(){
			$allOrders = $this->Order->find('all');
			$allOrderCount = $this->Order->find('count');
			$this->set('allOrders',$allOrders);
			$this->set('allOrderCount',$allOrderCount);
		}
	}
?>