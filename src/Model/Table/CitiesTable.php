<?php
namespace App\Model\Table;

use App\Model\Entity\City;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cities Model
 *
 * @property \Cake\ORM\Association\HasMany $Areas
 */
class CitiesTable extends Table
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

        $this->table('cities');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('Areas', [
            'foreignKey' => 'city_id'
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
            ->allowEmpty('name');

        $validator
            ->requirePresence('name_zh', 'create')
            ->notEmpty('name_zh');

        $validator
            ->integer('root')
            ->requirePresence('root', 'create')
            ->notEmpty('root');

        $validator
            ->integer('children')
            ->requirePresence('children', 'create')
            ->notEmpty('children');

        $validator
            ->integer('layer')
            ->requirePresence('layer', 'create')
            ->notEmpty('layer');

        $validator
            ->integer('order')
            ->requirePresence('order', 'create')
            ->notEmpty('order');

        $validator
            ->integer('code')
            ->requirePresence('code', 'create')
            ->notEmpty('code');

        $validator
            ->integer('is_open')
            ->requirePresence('is_open', 'create')
            ->notEmpty('is_open');

        return $validator;
    }
}
