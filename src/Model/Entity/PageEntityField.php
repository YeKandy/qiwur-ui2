<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PageEntityField Entity.
 *
 * @property int $id
 * @property string $name
 * @property string $css_path
 * @property string $text_extract_regex
 * @property string $text_validate_regex
 * @property string $extractor_class
 * @property string $sql_data_type
 * @property string $description
 * @property int $page_entity_id
 * @property \App\Model\Entity\PageEntity $page_entity
 * @property int $user_id
 * @property \App\Model\Entity\User $user
 */
class PageEntityField extends Entity
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
