<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Crawl Entity.
 *
 * @property int $id
 * @property string $name
 * @property string $crawl_mode
 * @property int $rounds
 * @property int $finished_rounds
 * @property int $limit
 * @property int $fetched_pages
 * @property int $max_url_length
 * @property string $state
 * @property string $crawlId
 * @property string $configId
 * @property string $seedDirectory
 * @property int $user_id
 * @property \App\Model\Entity\User $user
 * @property \Cake\I18n\Time $finished
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property string $description
 * @property \App\Model\Entity\CrawlFilter[] $crawl_filters
 * @property \App\Model\Entity\HumanAction[] $human_actions
 * @property \App\Model\Entity\NutchConfig[] $nutch_configs
 * @property \App\Model\Entity\NutchJob[] $nutch_jobs
 * @property \App\Model\Entity\NutchMessage[] $nutch_messages
 * @property \App\Model\Entity\PageEntity[] $page_entities
 * @property \App\Model\Entity\Seed[] $seeds
 * @property \App\Model\Entity\SparkJob[] $spark_jobs
 * @property \App\Model\Entity\StopUrl[] $stop_urls
 * @property \App\Model\Entity\WebAuthorization[] $web_authorizations
 */
class Crawl extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
