<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Hobbies Model
 *
 * @method \App\Model\Entity\Hobby newEmptyEntity()
 * @method \App\Model\Entity\Hobby newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Hobby[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Hobby get($primaryKey, $options = [])
 * @method \App\Model\Entity\Hobby findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Hobby patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Hobby[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Hobby|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Hobby saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Hobby[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Hobby[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Hobby[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Hobby[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class HobbiesTable extends AppTable
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

        $this->setTable('hobbies');
        $this->setDisplayField('Hobby_id');
        $this->setPrimaryKey('Hobby_id');
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
            ->nonNegativeInteger('Hobby_id')
            ->allowEmptyString('Hobby_id', null, 'create');

        $validator
            ->scalar('hobby_name')
            ->maxLength('hobby_name', 16)
            ->notEmptyString('hobby_name');

        return $validator;
    }

    public function getAllTypes()
    {
      $sql = "
          SELECT *
          FROM hobbies
          order by hobby_id asc
        ";
      return $this->_db->execute($sql, [])->fetchAll('assoc');

    }


}
