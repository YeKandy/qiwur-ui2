<?php
namespace App\Model\Table;

use App\Model\Entity\CrawlFilter;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CrawlFilters Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Crawls
 * @property \Cake\ORM\Association\BelongsTo $Users
 */
class CrawlFiltersTable extends Table
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

        $this->table('crawl_filters');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Crawls', [
            'foreignKey' => 'crawl_id',
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
            ->requirePresence('page_type', 'create')
            ->notEmpty('page_type');

        $validator
            ->allowEmpty('url_filter');

        $validator
            ->allowEmpty('text_filter');

        $validator
            ->allowEmpty('block_filter');

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
        $rules->add($rules->existsIn(['crawl_id'], 'Crawls'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        return $rules;
    }
}
