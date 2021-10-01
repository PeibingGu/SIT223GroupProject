<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ratings Model
 *
 * @property \App\Model\Table\AppointmentsTable&\Cake\ORM\Association\BelongsTo $Appointments
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\TutorsTable&\Cake\ORM\Association\BelongsTo $Tutors
 *
 * @method \App\Model\Entity\Rating newEmptyEntity()
 * @method \App\Model\Entity\Rating newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Rating[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Rating get($primaryKey, $options = [])
 * @method \App\Model\Entity\Rating findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Rating patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Rating[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Rating|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Rating saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Rating[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Rating[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Rating[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Rating[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class RatingsTable extends AppTable
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

        $this->setTable('ratings');
        $this->setDisplayField('rating_id');
        $this->setPrimaryKey('rating_id');

        $this->belongsTo('Appointments', [
            'foreignKey' => 'appointment_id',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
        $this->belongsTo('Tutors', [
            'foreignKey' => 'tutor_id',
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
            ->nonNegativeInteger('rating_id')
            ->allowEmptyString('rating_id', null, 'create');

        $validator
            ->allowEmptyString('stars');

        $validator
            ->scalar('review_content')
            ->maxLength('review_content', 255)
            ->allowEmptyString('review_content');

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
        $rules->add($rules->existsIn(['appointment_id'], 'Appointments'), ['errorField' => 'appointment_id']);
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn(['tutor_id'], 'Tutors'), ['errorField' => 'tutor_id']);

        return $rules;
    }

    public function getApptRating($apptId)
    {
      $sql = "
          SELECT *
          FROM ratings
          WHERE appointment_id = ?
          ";

      return $this->_db->execute($sql, [$apptId])->fetch('assoc');
    }

    public function createNew($row)
    {
      //must be given either from user id or to user id, or both
      if (empty($row['appointment_id']) || empty($row['user_id']) || empty($row['tutor_id'])) return false;

      if (empty($row['stars']) || empty($row['review_content'])) return false;

      if (empty($row['created_time'])) $row['created_time'] = date('Y-m-d H:i:s');

      $q = $this->_getInsertQuery('ratings', $row);
      $ret = $this->_db->execute($q['query'], $q['values']);

      return $ret->lastInsertId();
    }
}
