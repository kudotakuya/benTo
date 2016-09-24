<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;

class BentosController extends AppController{

    public $name = 'Bentos';

    public function index(){


        $id = $this->request->data('id');
        $query = $this->Bentos->find('all',[
            'fields' => array('id','activation'),
            'conditions' => array('id' => 2),
            'contain'=>['BentoMenus']
        ]);

        $this->autoRender = false;

        $this->response->charset('UTF-8');
        $this->response->type('json');
        echo json_encode($query);

        // 更新する内容を設定
        $data = array('id' => 1, 'activation' => 0);
        // 更新する項目（フィールド指定
        $fields = array('activation');
        // 更新
        $this->Bentos->save($data, false, $fields);
    }
}

?>
