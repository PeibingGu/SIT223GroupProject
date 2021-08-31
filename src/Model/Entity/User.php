<?php
declare(strict_types=1);

namespace App\Model\Entity;
use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $user_id
 * @property string $email
 * @property string $password
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $balance
 * @property bool|null $is_tutor
 * @property bool|null $is_email_verified
 * @property \Cake\I18n\FrozenTime|null $email_verified_time
 * @property string|null $token
 * @property \Cake\I18n\FrozenTime|null $token_expire_time
 * @property \Cake\I18n\FrozenTime|null $created_time
 */
class User extends Entity
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
        'email' => true,
        'password' => true,
        'first_name' => true,
        'last_name' => true,
        'balance' => true,
        'is_tutor' => true,
        'is_email_verified' => true,
        'email_verified_time' => true,
        'token' => true,
        'token_expire_time' => true,
        'created_time' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
        'token',
    ];

    protected function _setPassword(string $password) : ?string
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }
    }
}
