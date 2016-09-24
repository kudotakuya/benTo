<?php
namespace App\Model\Table;

use App\Model\Entity\BentoMenu;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BentoMenus Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Bentos
 * @property \Cake\ORM\Association\BelongsTo $Menus
 */
class BentoMenusTable extends Table
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

        $this->table('bento_menus');

        $this->belongsTo('Bentos', [
            'foreignKey' => 'bento_id'
        ]);
        $this->belongsTo('Menus', [
            'foreignKey' => 'menu_id'
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
            ->integer('flag')
            ->allowEmpty('flag');

        $validator
            ->integer('position')
            ->allowEmpty('position');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['bento_id'], 'Bentos'));
        $rules->add($rules->existsIn(['menu_id'], 'Menus'));
        return $rules;
    }
}
