<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Specialisations Model
 *
 * @method \App\Model\Entity\Specialisation newEmptyEntity()
 * @method \App\Model\Entity\Specialisation newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Specialisation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Specialisation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Specialisation findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Specialisation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Specialisation[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Specialisation|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Specialisation saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Specialisation[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Specialisation[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Specialisation[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Specialisation[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class SpecialisationsTable extends AppTable
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

        $this->setTable('specialisations');
        $this->setDisplayField('specialisation_id');
        $this->setPrimaryKey('specialisation_id');
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
            ->nonNegativeInteger('specialisation_id')
            ->allowEmptyString('specialisation_id', null, 'create');

        $validator
            ->scalar('specialisation_name')
            ->maxLength('specialisation_name', 32)
            ->allowEmptyString('specialisation_name');

        return $validator;
    }

    public function getAllTypes()
    {
      $sql = "
          SELECT *
          FROM specialisations
          order by specialisation_id asc
        ";
      return $this->_db->execute($sql, [])->fetchAll('assoc');

    }
}
