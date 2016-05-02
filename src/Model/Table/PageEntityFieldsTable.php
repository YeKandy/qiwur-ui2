<?php
namespace App\Model\Table;

use App\Model\Entity\PageEntityField;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PageEntityFields Model
 *
 * @property \Cake\ORM\Association\BelongsTo $PageEntities
 * @property \Cake\ORM\Association\BelongsTo $Users
 */
class PageEntityFieldsTable extends Table
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

        $this->table('page_entity_fields');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('PageEntities', [
            'foreignKey' => 'page_entity_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
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
            ->requirePresence('css_path', 'create')
            ->notEmpty('css_path');

        $validator
            ->allowEmpty('text_extract_regex');

        $validator
            ->allowEmpty('text_validate_regex');

        $validator
            ->requirePresence('extractor_class', 'create')
            ->notEmpty('extractor_class');

        $validator
            ->requirePresence('sql_data_type', 'create')
            ->notEmpty('sql_data_type');

        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');

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
        $rules->add($rules->existsIn(['page_entity_id'], 'PageEntities'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        return $rules;
    }
}
