<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Times Model
 *
 * @method \App\Model\Entity\Time newEmptyEntity()
 * @method \App\Model\Entity\Time newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Time[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Time get($primaryKey, $options = [])
 * @method \App\Model\Entity\Time findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Time patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Time[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Time|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Time saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Time[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Time[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Time[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Time[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TimesTable extends AppTable
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

        $this->setTable('times');
        $this->setDisplayField('time_id');
        $this->setPrimaryKey('time_id');
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
            ->nonNegativeInteger('time_id')
            ->allowEmptyString('time_id', null, 'create');

        $validator
            ->scalar('time_start')
            ->maxLength('time_start', 4)
            ->allowEmptyString('time_start');

        $validator
            ->scalar('time_end')
            ->maxLength('time_end', 4)
            ->allowEmptyString('time_end');

        $validator
            ->integer('time_in_mintues')
            ->allowEmptyString('time_in_mintues');

        return $validator;
    }

    public function getAll()
    {

        $sql = "
            SELECT *
            FROM times
            order by time_id asc
          ";
        return $this->_db->execute($sql, [])->fetchAll('assoc');
    }
}
