<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Appointments Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\TutorsTable&\Cake\ORM\Association\BelongsTo $Tutors
 * @property \App\Model\Table\TutorTeachingsTable&\Cake\ORM\Association\BelongsTo $TutorTeachings
 *
 * @method \App\Model\Entity\Appointment newEmptyEntity()
 * @method \App\Model\Entity\Appointment newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Appointment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Appointment get($primaryKey, $options = [])
 * @method \App\Model\Entity\Appointment findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Appointment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Appointment[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Appointment|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Appointment saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Appointment[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Appointment[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Appointment[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Appointment[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class AppointmentsTable extends AppTable
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

        $this->setTable('appointments');
        $this->setDisplayField('appointment_id');
        $this->setPrimaryKey('appointment_id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
        $this->belongsTo('Tutors', [
            'foreignKey' => 'tutor_id',
        ]);
        $this->belongsTo('TutorTeachings', [
            'foreignKey' => 'tutor_teaching_id',
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
            ->nonNegativeInteger('appointment_id')
            ->allowEmptyString('appointment_id', null, 'create');

        $validator
            ->dateTime('appt_start_time')
            ->allowEmptyDateTime('appt_start_time');

        $validator
            ->dateTime('appt_end_time')
            ->allowEmptyDateTime('appt_end_time');

        $validator
            ->scalar('status')
            ->allowEmptyString('status');

        $validator
            ->scalar('meeting_url')
            ->maxLength('meeting_url', 255)
            ->allowEmptyString('meeting_url');

        $validator
            ->dateTime('created_time')
            ->allowEmptyDateTime('created_time');

        $validator
            ->decimal('fees')
            ->allowEmptyString('fees');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn(['tutor_id'], 'Tutors'), ['errorField' => 'tutor_id']);
        $rules->add($rules->existsIn(['tutor_teaching_id'], 'TutorTeachings'), ['errorField' => 'tutor_teaching_id']);

        return $rules;
    }

    public function createNew($row)
    {
      //must be given either from user id or to user id, or both
      if (empty($row['user_id']) && empty($row['tutor_id'])) return false;

      if (empty($row['tutor_teaching_id']) || empty($row['appt_start_time'])
        || empty($row['appt_end_time']) || empty($row['fees'])
        ) return false;
      if (empty($row['status'])) $row['status'] = 'Requested';

      if (empty($row['created_time'])) $row['created_time'] = date('Y-m-d H:i:s');

      $q = $this->_getInsertQuery('appointments', $row);
      $ret = $this->_db->execute($q['query'], $q['values']);

      return $ret->lastInsertId();

    }

    public function getAppointmentRow($apptId)
    {
      $sql = "
        SELECT a.first_name as student_first_name, a.last_name as student_last_name, a.email as student_email,
        b.*
        FROM appointments b,
        users a
        WHERE b.user_id = a.user_id
        AND b.appointment_id = ?
        ";
      $ret = $this->_db->execute($sql, [$apptId])->fetch('assoc');
      if (!empty($ret))
      {
        $sql = "SELECT t.tutor_id, t.profile_image, t.average_rating, t.profile_introduction, t.tutoring_strategies,
                u.email, u.user_id, u.first_name, u.last_name, u.mobile, u.email
                FROM tutors as t,
                users as u
                WHERE t.user_id = u.user_id
                AND t.tutor_id = ?
                AND u.is_tutor = '1'
                ORDER BY u.user_id ASC
                ";
          $ret['Tutor'] = $this->_db->execute($sql, [$ret['tutor_id']])->fetch('assoc');
      }

      return $ret;
    }

    public function acceptAppt($apptId)
    {
      if (empty($apptId) || !is_numeric($apptId)) return false;

      return $this->_db->execute("update appointments set status='Approved' WHERE appointment_id = ?", [$apptId]);
    }

    public function declineAppt($apptId)
    {
      if (empty($apptId) || !is_numeric($apptId)) return false;

      return $this->_db->execute("update appointments set status='Declined' WHERE appointment_id = ?", [$apptId]);
    }
}
