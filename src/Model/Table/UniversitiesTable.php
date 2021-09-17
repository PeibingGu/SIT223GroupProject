<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Universities Model
 *
 * @method \App\Model\Entity\University newEmptyEntity()
 * @method \App\Model\Entity\University newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\University[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\University get($primaryKey, $options = [])
 * @method \App\Model\Entity\University findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\University patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\University[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\University|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\University saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\University[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\University[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\University[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\University[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class UniversitiesTable extends AppTable
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

        $this->setTable('universities');
        $this->setDisplayField('university_id');
        $this->setPrimaryKey('university_id');
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
            ->nonNegativeInteger('university_id')
            ->allowEmptyString('university_id', null, 'create');

        $validator
            ->scalar('university_name')
            ->maxLength('university_name', 128)
            ->allowEmptyString('university_name');

        return $validator;
    }

    public function getAllUniversities()
    {
      $sql = "
          SELECT *
          FROM universities
          order by university_name asc
        ";
      return $this->_db->execute($sql, [])->fetchAll('assoc');

    }
}
