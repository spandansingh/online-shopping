<?php //error_reporting(0);
App::uses('AppController', 'Controller');
/**
 * Sellers Controller
 *
 * @property Seller $Seller
 * @property PaginatorComponent $Paginator
 */
class SellersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	public $uses  =array('User','Seller','Product','Order','Address','State');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout='seller';
		$this->Seller->recursive = 0;
		$userid = $this->Session->read('sellerid');
		// pr($userid);
		$sellerid = $this->Seller->find('first',array('fields'=>array('id'),'conditions'=>array('Seller.user_id'=>$userid)));
		// pr($sellerid);
		$sellerid = $sellerid['Seller']['id'];
		$this->set('sellers', $this->Seller->Product->Order->find('all',
		array(
				'conditions'=>array('AND'=>array(
						'Product.seller_id'=>$sellerid,
						'Order.status'=>1
						)
					)
				)
			)
		);
		
		
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Seller->exists($id)) {
			throw new NotFoundException(__('Invalid seller'));
		}
		$options = array('conditions' => array('Seller.' . $this->Seller->primaryKey => $id));
		$this->set('seller', $this->Seller->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout='login';
		if ($this->request->is('post')) {
			$user = array(
				'username' => $this->request->data['Seller']['email'],
				'password' => $this->request->data['Seller']['password'],
				'role'=>'Seller'
				
			);
			pr($this->request->data);
			$this->User->create();
			$this->User->save($user);
			$userid = $this->User->getLastInsertId();
			$this->Seller->create();
			$seller = array(
				'name'=>$this->request->data['Seller']['name'],
				'address'=>$this->request->data['Seller']['address'],
				'user_id'=>$userid,
'chalan_no'=>$this->request->data['Seller']['chalan_no']
				
			);
			if ($this->Seller->save($seller)) {
				$this->Session->setFlash(__('The seller has been saved.'));
				return $this->redirect(array('controller'=>'users','action' => 'login'));
			} else {
				$this->Session->setFlash(__('The seller could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Seller->exists($id)) {
			throw new NotFoundException(__('Invalid seller'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Seller->save($this->request->data)) {
				$this->Session->setFlash(__('The seller has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The seller could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Seller.' . $this->Seller->primaryKey => $id));
			$this->request->data = $this->Seller->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Seller->id = $id;
		if (!$this->Seller->exists()) {
			throw new NotFoundException(__('Invalid seller'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Seller->delete()) {
			$this->Session->setFlash(__('The seller has been deleted.'));
		} else {
			$this->Session->setFlash(__('The seller could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function mostSold(){
		$userid = $this->Session->read('sellerid');
		$sellerid = $this->Seller->find('first',array('fields'=>array('id'),'conditions'=>array('Seller.user_id'=>$userid)));
		$sellerid = $sellerid['Seller']['id'];
		$mostSold = $this->Order->query("select product_id,count(product_id) as mx  from orders,products where orders.product_id=products.id and products.seller_id=$sellerid
		 	group by product_id order by mx desc limit 1");
		$product = $this->Product->findById($mostSold[0]['orders']['product_id']);
		
		return $product;
	}
	
	public function leastSold(){
		$userid = $this->Session->read('sellerid');
		$sellerid = $this->Seller->find('first',array('fields'=>array('id'),'conditions'=>array('Seller.user_id'=>$userid)));
		$sellerid = $sellerid['Seller']['id'];
		$mostSold = $this->Order->query("select product_id,count(product_id) as mx  from orders,products where orders.product_id=products.id and products.seller_id=$sellerid
		 	group by product_id order by mx asc limit 1");
		$product = $this->Product->findById($mostSold[0]['orders']['product_id']);
		return $product;
	}
	
	public function getTopGeographicRegion(){
		$userid = $this->Session->read('sellerid');
		$sellerid = $this->Seller->find('first',array('fields'=>array('id'),'conditions'=>array('Seller.user_id'=>$userid)));
		$sellerid = $sellerid['Seller']['id'];
		
		$state = $this->Order->query("SELECT state, COUNT( state ) AS count
										FROM orders, addresses, customers,products
										WHERE orders.customer_id = customers.id
										AND customers.address_id = addresses.id and orders.product_id=products.id and products.seller_id=$sellerid
										ORDER BY count DESC 
										LIMIT 1"
									);
		$state = $state[0]['addresses']['state'];
		$numOrders = $this->Order->query("select count(*) as count from orders,customers,addresses,products where 
											orders.customer_id = customers.id and customers.address_id = addresses.id and orders.product_id=products.id and products.seller_id=$sellerid
											and addresses.state =1 "
									);								
		$this->set("num",$numOrders);
		return $this->State->findById($state);
		
	}
	
	public function highestSellingCategory(){
		$userid = $this->Session->read('sellerid');
		$sellerid = $this->Seller->find('first',array('fields'=>array('id'),'conditions'=>array('Seller.user_id'=>$userid)));
		$sellerid = $sellerid['Seller']['id'];
		$cat = $this->Order->query("SELECT categories.name, COUNT( * ) AS value
									FROM orders, products, categories
									WHERE orders.product_id = products.id
									AND products.category_id = categories.id and orders.product_id=products.id and products.seller_id=$sellerid
									ORDER BY value DESC 
									LIMIT 1"
								);
		return $cat;							
	}
	
	public function stats(){
		$this->layout = "seller";
		$this->set("mostsold",$this->mostSold());
		$this->set("leastsold",$this->leastSold());
		$this->set("highestate",$this->getTopGeographicRegion());
		$this->set("hcategory",$this->highestSellingCategory());
	}
}
