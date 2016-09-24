<?php
namespace App\Model\Table;

use App\Model\Entity\Stage;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Stages Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Bentos
 * @property \Cake\ORM\Association\BelongsTo $Menus
 * @property \Cake\ORM\Association\BelongsTo $WantMenus
 */
class StagesTable extends Table
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

        $this->table('stages');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Bentos', [
            'foreignKey' => 'bento_id'
        ]);
        $this->belongsTo('Menus', [
            'foreignKey' => 'menu_id'
        ]);
        $this->belongsTo('WantMenus', [
            'foreignKey' => 'want_menu_id'
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
        $rules->add($rules->existsIn(['want_menu_id'], 'WantMenus'));
        return $rules;
    }
}
