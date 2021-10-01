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


    public function isExistingTutorWithUserId($userId)
    {
      $sql = "
        SELECT user_id
        FROM tutors
        WHERE user_id = ?
        ";
      $ret = $this->_db->execute($sql, [$userId])->fetch('assoc');
      return !empty($ret['user_id']) ? true:false;
    }

    public function createNew($row)
    {
      if (empty($row['created_time']))
      {
        $row['created_time'] = date("Y-m-d H:i:s");
      }


      $q = $this->_getInsertQuery('tutors', $row);
      $ret = $this->_db->execute($q['query'], $q['values']);

      return $ret->lastInsertId();
    }

    public function findAllTutors()
    {
      $ret = [];
      $sql = "SELECT t.tutor_id, t.profile_image, t.average_rating, t.profile_introduction, t.tutoring_strategies,
              u.email, u.first_name, u.last_name, u.mobile
              FROM tutors as t,
              users as u
              WHERE t.user_id = u.user_id
              AND u.is_tutor = '1'
              ORDER BY u.user_id ASC
              ";

      $tmp = $this->_db->execute($sql, [])->fetchAll('assoc');
      foreach ($tmp as $r)
      {
        $tutorId = $r['tutor_id'];
        $element = [];

        //get tutor teachings
        $sql = "SELECT count(rating_id) as ratings_in_total
                FROM ratings
                WHERE tutor_id = ?
                ";
        $tmp = $this->_db->execute($sql, [$tutorId])->fetch('assoc');
        $r['ratings'] = !empty($tmp['ratings_in_total']) ? $tmp['ratings_in_total']: 0;


        $element['Tutor'] = $r;

        //get tutor specialisations
        $sql = "SELECT a.*, b.specialisation_name
                FROM tutor_specialisations as a,
                specialisations as b
                WHERE a.tutor_id = ?
                AND a.specialisation_id = b.specialisation_id
                ";
        $element['TutorSpecialisations'] = $this->_db->execute($sql, [$tutorId])->fetchAll('assoc');

        //get tutor qualifications
        $sql = "SELECT a.*, b.qualification_type_name, c.university_name
                FROM tutor_qualifications as a,
                qualification_types as b,
                universities as c
                WHERE a.tutor_id = ?
                AND a.qualification_type_id = b.qualification_type_id
                AND a.university_id = c.university_id
                ";
        $element['TutorQualifications'] = $this->_db->execute($sql, [$tutorId])->fetchAll('assoc');

        //get tutor teachings
        $sql = "SELECT *
                FROM tutor_teachings
                WHERE tutor_id = ?
                ";
        $element['TutorTeachings'] = $this->_db->execute($sql, [$tutorId])->fetchAll('assoc');


        $ret[] = $element;
      }

      return $ret;
    }

    public function getProfile($tutorId)
    {
      $ret = [];
      $sql = "SELECT t.tutor_id, t.profile_image, t.average_rating, t.profile_introduction, t.tutoring_strategies,
              u.email, u.first_name, u.last_name, u.mobile
              FROM tutors as t,
              users as u
              WHERE t.user_id = u.user_id
              AND t.tutor_id = ?
              AND u.is_tutor = '1'
              ORDER BY u.user_id ASC
              ";

      $r = $this->_db->execute($sql, [$tutorId])->fetch('assoc');



      //get tutor teachings
      $sql = "SELECT count(rating_id) as cnt, stars
              FROM ratings
              WHERE tutor_id = ?
              GROUP BY stars";
      $tmp = $this->_db->execute($sql, [$tutorId])->fetchAll('assoc');
      $r['ratings'] = 0;
      $r['1_star'] = 0;
      $r['2_star'] = 0;
      $r['3_star'] = 0;
      $r['4_star'] = 0;
      $r['5_star'] = 0;
      foreach ($tmp as $tR)
      {
        if ($tR['stars'] <=1)
           $r['1_star'] += $tR['cnt'];
        elseif ($tR['stars'] <=2)
           $r['2_star'] += $tR['cnt'];
         elseif ($tR['stars'] <=3)
           $r['3_star'] += $tR['cnt'];
         elseif ($tR['stars'] <=4)
           $r['4_star'] += $tR['cnt'];
         else
           $r['5_star'] += $tR['cnt'];
         $r['ratings'] += $tR['cnt'];
      }

      $sql = "SELECT a.first_name, a.last_name, b.stars, b.review_content, b.created_time
              FROM ratings b
              LEFT JOIN users a
              ON a.user_id = b.user_id
              WHERE b.tutor_id = ?
              ORDER by b.created_time desc
              LIMIT 5";
      $r['reviews'] = $this->_db->execute($sql, [$tutorId])->fetchAll('assoc');

      $ret['Tutor'] = $r;

      //get tutor specialisations
      $sql = "SELECT a.*, b.hobby_name
              FROM tutor_hobbies as a,
              hobbies as b
              WHERE a.tutor_id = ?
              AND a.hobby_id = b.hobby_id
              ";
      $ret['TutorHobbies'] = $this->_db->execute($sql, [$tutorId])->fetchAll('assoc');

      //get tutor specialisations
      $sql = "SELECT a.*, b.specialisation_name
              FROM tutor_specialisations as a,
              specialisations as b
              WHERE a.tutor_id = ?
              AND a.specialisation_id = b.specialisation_id
              ";
      $ret['TutorSpecialisations'] = $this->_db->execute($sql, [$tutorId])->fetchAll('assoc');

      //get tutor qualifications
      $sql = "SELECT a.*, b.qualification_type_name, c.university_name
              FROM tutor_qualifications as a,
              qualification_types as b,
              universities as c
              WHERE a.tutor_id = ?
              AND a.qualification_type_id = b.qualification_type_id
              AND a.university_id = c.university_id
              ";
      $ret['TutorQualifications'] = $this->_db->execute($sql, [$tutorId])->fetchAll('assoc');

      //get tutor teachings
      $sql = "SELECT *
              FROM tutor_teachings
              WHERE tutor_id = ?
              ";
      $ret['TutorTeachings'] = $this->_db->execute($sql, [$tutorId])->fetchAll('assoc');

      return $ret;
    }

    public function getUserIdByTutorId($tutorId)
    {

        $sql = "
          SELECT user_id
          FROM tutors
          WHERE tutor_id = ?
          ";
        $ret = $this->_db->execute($sql, [$tutorId])->fetch('assoc');
        return !empty($ret['user_id']) ? $ret['user_id']: false;
    }

    public function getTutorUserBasicProfile($tutorId)
    {
      $sql = "SELECT t.tutor_id, t.profile_image, t.average_rating, t.profile_introduction, t.tutoring_strategies,
              u.email, u.user_id, u.first_name, u.last_name, u.mobile, u.email
              FROM tutors as t,
              users as u
              WHERE t.user_id = u.user_id
              AND t.tutor_id = ?
              AND u.is_tutor = '1'
              ORDER BY u.user_id ASC
              ";
        return $this->_db->execute($sql, [$tutorId])->fetch('assoc');
    }


}
