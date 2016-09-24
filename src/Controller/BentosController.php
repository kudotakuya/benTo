<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;

class BentosController extends AppController{

    public $name = 'Bentos';

    public function index(){
        $tableBento = TableRegistry::get('Bentos');
        $query = $tableBento->find();
        foreach ($query as $row) {
            print_r($row); // $rowの型はCake\ORM\Entity
            echo $row->id;
        }

        $this->autoRender = false;
        $someVariable = .....;

        $this->response->charset('UTF-8');
        $this->response->type('json');
     //   echo json_encode($someVariable); 
    }
}

?>
