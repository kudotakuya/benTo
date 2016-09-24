<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;

class BentosController extends AppController{

    public $name = 'Bentos';

    public function index(){
        $tableBento = TableRegistry::get('Bentos');
        $query = $tableBento->find();
        foreach ($query as $row) {
            debug($row); // $rowの型はCake\ORM\Entity
            echo $row->name;
        }
                        
    }
}

?>
