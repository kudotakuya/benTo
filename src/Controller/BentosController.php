<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;

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
            array ( 'flag' =>0),
            array ( 'bento_id' => 1, 'menu_id' => 1 ) );
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

         $query = $this->Bentos->find('all',[
            'fields' => array('Bentos.id', 'Stages.bento_id'),
            'joins' => array( 
      		    'table' => 'stages',
            	'alias' => 'Stage',
      		    'type' => 'INNER',
           		'conditions' => 'Bentos.id = Stages.bento_id'
           	 )
        ]);

        $this->autoRender = false;

        $this->response->charset('UTF-8');
        $this->response->type('json');
        echo json_encode($query);

    }

}

?>
