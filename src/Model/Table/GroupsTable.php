<?php
namespace App\Model\Table;

use App\Model\Entity\Group;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Groups Model
 *
 * @property \Cake\ORM\Association\BelongsTo $ParentGroups
 * @property \Cake\ORM\Association\HasMany $ChildGroups
 * @property \Cake\ORM\Association\HasMany $Users
 */
class GroupsTable extends Table
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

        $this->table('groups');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Tree');

        $this->belongsTo('ParentGroups', [
            'className' => 'Groups',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('ChildGroups', [
            'className' => 'Groups',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'group_id'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('desc', 'create')
            ->notEmpty('desc');

        $validator
            ->integer('lft')
            ->requirePresence('lft', 'create')
            ->notEmpty('lft');

        $validator
            ->integer('rght')
            ->requirePresence('rght', 'create')
            ->notEmpty('rght');

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
        $rules->add($rules->existsIn(['parent_id'], 'ParentGroups'));
        return $rules;
    }
}
