<?php 
namemespace App\Model\Table;

use Cake\ORM\Table;

class BookTitleTable extends Table {

    public function initialize(array $config) {
        $this->table('bento');
        $this->hasMany('bento_menus',[
            'foreignKey' => 'bento_id',
        ]);

    }

}

?>
