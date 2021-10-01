<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Appointment Entity
 *
 * @property int $appointment_id
 * @property int|null $user_id
 * @property int|null $tutor_id
 * @property int|null $tutor_teaching_id
 * @property \Cake\I18n\FrozenTime|null $appt_start_time
 * @property \Cake\I18n\FrozenTime|null $appt_end_time
 * @property string|null $status
 * @property string|null $meeting_url
 * @property \Cake\I18n\FrozenTime|null $created_time
 * @property string|null $fees
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Tutor $tutor
 * @property \App\Model\Entity\TutorTeaching $tutor_teaching
 */
class Appointment extends Entity
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
        'tutor_id' => true,
        'tutor_teaching_id' => true,
        'appt_start_time' => true,
        'appt_end_time' => true,
        'status' => true,
        'meeting_url' => true,
        'created_time' => true,
        'fees' => true,
        'user' => true,
        'tutor' => true,
        'tutor_teaching' => true,
    ];
}
