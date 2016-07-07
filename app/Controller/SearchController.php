<?php
	App::uses('AppController','Controller');
	
    class SearchController extends AppController{
    	public $uses = array('Product');
		public function search(){
			// pr($this->request->data);
			$term = $this->request->data['S']['term'];
			$this->set('term',$term);
    		$matched = $this->Product->find('all',array('conditions'=>array('Or'=>array('Product.name like '=>"%$term%",'Product.description like '=>"%$term%"))));
			$this->set('matched',$matched);
    	}
    }
?>