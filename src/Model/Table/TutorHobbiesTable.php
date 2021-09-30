<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TutorHobbies Model
 *
 * @property \App\Model\Table\TutorsTable&\Cake\ORM\Association\BelongsTo $Tutors
 * @property \App\Model\Table\HobbiesTable&\Cake\ORM\Association\BelongsTo $Hobbies
 *
 * @method \App\Model\Entity\TutorHobby newEmptyEntity()
 * @method \App\Model\Entity\TutorHobby newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TutorHobby[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TutorHobby get($primaryKey, $options = [])
 * @method \App\Model\Entity\TutorHobby findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TutorHobby patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TutorHobby[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TutorHobby|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TutorHobby saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TutorHobby[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TutorHobby[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TutorHobby[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TutorHobby[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TutorHobbiesTable extends AppTable
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

        $this->setTable('tutor_hobbies');
        $this->setDisplayField('tutor_hobby_id');
        $this->setPrimaryKey('tutor_hobby_id');

        $this->belongsTo('Tutors', [
            'foreignKey' => 'tutor_id',
        ]);
        $this->belongsTo('Hobbies', [
            'foreignKey' => 'hobby_id',
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
            ->nonNegativeInteger('tutor_hobby_id')
            ->allowEmptyString('tutor_hobby_id', null, 'create');

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
        $rules->add($rules->existsIn(['hobby_id'], 'Hobbies'), ['errorField' => 'hobby_id']);

        return $rules;
    }

    public function createNewRows($orginalRows, $tutorId)
    {
      if (empty($tutorId)) return false;


      //filter empty row first
      $rows = [];
      foreach($orginalRows as $row)
      {
        if (empty($row['hobby_id'])) continue;
        $rows[] = array(
          'hobby_id' => $row['hobby_id'],
          'tutor_id' => $tutorId
        );
      }
      if (empty($rows)) return false;

      foreach($rows as $row):
        $q = $this->_getInsertQuery('tutor_hobbies', $row);
        $ret = $this->_db->execute($q['query'], $q['values']);
      endforeach;

      return true;
    }
}
