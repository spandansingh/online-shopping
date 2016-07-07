<?php
App::uses('AppController', 'Controller');
/**
 * Products Controller
 *
 * @property Product $Product
 * @property PaginatorComponent $Paginator
 */
class ProductsController extends AppController {
	public $cartcount = 0;
	/**
	 * Components
	 *
	 * @var array
	 */
	public $components = array('Paginator');
	public $uses = array('Product', 'Review', 'Seller');

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> layout = 'seller';
		$this -> Product -> recursive = 0;
		$this -> set('products', $this -> Paginator -> paginate());
	}
	
	public function index1() {
		$this -> layout = 'admin';
		$this -> Product -> recursive = 0;
		$this -> set('products', $this -> Paginator -> paginate());
	}

	public function allseller() {
		$this -> layout = "seller";
		$userid = $this -> Session -> read('sellerid');
		// pr($userid);
		$sellerid = $this -> Seller -> find('first', array('fields' => array('id'), 'conditions' => array('Seller.user_id' => $userid)));
		$sellerid = $sellerid['Seller']['id'];
		$data = $this -> Product -> find('all', array('conditions' => array('Product.seller_id' => $sellerid)));
		$this -> set('products', $data);

	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> layout = 'seller';
		if (!$this -> Product -> exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		$options = array('conditions' => array('Product.' . $this -> Product -> primaryKey => $id));
		$this -> set('product', $this -> Product -> find('first', $options));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		//pr($this->Session->read('sellerid'));
		$this -> layout = "seller";
		if ($this -> request -> is('post')) {
			$this -> Product -> create();
			
			$image_name = $this -> request -> data['Product']['image']['name'];
			$type = $this -> request -> data['Product']['image']['type'];
			$tmp_name = $this -> request -> data['Product']['image']['tmp_name'];
			$this -> uploadImage($image_name, $type, $tmp_name);
			$tmp_name = $this -> request -> data['Product']['image'] = $image_name;

			if ($this -> Product -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The product has been saved.'));
				//return $this->redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The product could not be saved. Please, try again.'));
			}
		}
		$categories = $this -> Product -> Category -> find('list');
		$sellerid = $this -> Session -> read('sellerid');
		$sellers = $this -> Product -> Seller -> find('list', array('conditions' => array('Seller.user_id' => $sellerid)));
		$this -> set(compact('categories'));
		$this -> set(compact('sellers'));
	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this -> layout = 'seller';
		if (!$this -> Product -> exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		if ($this -> request -> is(array('post', 'put'))) {
			$this -> Product -> create();
			pr($this -> request -> data);
			$image_name = $this -> request -> data['Product']['image']['name'];
			$type = $this -> request -> data['Product']['image']['type'];
			$tmp_name = $this -> request -> data['Product']['image']['tmp_name'];
			$this -> uploadImage($image_name, $type, $tmp_name);
			$tmp_name = $this -> request -> data['Product']['image'] = $image_name;

			if ($this -> Product -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The product has been saved.'));
				//return $this->redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The product could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Product.' . $this -> Product -> primaryKey => $id));
			$this -> request -> data = $this -> Product -> find('first', $options);
		}
		$categories = $this -> Product -> Category -> find('list');
		$this -> set(compact('categories'));
	}

	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null) {
		$this -> Product -> id = $id;
		if (!$this -> Product -> exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		$this -> request -> allowMethod('post', 'delete');
		if ($this -> Product -> delete()) {
			$this -> Session -> setFlash(__('The product has been deleted.'));
		} else {
			$this -> Session -> setFlash(__('The product could not be deleted. Please, try again.'));
		}
		return $this -> redirect(array('action' => 'index1'));
	}

	public function uploadImage($image_name, $type, $tmp_name) {
		$target_folder = WWW_ROOT . DS . "products";
		if (!file_exists($target_folder)) {
			mkdir($target_folder);
		}
		move_uploaded_file($tmp_name, $target_folder . DS . $image_name);
	}

	public function buy($id = 0) {
		$this -> autoRender = false;
		if (!$this -> Session -> check('cart')) {
			$this -> Session -> write('cart', array($id => array('count' => 1)));
			$this -> Session -> setFlash('Item Added to Cart');
			return $this -> redirect(array('controller' => 'home'));
		} else {
			if (!$this -> Session -> check('cart.' . $id)) {
				$count = 0;
				$this -> Session -> write(array('cart.' . $id => array('count' => ++$count)));
			} else {
				$count = $this -> Session -> read('cart.' . $id);
				$cnt = $count['count'];
				$this -> Session -> write(array('cart.' . $id => array('count' => ++$cnt)));
				$this -> Session -> setFlash('Item Added to Cart');
			}
			return $this -> redirect(array('controller' => 'home'));
		}
		pr($this -> Session -> read('cart'));

	}

	public function remove($id = 0) {
		$this -> Session -> delete('cart');
	}

	public function details($id) {
		$details = $this -> Product -> findById($id);
		$this -> set('details', $details);
		$category = $details['Category']['id'];
		//pr($category);
		$related = $this -> Product -> Category -> find('all', array('conditions' => array('Category.id' => $category)));
		// pr($related);
		$this -> set('related', $related);
	}

	public function addreview($id = null) {
		if ($this -> request -> is('Post')) {
			$review = $this -> request -> data['Product']['review'];
			$id = $this -> request -> data['Product']['id'];
			$user = $this -> Session -> read('username');
			$user = 'someone';
			$data = array('review' => $review, 'product_id' => $id, 'user' => $user);
			pr($data);
			pr("welcme");
			$this -> Product -> Review -> save($data);
			$this -> redirect(array('controller' => 'products', 'action' => 'details', $id));
		} else {
			//$this->set('productid',$id);
		}
	}

	public function approve($id = NULL){
		
		if (!empty($id)) {
			$data = array('id' => $id, 'status' => 1);
			$this -> Product -> save($data);
			$this -> redirect(array('controller' => 'products', 'action' => 'approve'));
		}

		$this -> layout = "admin";
		$data = $this -> Product -> find('all', array('conditions' => array('Product.status' => 0)));
		$this -> set('products', $data);

	}

}
