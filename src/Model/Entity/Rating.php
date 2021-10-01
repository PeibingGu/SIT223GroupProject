<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Rating Entity
 *
 * @property int $rating_id
 * @property int|null $appointment_id
 * @property int|null $user_id
 * @property int|null $tutor_id
 * @property int|null $stars
 * @property string|null $review_content
 * @property \Cake\I18n\FrozenTime|null $created_time
 *
 * @property \App\Model\Entity\Appointment $appointment
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Tutor $tutor
 */
class Rating extends Entity
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
        'appointment_id' => true,
        'user_id' => true,
        'tutor_id' => true,
        'stars' => true,
        'review_content' => true,
        'created_time' => true,
        'appointment' => true,
        'user' => true,
        'tutor' => true,
    ];
}
