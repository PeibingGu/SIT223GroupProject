<?php
declare(strict_types=1);

namespace App\Model\Table;
use Cake\ORM\TableRegistry;
// use Cake\Datasource\ConnectionManager;
use Authentication\PasswordHasher\DefaultPasswordHasher;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends AppTable
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('user_id');
        $this->setPrimaryKey('user_id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->nonNegativeInteger('user_id')
            ->allowEmptyString('user_id', null, 'create');

        $validator
            ->email('email')
            ->notEmptyString('email');

        $validator
            ->scalar('password')
            ->maxLength('password', 128)
            ->notEmptyString('password');

        $validator
            ->scalar('first_name')
            ->maxLength('first_name', 32)
            ->allowEmptyString('first_name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 32)
            ->allowEmptyString('last_name');

        $validator
            ->scalar('mobile')
            ->maxLength('mobile', 11)
            ->allowEmptyString('mobile');

        $validator
            ->decimal('balance')
            ->allowEmptyString('balance');

        $validator
            ->boolean('is_tutor')
            ->allowEmptyString('is_tutor');

        $validator
            ->boolean('is_email_verified')
            ->allowEmptyString('is_email_verified');

        $validator
            ->dateTime('email_verified_time')
            ->allowEmptyDateTime('email_verified_time');

        $validator
            ->scalar('token')
            ->maxLength('token', 128)
            ->allowEmptyString('token');

        $validator
            ->dateTime('token_expire_time')
            ->allowEmptyDateTime('token_expire_time');

        $validator
            ->dateTime('created_time')
            ->allowEmptyDateTime('created_time');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);

        return $rules;
    }

    protected function _hashPassword(string $password) : ?string
    {
      return (strlen($password) > 0) ?
        (new DefaultPasswordHasher())->hash($password)
        : $password;
    }

    protected function _checkPassword($hashed, $password)
    {
      return strlen($password) > 0 ?
        (new DefaultPasswordHasher())->check($password, $hashed)
        : false;
    }
    protected function _isValidEmail($email)
    {
      $ret = true;
      if (strpos($email, '@') === false  // contains '@'
        || strpos($email, '@') === 0  //contains '@' in middle
        || strpos($email, '@') !== strrpos($email, '@')  //only contains one '@'
        || strpos($email, '@') > strrpos($email, '.')  // last '.' after '@'
        )
        $ret = false;
      return $ret;
    }


    protected function _generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }


    public function existingEmail($email, $verified = '0')
    {
      if (empty($verified))
      {
        $sql = "
          SELECT count(*) as cnt
          FROM users
          WHERE email = ?
          and is_email_verified = '0'
          ";
      } else {
        $sql = "
          SELECT count(*) as cnt
          FROM users
          WHERE email = ?
          ";
      }
      $ret = $this->_db->execute($sql, [$email])->fetch('assoc');

      return empty($ret['cnt']) ? false: true;
    }


    public function getExistingUserIdByEmail($email)
    {
      $sql = "
        SELECT user_id
        FROM users
        WHERE email = ?
        ";
      $ret = $this->_db->execute($sql, [$email])->fetch('assoc');
      return empty($ret) ? null : $ret['user_id'];
    }

    public function updateUser($row, $userId=null)
    {
      if (empty($row['user_id']) && empty($userId))
        return false;
      elseif (empty($userId)) {
        $userId = $row['user_id'];
        unset($row['user_id']);
      }
      if (!empty($row['password']))
        $row['password'] = $this->_hashPassword($row['password']);

      if (!empty($row['created_time']))
        unset($row['created_time']);

      $q = $this->_getUpdateQuery('users', $row, ['user_id' => $userId]);
      $ret = $this->_db->execute($q['query'], $q['values']);
      if ($ret)
      {
        $ret = $this->getUserById($userId);
      }
      return $ret ? $ret : false;
    }

    public function getUserById($id)
    {
      $sql = "
          SELECT *
          FROM users
          WHERE user_id = ?
        ";
      return $this->_db->execute($sql, [$id])->fetch('assoc');

    }

    public function getExistingUserByEmail($email)
    {
      $sql = "
        SELECT *
        FROM users
        WHERE email = ?
        ";
      $ret = $this->_db->execute($sql, [$email])->fetch('assoc');
      return empty($ret) ? null : $ret;
    }

    public function existingEmailAndOTP($email, $password)
    {
      $sql = "
        SELECT *
        FROM users
        WHERE email = ?
        limit 1
        ";
      $ret = $this->_db->execute($sql, [$email])->fetch('assoc');

      return !empty($ret) && $this->_checkPassword($ret['password'], $password) ? true : false;
    }

    public function createNewUser($row)
    {
        if (isset($row['password']))
          $row['password'] = $this->_hashPassword($row['password']);
        if (isset($row['confirm_password']))
          unset($row['confirm_password']);
        if (empty($row['created_time']))
          $row['created_time'] = date('Y-m-d H:i:s');

        $q = $this->_getInsertQuery('users', $row);
        $ret = $this->_db->execute($q['query'], $q['values']);

        return $ret->lastInsertId();
    }


}
