<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * City Entity.
 *
 * @property int $id
 * @property string $name
 * @property string $name_zh
 * @property int $root
 * @property int $children
 * @property int $layer
 * @property int $order
 * @property int $code
 * @property int $is_open
 * @property \App\Model\Entity\Area[] $areas
 */
class City extends Entity
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
