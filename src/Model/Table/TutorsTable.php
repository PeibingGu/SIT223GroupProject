<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tutors Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Tutor newEmptyEntity()
 * @method \App\Model\Entity\Tutor newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Tutor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tutor get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tutor findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Tutor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tutor[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tutor|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tutor saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tutor[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tutor[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tutor[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tutor[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TutorsTable extends AppTable
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

        $this->setTable('tutors');
        $this->setDisplayField('tutor_id');
        $this->setPrimaryKey('tutor_id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
            ->nonNegativeInteger('tutor_id')
            ->allowEmptyString('tutor_id', null, 'create');

        $validator
            ->scalar('profile_image')
            ->maxLength('profile_image', 128)
            ->allowEmptyFile('profile_image');

        $validator
            ->decimal('average_rating')
            ->allowEmptyString('average_rating');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
