<?php 
namemespace App\Model\Table;

use Cake\ORM\Table;

class BookTitleTable extends Table {

    public function initialize(array $config) {
        $this->table('bento');
    }

}

?>
