<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TutorQualifications Model
 *
 * @property \App\Model\Table\TutorsTable&\Cake\ORM\Association\BelongsTo $Tutors
 * @property \App\Model\Table\QualificationTypesTable&\Cake\ORM\Association\BelongsTo $QualificationTypes
 * @property \App\Model\Table\UniversitiesTable&\Cake\ORM\Association\BelongsTo $Universities
 *
 * @method \App\Model\Entity\TutorQualification newEmptyEntity()
 * @method \App\Model\Entity\TutorQualification newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TutorQualification[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TutorQualification get($primaryKey, $options = [])
 * @method \App\Model\Entity\TutorQualification findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TutorQualification patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TutorQualification[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TutorQualification|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TutorQualification saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TutorQualification[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TutorQualification[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TutorQualification[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TutorQualification[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TutorQualificationsTable extends AppTable
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

        $this->setTable('tutor_qualifications');
        $this->setDisplayField('tutor_qualification_id');
        $this->setPrimaryKey('tutor_qualification_id');

        $this->belongsTo('Tutors', [
            'foreignKey' => 'tutor_id',
        ]);
        $this->belongsTo('QualificationTypes', [
            'foreignKey' => 'qualification_type_id',
        ]);
        $this->belongsTo('Universities', [
            'foreignKey' => 'university_id',
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
            ->nonNegativeInteger('tutor_qualification_id')
            ->allowEmptyString('tutor_qualification_id', null, 'create');

        $validator
            ->scalar('complete_year')
            ->maxLength('complete_year', 4)
            ->allowEmptyString('complete_year');

        $validator
            ->decimal('gpa')
            ->allowEmptyString('gpa');

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
        $rules->add($rules->existsIn(['qualification_type_id'], 'QualificationTypes'), ['errorField' => 'qualification_type_id']);
        $rules->add($rules->existsIn(['university_id'], 'Universities'), ['errorField' => 'university_id']);

        return $rules;
    }
}
