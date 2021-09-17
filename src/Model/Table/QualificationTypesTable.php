<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * QualificationTypes Model
 *
 * @method \App\Model\Entity\QualificationType newEmptyEntity()
 * @method \App\Model\Entity\QualificationType newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\QualificationType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\QualificationType get($primaryKey, $options = [])
 * @method \App\Model\Entity\QualificationType findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\QualificationType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\QualificationType[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\QualificationType|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\QualificationType saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\QualificationType[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\QualificationType[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\QualificationType[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\QualificationType[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class QualificationTypesTable extends AppTable
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

        $this->setTable('qualification_types');
        $this->setDisplayField('qualification_type_id');
        $this->setPrimaryKey('qualification_type_id');
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
            ->nonNegativeInteger('qualification_type_id')
            ->allowEmptyString('qualification_type_id', null, 'create');

        $validator
            ->scalar('quanlification_type_name')
            ->maxLength('quanlification_type_name', 32)
            ->allowEmptyString('quanlification_type_name');

        return $validator;
    }
}
