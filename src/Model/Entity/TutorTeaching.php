<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TutorTeaching Entity
 *
 * @property int $teaching_id
 * @property int|null $tutor_id
 * @property string|null $unit_code
 * @property string|null $unit_name
 * @property string|null $fees
 *
 * @property \App\Model\Entity\Tutor $tutor
 */
class TutorTeaching extends Entity
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
        'tutor_id' => true,
        'unit_code' => true,
        'unit_name' => true,
        'fees' => true,
        'tutor' => true,
    ];
}
