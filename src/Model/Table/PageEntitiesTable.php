<?php
namespace App\Model\Table;

use App\Model\Entity\PageEntity;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PageEntities Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Crawls
 * @property \Cake\ORM\Association\HasMany $PageEntityFields
 * @property \Cake\ORM\Association\HasMany $ScentJobs
 */
class PageEntitiesTable extends Table
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

        $this->table('page_entities');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Crawls', [
            'foreignKey' => 'crawl_id'
        ]);
        $this->hasMany('PageEntityFields', [
            'foreignKey' => 'page_entity_id'
        ]);
        $this->hasMany('ScentJobs', [
            'foreignKey' => 'page_entity_id'
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
            ->allowEmpty('domain');

        $validator
            ->requirePresence('block_path', 'create')
            ->notEmpty('block_path');

        $validator
            ->allowEmpty('url_filter');

        $validator
            ->allowEmpty('text_filter');

        $validator
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        $validator
            ->allowEmpty('description');

        $validator
            ->dateTime('finished')
            ->allowEmpty('finished');

        $validator
            ->allowEmpty('crawlId');

        $validator
            ->allowEmpty('configId');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['crawl_id'], 'Crawls'));
        return $rules;
    }
}
