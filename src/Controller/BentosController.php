<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;

class BentosController extends AppController{

    public $name = 'Bentos';

    public function index(){


        $id = $this->request->data('id');
        $status = $this->request->data('status');
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
        
    }

}

?>
