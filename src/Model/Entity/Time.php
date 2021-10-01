<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Time Entity
 *
 * @property int $time_id
 * @property string|null $time_start
 * @property string|null $time_end
 * @property int|null $time_in_mintues
 */
class Time extends Entity
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
        'time_start' => true,
        'time_end' => true,
        'time_in_mintues' => true,
    ];
}
