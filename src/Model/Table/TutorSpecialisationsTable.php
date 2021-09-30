<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TutorSpecialisations Model
 *
 * @property \App\Model\Table\TutorsTable&\Cake\ORM\Association\BelongsTo $Tutors
 *
 * @method \App\Model\Entity\TutorSpecialisation newEmptyEntity()
 * @method \App\Model\Entity\TutorSpecialisation newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TutorSpecialisation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TutorSpecialisation get($primaryKey, $options = [])
 * @method \App\Model\Entity\TutorSpecialisation findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TutorSpecialisation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TutorSpecialisation[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TutorSpecialisation|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TutorSpecialisation saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TutorSpecialisation[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TutorSpecialisation[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TutorSpecialisation[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TutorSpecialisation[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TutorSpecialisationsTable extends AppTable
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

        $this->setTable('tutor_specialisations');
        $this->setDisplayField('tutor_specialisation_id');
        $this->setPrimaryKey('tutor_specialisation_id');

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
            ->nonNegativeInteger('tutor_specialisation_id')
            ->allowEmptyString('tutor_specialisation_id', null, 'create');

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
        if (empty($row['specialisation_id'])) continue;
        $rows[] = array(
          'specialisation_id' => $row['specialisation_id'],
          'tutor_id' => $tutorId
        );
      }
      if (empty($rows)) return false;

      foreach($rows as $row):
        $q = $this->_getInsertQuery('tutor_specialisations', $row);
        $ret = $this->_db->execute($q['query'], $q['values']);
      endforeach;

      return true;
    }
}
