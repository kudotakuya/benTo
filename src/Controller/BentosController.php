<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\AppController;

class BentosController extends AppController{

    public $name = 'Bentos';

    public function index(){

$this->response->header('Access-Control-Allow-Origin', '*');
        $id = $this->request->data('id');
        $this->Bentos->updateAll(
            array ( 'activation' =>0),
            array ( 'id'   => $id ) );

        $query = $this->Bentos->find('all',[
            'fields' => array('id','activation'),
            'conditions' => array('id' => $id),
            'contain'=>['BentoMenus']
        ]);

        $this->autoRender = false;

        $this->response->charset('UTF-8');
        $this->response->type('json');
        echo json_encode($query);

        // 更新
    }

    public function menuset(){

        $bento_id = $this->request->data('bento_id');
        $menu_id = $this->request->data('menu_id');
        $status = $this->request->data('status');

        $this->BentoMenus = TableRegistry::get('BentoMenus');
        $this->BentoMenus->updateAll(
            array ( 'flag' => $status),
            array ( 'bento_id' => $bento_id, 'menu_id' => $menu_id ) );
  }

    public function activate(){
      $this->response->header('Access-Control-Allow-Origin', '*');
      $bento_id = $this->request->data('bento_id');

      $query = $this->Bentos->find('all',[
            'fields' => array('id','activation'),
            'conditions' => array('id' => $bento_id)
        ]);



        
        $this->autoRender = false;

        $this->response->charset('UTF-8');
        $this->response->type('json');
        echo json_encode($query);
    }


    public function wantList(){
        
        $this->response->header('Access-Control-Allow-Origin', '*');

      $bento_id = $this->request->data('bento_id');
  //      $posts_table = TableRegistry::get('Stages');
  //      $query = $posts_table
  //          ->find()
  //          ->hydrate(false)
//			->join([
//				'table' => 'menus',
//				'alias' => 'Menus',
//				'type' => 'INNER',
//				'conditions' => 'Stages.menu_id = Menus.id'
//			]);
//		debug($query->sql());
  		$query = $this->Bentos->find('all',[
            'fields' => array('Bentos.id'),
            'conditions' =>array('NOT'=> array('id' => 1)),
            'contain'=>['Stages']
        ]);
          $bentoArray = array();
          foreach ($query->toArray() as $row) {
                array_push($bentoArray, $row['stages']);
             }
	
//         $query = $this->Bentos->find()
//   			 ->hydrate(false)
//   			 ->join([
//       			 'table' => 'stages',
//       			 'alias' => 'Stages',
//       			 'type' => 'INNER',
//       			 'conditions' => 'Bentos.id = Stages.bento_id'
//   			 ]);
//var_dump($this->Bentos->getDataSource()->getLog());
        $this->autoRender = false;

        $this->response->charset('UTF-8');
        $this->response->type('json');
        echo json_encode($bentoArray);

	}

    public function exchangeList(){
	  $this->response->header('Access-Control-Allow-Origin', '*');
      $bento_id = $this->request->data('bento_id');

      $query = $this->Bentos->find('all',[
          'fields' => array('id','activation'),
          'conditions' => array('id' => $bento_id),
          'contain'=>['BentoMenus']
      ]);
      $bentoArray = array();
      foreach ($query->toArray()[0]['bento_menus'] as $row) {
          if($row['flag'] == 1){  
              array_push($bentoArray, $row['menu_id']);
          }
      }
	$posts_table = TableRegistry::get('Menus');
        $menuquery = $posts_table
            ->find();
      $menuArray = array();
      foreach ($menuquery->toArray() as $menurow) {
            
         array_push($menuArray, $menurow['id']);
      }
	

      $jsonArray = array('mymenu' => $bentoArray, 'allmenu' => $menuArray);
      $this->autoRender = false;

      $this->response->charset('UTF-8');
      $this->response->type('json');
        

	  echo json_encode($jsonArray);
 

	}
    
    public function addwant(){
        $this->stagesTable = TableRegistry::get('Stages');
        $stage = $this->stagesTable->newEntity();
        $data = array('bento_id' => 1, 'menu_id' => 3, 'want_menu_id' => 5);
        $stage = $this->stagesTable->patchEntity($stage, $data);
        $this->stagesTable->save($stage);
    }

    public function light(){
      $this->response->header('Access-Control-Allow-Origin', '*');
      $bento_id = $this->request->data('bento_id');


      $this->stagesTable = TableRegistry::get('Stages');
      
      $query = $this->stagesTable->find('all',[
          'conditions' => array('Stages.bento_id' => 1)
      ]);
      print_r($query->toArray()[0]['status']);

        if($query->toArray()[0]['status'] == 1){
            $this->bentomenuTable = TableRegistry::get('BentoMenus');
         //   $positionquery = $this->bentomenuTable->find('all',[↲
        //          'conditions' => array('and' => array('BentoMenus.bento_id' => 1,'BentoMenus.menu_id' => $query->toArray()[0]['menu_id'] ))↲
        //     ]);↲
        }
      $this->autoRender = false;

      $this->response->charset('UTF-8');
      $this->response->type('json');
        

	  echo json_encode($query);
 



    } 
}
?>
