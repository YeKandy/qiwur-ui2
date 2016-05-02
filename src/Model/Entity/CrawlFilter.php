<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CrawlFilter Entity.
 *
 * @property int $id
 * @property string $page_type
 * @property string $url_filter
 * @property string $text_filter
 * @property string $block_filter
 * @property int $crawl_id
 * @property \App\Model\Entity\Crawl $crawl
 * @property int $user_id
 * @property \App\Model\Entity\User $user
 */
class CrawlFilter extends Entity
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
