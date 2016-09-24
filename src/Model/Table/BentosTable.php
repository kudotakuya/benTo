<?php
<<<<<<< HEAD

namespace App\Model\Table;

use Cake\ORM\Table;

class BentosTable extends Table {

    public function initialize(array $config) {

//        parent::initialize($config);

//        $this->table('Bentos');
    //    $this->displayField('name');
//        $this->primaryKey('id');
        
      //  $this->table('bento');
//        $this->hasMany('Bento_menus, [
//            'foreignKey' => 'bento_id',
//            ]);
    }

}

?>
=======
namespace App\Model\Table;

use App\Model\Entity\Bento;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Bentos Model
 *
 * @property \Cake\ORM\Association\HasMany $BentoMenus
 * @property \Cake\ORM\Association\HasMany $Stages
 */
class BentosTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('bentos');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('BentoMenus', [
            'foreignKey' => 'bento_id'
        ]);
        $this->hasMany('Stages', [
            'foreignKey' => 'bento_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('activation')
            ->allowEmpty('activation');

        $validator
            ->dateTime('deadtime')
            ->allowEmpty('deadtime');

        return $validator;
    }
}
>>>>>>> 4fd103c15af34cfffd548ffefc208c51c7c664da
