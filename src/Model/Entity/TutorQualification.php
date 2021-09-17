<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TutorQualification Entity
 *
 * @property int $tutor_qualification_id
 * @property int|null $tutor_id
 * @property int|null $qualification_type_id
 * @property int|null $university_id
 * @property string|null $complete_year
 * @property string|null $gpa
 *
 * @property \App\Model\Entity\Tutor $tutor
 * @property \App\Model\Entity\QualificationType $qualification_type
 * @property \App\Model\Entity\University $university
 */
class TutorQualification extends Entity
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
        'qualification_type_id' => true,
        'university_id' => true,
        'complete_year' => true,
        'gpa' => true,
        'tutor' => true,
        'qualification_type' => true,
        'university' => true,
    ];
}
