<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Core\Configure;

use Cake\Log\Log;
use Cake\ORM\TableRegistry;

use Cake\Event\EventInterface;
use Cake\Mailer\MailerAwareTrait;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    use MailerAwareTrait;
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
      parent::beforeFilter($event);
      // Configure the login action to not require authentication, preventing
      // the infinite redirect loop issue
      $this->Authentication->addUnauthenticatedActions(['login', 'search', 'register', 'verifyOtp', 'registerForm', 'logout', 'profile']);

      // $this->Users = TableRegistry::getTableLocator()->get('Users', ['table' => 'users']);
    }

    public function login()
    {
      $this->request->allowMethod(['get', 'post']);
      if ($this->request->is('POST')):
        $result = $this->Authentication->getResult();

        if ($result->isValid()) {
          if (!$this->Authentication->getIdentity()['is_tutor']) {
            //tutee
            $this->Flash->success("G'day");
            return $this->redirect('/search');
          } else {
            //tutor
            $this->Flash->success("G'day");
            return $this->redirect('/search');
          }
        } else {
          $this->Flash->error(__('Invalid Email or Password'));
        }
      endif;

      $pageTitle = "uTute | Login";

      $menuItem = 'login';
      $this->set(compact(['menuItem', 'pageTitle']));
      $this->viewBuilder()->setLayout('login');
    }

    public function register()
    {
        if ($this->request->is('POST')):
          try {

            $post = $this->request->getData();

            if (empty($post['email']))
              throw new \Exception("Email Address must not be empty");

            if (strpos($post['email'], '@') === false  // contains '@'
              || strpos($post['email'], '@') === 0  //contains '@' in middle
              || strpos($post['email'], '@') !== strrpos($post['email'], '@')  //only contains one '@'
              || strpos($post['email'], '@') > strrpos($post['email'], '.')  // last '.' after '@'
              )
              throw new \Exception("Email Address must be valid");

            if (empty($post['password']))
              $post['password'] = (rand()%10) . (rand()%10) . (rand()%10) . (rand()%10) . (rand()%10) . (rand()%10) ;

            $existingUser = $this->Users->getExistingUserByEmail($post['email']);
            if (!empty($existingUser) &&!empty($existingUser['is_email_verified']))
              throw new \Exception("Email has been registered with us before.");
            elseif (!empty($existingUser))
            {
                //new user but not completed the registration
                //update the OTP in password field
                $this->Users->updateUser(['password' => $post['password'], 'user_id' => $existingUser['user_id']]);
            } else {
              //create new account
              $existingUser = ['email' => $post['email'],
                          'password' => $post['password'],
                          'first_name' => '',
                          'last_name' => '',
                          'is_tutor' => '0',
                          'is_email_verified' => '0',
                          'email_verified_time' => date("Y-m-d H:i:s"),
                          'created_time' => date("Y-m-d H:i:s"),
                          ];
              if (!$this->Users->createNewUser($existingUser))
              {
                throw new \Exception("Service unavailable at the moment, please try later.");
              }

            }

            $this->getMailer('User')->send('otp', [$post]);
            // $this->Flash->success("Please check your inbox to find the verification code");
            //email + # + random 6 digits
            return $this->redirect('/verify-otp/'.base64_encode($existingUser['email']
              .'#'.(rand()%10) . (rand()%10) . (rand()%10) . (rand()%10) . (rand()%10) . (rand()%10)));

          } catch (\Exception $e) {
            $this->Flash->set($e->getMessage(), ['element' => 'error']);
          }

        endif;

        $menuItem = 'register';
        $pageTitle = 'uTute | Register';
        $this->set(compact(['menuItem', 'pageTitle']));
        $this->viewBuilder()->setLayout('login');
    }

    public function verifyOtp($code = '')
    {
        $str = base64_decode($code);
        list($email, ) = explode("#", $str, 2);

        if ($this->request->is("POST")):
          try {
            $post = $this->request->getData();

            $post['code']= implode($post['code']);

            if (empty($post['code']) || strlen($post['code']) !== 6)
              throw new \Exception("Verify must be 6 digits");

            if ( $this->Users->existingEmailAndOTP($email, $post['code']) )
            {
              $this->Flash->success("Please fill in the form to finalise the registration");
              //email + # + random 6 digits
              return $this->redirect('/register-form/'.base64_encode($email.'#'.$post['code']));
            } else {
              $this->Flash->error("Verification Code not found, please try again");
              // return $this->redirect('/register');
            }

          } catch (\Exception $e)
          {
            $this->Flash->error($e->getMessage());
          }
        endif;

        $menuItem = 'register';
        $pageTitle = 'uTute | Verify OTP';
        $this->set(compact(['menuItem', 'pageTitle', 'email']));
        $this->viewBuilder()->setLayout('login');
    }

    //filling details for new registration
    public function registerForm($code = '')
    {
      $str = base64_decode($code);
      if (empty($code))
      {
        $this->Flash->error(__('Invalid URL, please fill in the form first'));
        return $this->redirect("/register");
      }

      list($email, $password) = explode("#", $str, 2);

      if ($this->request->is("POST")):
        try {
          $post = $this->request->getData();

          if (empty($post['full_name']))
            throw new \Exception("Full Name must not be empty");
          if (empty($post['password']))
            throw new \Exception("Password must not be empty");

          if (strlen($post['password']) < 6
            || !preg_match('/[a-z]/', $post['password'])
            || !preg_match('/[A-Z]/', $post['password'])
            || !preg_match('/[0-9]/', $post['password'])
            || !preg_match('/[^a-z0-9A-Z]/', $post['password'])
            )
            throw new \Exception("Password must meet its requirements");

          $post['mobile'] = str_replace(['+', '-'], '', filter_var($post['mobile'], FILTER_SANITIZE_NUMBER_INT));
          if (strlen($post['mobile']) != 10)
          {
            throw new \Exception("Mobile must meet its requirements");
          }

          if (empty($post['confirm_password']))
            throw new \Exception("Please confirm Password");
          if ($post['password'] !== $post['confirm_password'])
            throw new \Exception("Password and Confirm Password must be same.");

          if (!$this->Users->existingEmailAndOTP($email, $password))
          {
            $this->Flash->error("Email not found, please fill in the form below");
            // return $this->redirect('/register');
          }

          //update the profile with name, password, mobile
          $user = $this->Users->getExistingUserByEmail($email);

          if (empty($user))
          {
            $this->Flash->error("Email not found, please fill in the form below");
            return $this->redirect('/register');
          }

          $post['email'] = $email;
          $post['password'] = $post['password'];
          $post['is_email_verified'] = '1';
          $post['first_name'] = $post['last_name'] = '';
          list($post['first_name'], $post['last_name']) = explode(' ', $post['full_name'], 2);

          unset($post['full_name'], $post['confirm_password']);

          if ($this->Users->updateUser($post, $user['user_id']))
          {
            $this->Flash->success("Account created successfully. Please login now");
            return $this->redirect('/login');
          } else {
            $this->Flash->error('Service unavailable at the moment, please try later');
          }
        } catch (\Exception $e)
        {
          $this->Flash->error($e->getMessage());
        }

      endif;

      $menuItem = 'register';
      $pageTitle = 'uTute | Register Form';
      $this->set(compact(['menuItem', 'pageTitle']));
      $this->viewBuilder()->setLayout('login');
    }


    public function logout()
    {
      $result = $this->Authentication->getResult();
      // regardless of POST or GET, redirect if user is logged in
      if ($result->isValid()) {
          $this->Authentication->logout();
          $this->Flash->error('You have logged out');
      }
      return $this->redirect('/login');
    }

    public function search()
    {
      $userId = $this->Authentication->getIdentity()['user_id'];
      $user = $this->Users->getUserById($userId);
      $this->Uni = TableRegistry::getTableLocator()->get('Universities', ['table' => 'universities']);
      $universityList = $this->Uni->getAllUniversities();

      $this->Tutors = TableRegistry::getTableLocator()->get('Tutors', ['table' => 'tutors']);
      $tutors = $this->Tutors->findAllTutors();


      $menuItem = 'search';
      $pageTitle = 'uTute | Tutor Search';
      $this->set(compact(['menuItem', 'pageTitle', 'user', 'universityList', 'tutors']));

      $this->viewBuilder()->setLayout(!empty($user) ? 'user':'default');
    }

    public function profile($tutorIdCode=null)
    {
      if (empty($tutorIdCode)) return $this->redirect('/');

      $userId = $this->Authentication->getIdentity()['user_id'];
      $user = empty($userId) ? null : $this->Users->getUserById($userId);
      $tutorId = base64_decode($tutorIdCode);
      if (empty($tutorId) || !is_numeric($tutorId))
      {
        return $this->redirect('/');
      }
      $this->Tutors = TableRegistry::getTableLocator()->get('Tutors', ['table' => 'tutors']);
      $tutor = $this->Tutors->getProfile($tutorId);

      $menuItem = 'profile';
      $pageTitle = 'uTute | Tutor Profile';
      $this->set(compact(['menuItem', 'pageTitle','tutor', 'user']));


      $this->viewBuilder()->setLayout(!empty($user) ? 'user':'default');

    }

    public function booking($tutorIdCode=null)
    {
      //must be logged in first
      if (empty($tutorIdCode)) return $this->redirect('/search');


      $this->Times = TableRegistry::getTableLocator()->get('Times', ['table' => 'times']);
      $slots = $this->Times->getAll();

      $userId = $this->Authentication->getIdentity()['user_id'];
      $user = empty($userId) ? null : $this->Users->getUserById($userId);
      $tutorId = base64_decode($tutorIdCode);

      if (empty($tutorId) || !is_numeric($tutorId))
      {
        return $this->redirect('/');
      }

      $this->TutorTeachings = TableRegistry::getTableLocator()->get('TutorTeachings', ['table' => 'tutor_teachings']);
      $tutorTeachings = $this->TutorTeachings->findTeachingsByTutorId($tutorId);
      if (empty($tutorTeachings))
      {
        $this->Flash->error("This tutor is fully booked at the moment");
        return $this->redirect('/profile/'.$tutorIdCode);
      }

      if ($this->request->is("POST")):
        try{
          $post = $this->request->getData();
          $errors = [];

          //validate the post data
          if (empty($post['hours']) || !is_numeric($post['hours']) || intval($post['hours']) > 5)
            throw new \Exception("Session must be between 1 - 5 hours");
          if (empty($post['date']))
            throw new \Exception("Please select a date");
          elseif (strtotime($post['date'].' 23:59:59') < time())
            throw new \Exception("Date must not be in the past");
          if (empty($post['start_time']))
            throw new \Exception("Please select a time");
          if (empty($post['content']))
            throw new \Exception("Please enter a note");
          if (empty($post['tutor_teaching_id']))
            throw new \Exception("Please enter an unit");


          //create new into messages table

          $this->Tutors = TableRegistry::getTableLocator()->get('Tutors', ['table' => 'tutors']);
          $this->Messages = TableRegistry::getTableLocator()->get('Messages', ['table' => 'messages']);
          $tutorUser = $this->Tutors->getTutorUserBasicProfile($tutorId);
          $message = [];
          $message['from_user_id'] = $userId;
          $message['to_user_id'] = $tutorUser['tutor_id'];
          $message['message_content'] = "Session Request:". $post['content'];
          $message['is_new'] = true;
          $this->Messages->createNew($message);

          //add new appointment
          $this->Appointments = TableRegistry::getTableLocator()->get('Appointments', ['table' => 'appointments']);
          $appt = [];
          $appt['user_id'] = $userId;
          $appt['tutor_id'] = $tutorId;
          $appt['appt_start_time'] = $post['date'].' '. str_pad(strval(intval($post['start_time'])), 2, '0', STR_PAD_LEFT).':00:00';
          $appt['appt_end_time'] = $post['date'].' '. str_pad(strval(intval($post['start_time']) + intval($post['hours'])), 2, '0', STR_PAD_LEFT).':00:00';
          $appt['tutor_teaching_id'] = $post['tutor_teaching_id'];
          $appt['status'] = 'Requested';
          $unit = [];
          foreach ($tutorTeachings as $r):
            if ($r['tutor_teaching_id'] == $post['tutor_teaching_id'])
            {
              $appt['fees'] = $r['fees'];
              $unit = $r;
              break;
            }
          endforeach;
          $appt['created_time'] = date('Y-m-d H:i:s');
          $appt['appointment_id']  = $this->Appointments->createNew($appt);

          $message['is_new'] = true;
          $this->Messages->createNew($message);

          //send request email to the tutor
          $this->getMailer('User')->send('booking', [$appt, $user, $tutorUser, $unit, $post['content']]);


          $this->Flash->success("Appointment request sent successfully");
          return $this->redirect("/profile/".$tutorIdCode);
        } catch(\Exception $e)
        {
          $this->Flash->error($e->getMessage());
        }
      endif;

      $menuItem = 'Book Appointment';
      $pageTitle = 'uTute | Book Appointment';
      $this->set(compact(['menuItem', 'pageTitle','tutor', 'user', 'slots', 'tutorIdCode', 'tutorTeachings']));
      $this->viewBuilder()->setLayout('user');

    }

    public function upgrade()
    {

        $userId = $this->Authentication->getIdentity()['user_id'];
        $user = $this->Users->getUserById($userId);

        $this->Uni = TableRegistry::getTableLocator()->get('Universities', ['table' => 'universities']);
        $this->Tutors = TableRegistry::getTableLocator()->get('Tutors', ['table' => 'tutors']);
        $this->QualTypes = TableRegistry::getTableLocator()->get('QualificationTypes', ['table' => 'qualification_types']);
        $this->Specialisations= TableRegistry::getTableLocator()->get('Specialisations', ['table' => 'specialisations']);
        $this->Hobbies= TableRegistry::getTableLocator()->get('Hobbies', ['table' => 'hobbies']);

        if (!empty($user['is_tutor']))
        {
          $this->Flash->success("You have upgraded to be tutor already");
          return $this->redirect("/search");
        }
        if ($this->request->is("POST")):
          try{
            $post = $this->request->getData('data');
            $errors = [];
            if (empty($post['q'][0]['qualification_type_id'])
              || empty($post['q'][0]['university_id'])
              || empty($post['q'][0]['complete_year'])
              || empty($post['q'][0]['gpa']))
            {
              $errors[] = "Qualification must not be empty (at least one)";
            }

            if (empty($post['u'][0]['unit_code'])
              || empty($post['u'][0]['unit_name']))
            {
              $errors[] = "Unit must not be empty (at least one)";
            }

            if (empty($post['s'][0]['specialisation_id']))
            {
              $errors[] = "Specialisation must not be empty (at least one)";
            }

            if (empty($post['h'][0]['hobby_id']))
            {
              $errors[] = "Hobby must not be empty (at least one)";
            }

            if (empty($post['p']['profile_introduction']))
            {
              $errors[] = "Profile introduction must not be empty";
            } else if(strlen($post['p']['profile_introduction']) > 500){
                $errors[] = "Profile introduction must not be too long (500 characters)";
            }

            if (empty($post['p']['tutoring_strategies']))
            {
              $errors[] = "Tutoring Strategies must not be empty";
            } else if(strlen($post['p']['profile_introduction']) > 500){
                $errors[] = "Tutoring Strategies must not be too long (500 characters)";
            }

            if (!empty($errors))
            {
              throw new \Exception(implode("<br>", $errors));
            }

            if ($this->Tutors->isExistingTutorWithUserId($user['user_id']))
            {
              throw new \Exception("You have been a tutor before");
            }

            //create tutor record now
            $tutor = [];
            $tutor['user_id'] = $user['user_id'];
            $tutor['profile_image'] = "";
            $tutor['average_rating'] = 0.0;
            $tutor['profile_introduction'] = $post['p']['profile_introduction'];
            $tutor['tutoring_strategies'] = $post['p']['tutoring_strategies'];

            if (false == ($tutorId = $this->Tutors->createNew($tutor)))
            {
              throw new \Exception("Unable to create tutor profile temporarily");
            }

            $this->TutorHobbies =TableRegistry::getTableLocator()->get('TutorHobbies', ['table' => 'tutor_hobbies']);
            $this->TutorQualifications = TableRegistry::getTableLocator()->get('TutorQualifications', ['table' => 'tutor_qualifications']);
            $this->TutorSpecialisations = TableRegistry::getTableLocator()->get('TutorSpecialisations', ['table' => 'tutor_specialisations']);
            $this->TutorTeachings = TableRegistry::getTableLocator()->get('TutorTeachings', ['table' => 'tutor_teachings']);

            $ret1 = $this->TutorHobbies->createNewRows($post['h'], $tutorId);
            $ret2 = $this->TutorQualifications->createNewRows($post['q'], $tutorId);
            $ret3 = $this->TutorSpecialisations->createNewRows($post['s'], $tutorId);
            $ret4 = $this->TutorTeachings->createNewRows($post['u'], $tutorId);

            if (!$ret1 || !$ret2 || !$ret3 || !$ret4)
            {
              $this->Flash->error("Tutor profile created but something is missing");
            } else {
              $this->Flash->success("Welcome aboard");
            }

            //overwrite is_tutor in auth right now
            $this->Users->updateUser(['is_tutor' => '1'], $user['user_id']);
            $user['is_tutor'] = '1';
            $this->Session->write('Auth', $user);

            return $this->redirect("/profile");

          } catch (\Exception $e)
          {
            $this->Flash->error($e->getMessage());
          }
        endif;

        $universityList = $this->Uni->getAllUniversities();
        $qualificationTypeList = $this->QualTypes->getAllTypes();
        $specialisationList = $this->Specialisations->getAllTypes();
        $hobbyList = $this->Hobbies->getAllTypes();

        $menuItem = 'upgrade';
        $pageTitle = 'uTute | Be a Tutor';
        $this->set(compact(['menuItem', 'pageTitle', 'user',
                'qualificationTypeList','universityList', 'specialisationList',
                'hobbyList',
              ]));
        $this->viewBuilder()->setLayout('user');

    }

}
