<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;

class BentosController extends AppController{

    public $name = 'Bentos';

    public function index(){


        $id = $this->request->data('id');
        $query = $this->Bentos->find('all',[
            'conditions' => array('id' => 1),
            'contain'=>['BentoMenus']
        ]);

        $this->autoRender = false;

        $this->response->charset('UTF-8');
        $this->response->type('json');
        echo json_encode($query); 
    }
}

?>
