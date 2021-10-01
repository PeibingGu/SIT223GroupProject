<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Message Entity
 *
 * @property int $message_id
 * @property int|null $from_user_id
 * @property int|null $to_user_id
 * @property string|null $message_content
 * @property bool|null $is_new
 * @property \Cake\I18n\FrozenTime|null $created_time
 *
 * @property \App\Model\Entity\FromUser $from_user
 * @property \App\Model\Entity\ToUser $to_user
 */
class Message extends Entity
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
        'from_user_id' => true,
        'to_user_id' => true,
        'message_content' => true,
        'is_new' => true,
        'created_time' => true,
        'from_user' => true,
        'to_user' => true,
    ];
}
