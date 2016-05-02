<?php
namespace App\Model\Table;

use App\Model\Entity\Crawl;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Crawls Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\HasMany $CrawlFilters
 * @property \Cake\ORM\Association\HasMany $HumanActions
 * @property \Cake\ORM\Association\HasMany $NutchConfigs
 * @property \Cake\ORM\Association\HasMany $NutchJobs
 * @property \Cake\ORM\Association\HasMany $NutchMessages
 * @property \Cake\ORM\Association\HasMany $PageEntities
 * @property \Cake\ORM\Association\HasMany $Seeds
 * @property \Cake\ORM\Association\HasMany $SparkJobs
 * @property \Cake\ORM\Association\HasMany $StopUrls
 * @property \Cake\ORM\Association\HasMany $WebAuthorizations
 */
class CrawlsTable extends Table
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

        $this->table('crawls');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('CrawlFilters', [
            'foreignKey' => 'crawl_id'
        ]);
        $this->hasMany('HumanActions', [
            'foreignKey' => 'crawl_id'
        ]);
        $this->hasMany('NutchConfigs', [
            'foreignKey' => 'crawl_id'
        ]);
        $this->hasMany('NutchJobs', [
            'foreignKey' => 'crawl_id'
        ]);
        $this->hasMany('NutchMessages', [
            'foreignKey' => 'crawl_id'
        ]);
        $this->hasMany('PageEntities', [
            'foreignKey' => 'crawl_id'
        ]);
        $this->hasMany('Seeds', [
            'foreignKey' => 'crawl_id'
        ]);
        $this->hasMany('SparkJobs', [
            'foreignKey' => 'crawl_id'
        ]);
        $this->hasMany('StopUrls', [
            'foreignKey' => 'crawl_id'
        ]);
        $this->hasMany('WebAuthorizations', [
            'foreignKey' => 'crawl_id'
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
            ->requirePresence('crawl_mode', 'create')
            ->notEmpty('crawl_mode');

        $validator
            ->integer('rounds')
            ->requirePresence('rounds', 'create')
            ->notEmpty('rounds');

        $validator
            ->integer('finished_rounds')
            ->requirePresence('finished_rounds', 'create')
            ->notEmpty('finished_rounds');

        $validator
            ->integer('limit')
            ->requirePresence('limit', 'create')
            ->notEmpty('limit');

        $validator
            ->integer('fetched_pages')
            ->requirePresence('fetched_pages', 'create')
            ->notEmpty('fetched_pages');

        $validator
            ->integer('max_url_length')
            ->requirePresence('max_url_length', 'create')
            ->notEmpty('max_url_length');

        $validator
            ->allowEmpty('state');

        $validator
            ->allowEmpty('crawlId');

        $validator
            ->allowEmpty('configId');

        $validator
            ->allowEmpty('seedDirectory');

        $validator
            ->dateTime('finished')
            ->allowEmpty('finished');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        return $rules;
    }
}
