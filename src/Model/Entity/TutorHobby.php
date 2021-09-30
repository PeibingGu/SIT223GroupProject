<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TutorHobby Entity
 *
 * @property int $tutor_hobby_id
 * @property int|null $tutor_id
 * @property int|null $hobby_id
 *
 * @property \App\Model\Entity\Tutor $tutor
 * @property \App\Model\Entity\Hobby $hobby
 */
class TutorHobby extends Entity
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
        'hobby_id' => true,
        'tutor' => true,
        'hobby' => true,
    ];
}
