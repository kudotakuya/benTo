<?php
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
