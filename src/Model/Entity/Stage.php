<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Stage Entity.
 *
 * @property int $id
 * @property int $bento_id
 * @property \App\Model\Entity\Bento $bento
 * @property int $menu_id
 * @property \App\Model\Entity\Menu $menu
 * @property int $want_menu_id
 * @property \App\Model\Entity\WantMenu $want_menu
 */
class Stage extends Entity
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
