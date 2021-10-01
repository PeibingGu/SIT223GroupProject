<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Messages Model
 *
 * @property \App\Model\Table\FromUsersTable&\Cake\ORM\Association\BelongsTo $FromUsers
 * @property \App\Model\Table\ToUsersTable&\Cake\ORM\Association\BelongsTo $ToUsers
 *
 * @method \App\Model\Entity\Message newEmptyEntity()
 * @method \App\Model\Entity\Message newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Message[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Message get($primaryKey, $options = [])
 * @method \App\Model\Entity\Message findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Message patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Message[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Message|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Message saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Message[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Message[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Message[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Message[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class MessagesTable extends AppTable
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

        $this->setTable('messages');
        $this->setDisplayField('message_id');
        $this->setPrimaryKey('message_id');

        $this->belongsTo('FromUsers', [
            'foreignKey' => 'from_user_id',
        ]);
        $this->belongsTo('ToUsers', [
            'foreignKey' => 'to_user_id',
        ]);
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
            ->nonNegativeInteger('message_id')
            ->allowEmptyString('message_id', null, 'create');

        $validator
            ->scalar('message_content')
            ->maxLength('message_content', 4294967295)
            ->allowEmptyString('message_content');

        $validator
            ->boolean('is_new')
            ->allowEmptyString('is_new');

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
        $rules->add($rules->existsIn(['from_user_id'], 'FromUsers'), ['errorField' => 'from_user_id']);
        $rules->add($rules->existsIn(['to_user_id'], 'ToUsers'), ['errorField' => 'to_user_id']);

        return $rules;
    }

    public function createNew($row)
    {
      //must be given either from user id or to user id, or both
      if (empty($row['from_user_id']) && empty($row['to_user_id'])) return false;

      if (empty($row['message_content'])) return false;

      if (empty($row['created_time'])) $row['created_time'] = date('Y-m-d H:i:s');

      $q = $this->_getInsertQuery('messages', $row);
      $ret = $this->_db->execute($q['query'], $q['values']);

      return $ret->lastInsertId();

    }

    public function findUserMessages($userId)
    {
      $sql = "
            SELECT a.*,b.first_name as from_first_name,b.last_name as from_last_name,
            c.first_name as to_first_name, c.last_name as to_last_name
            FROM messages a
            left join users as b
            on a.from_user_id = b.user_id
            left join users as c
            on a.to_user_id = c.user_id
            WHERE a.from_user_id = ?
            OR a.to_user_id = ?
            Order by a.from_user_id ASC, a.created_time DESC
            ";
      return $this->_db->execute($sql, [$userId, $userId])->fetchAll('assoc');
    }
}
