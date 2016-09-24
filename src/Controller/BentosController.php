<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;

class BentosController extends AppController{

    public $name = 'Bentos';

    public function index(){
        $tableBento = TableRegistry::get('Bento_menus');
        $query = $tableBento->find();
        $bentoArray = array();
        foreach ($query as $row) {
            
           array_push($bentoArray, $row);

        }

        $this->autoRender = false;

        $this->response->charset('UTF-8');
        $this->response->type('json');
        echo json_encode($bentoArray); 
    }
}

?>
