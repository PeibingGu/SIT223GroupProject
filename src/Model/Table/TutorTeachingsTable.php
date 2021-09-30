<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TutorTeachings Model
 *
 * @property \App\Model\Table\TutorsTable&\Cake\ORM\Association\BelongsTo $Tutors
 *
 * @method \App\Model\Entity\TutorTeaching newEmptyEntity()
 * @method \App\Model\Entity\TutorTeaching newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TutorTeaching[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TutorTeaching get($primaryKey, $options = [])
 * @method \App\Model\Entity\TutorTeaching findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TutorTeaching patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TutorTeaching[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TutorTeaching|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TutorTeaching saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TutorTeaching[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TutorTeaching[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TutorTeaching[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TutorTeaching[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TutorTeachingsTable extends AppTable
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

        $this->setTable('tutor_teachings');
        $this->setDisplayField('teaching_id');
        $this->setPrimaryKey('teaching_id');

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
            ->nonNegativeInteger('teaching_id')
            ->allowEmptyString('teaching_id', null, 'create');

        $validator
            ->scalar('unit_code')
            ->maxLength('unit_code', 16)
            ->allowEmptyString('unit_code');

        $validator
            ->scalar('unit_name')
            ->maxLength('unit_name', 128)
            ->allowEmptyString('unit_name');

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
        $rules->add($rules->existsIn(['tutor_id'], 'Tutors'), ['errorField' => 'tutor_id']);

        return $rules;
    }


    public function createNewRows($orginalRows, $tutorId)
    {
      if (empty($tutorId)) return false;

      //filter empty row first
      $rows = [];
      foreach($orginalRows as $row)
      {
        if (empty($row['unit_code'])||empty($row['unit_name']) || empty($row['fees'])) continue;
        $rows[] = array(
          'unit_code' => $row['unit_code'],
          'unit_name' => $row['unit_name'],
          'fees' => $row['fees'],
          'tutor_id' => $tutorId
        );
      }
      if (empty($rows)) return false;

      foreach($rows as $row):
        $q = $this->_getInsertQuery('tutor_teachings', $row);
        $ret = $this->_db->execute($q['query'], $q['values']);
      endforeach;

      return true;
    }
}
