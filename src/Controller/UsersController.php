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
      $this->Authentication->addUnauthenticatedActions(['login', 'register', 'verifyOtp', 'registerForm', 'signOut']);

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
          } else {
            //tutor

            $this->Flash->success("G'day");
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


    public function signOut()
    {

    }
}
