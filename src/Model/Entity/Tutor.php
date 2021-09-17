<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tutor Entity
 *
 * @property int $tutor_id
 * @property int|null $user_id
 * @property string|null $profile_image
 * @property string|null $average_rating
 * @property \Cake\I18n\FrozenTime|null $created_time
 *
 * @property \App\Model\Entity\User $user
 */
class Tutor extends Entity
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
        'user_id' => true,
        'profile_image' => true,
        'average_rating' => true,
        'created_time' => true,
        'user' => true,
    ];
}
