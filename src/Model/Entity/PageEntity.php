<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PageEntity Entity.
 *
 * @property int $id
 * @property string $name
 * @property string $domain
 * @property string $block_path
 * @property string $url_filter
 * @property string $text_filter
 * @property string $status
 * @property string $description
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $finished
 * @property int $user_id
 * @property \App\Model\Entity\User $user
 * @property int $crawl_id
 * @property \App\Model\Entity\Crawl $crawl
 * @property string $crawlId
 * @property string $configId
 * @property \App\Model\Entity\PageEntityField[] $page_entity_fields
 * @property \App\Model\Entity\ScentJob[] $scent_jobs
 */
class PageEntity extends Entity
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
