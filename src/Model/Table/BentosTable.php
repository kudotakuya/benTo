<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;

class BentoTable extends Table {

    public function initialize(array $config) {

        parent::initialize($config);

//        $this->table('Bentos');
    //    $this->displayField('name');
//        $this->primaryKey('id');
        
      //  $this->table('bento');
        $this->hasMany('Bento_menus, [
            'foreignKey' => 'bento_id',
            ]);
    }

}

?>
