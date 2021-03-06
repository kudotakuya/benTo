<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Bento Entity.
 *
 * @property int $id
 * @property int $activation
 * @property \Cake\I18n\Time $deadtime
 * @property \App\Model\Entity\BentoMenu[] $bento_menus
 * @property \App\Model\Entity\Stage[] $stages
 */
class Bento extends Entity
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
