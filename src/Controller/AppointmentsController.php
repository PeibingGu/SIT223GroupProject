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
class AppointmentsController extends AppController
{

    use MailerAwareTrait;
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
      parent::beforeFilter($event);
      // Configure the login action to not require authentication, preventing
      // the infinite redirect loop issue
      $this->Authentication->addUnauthenticatedActions(['accept', 'decline']);

      $this->Users = TableRegistry::getTableLocator()->get('Users', ['table' => 'users']);
      $this->Appointments = TableRegistry::getTableLocator()->get('Appointments', ['table' => 'appointments']);
      $this->Messages = TableRegistry::getTableLocator()->get('Messages', ['table' => 'messages']);
    }

    public function accept($apptIdCode)
    {
        $userId = $this->Authentication->getIdentity()['user_id'];
        $user = $this->Users->getUserById($userId);

        $errors = [];
        try {
          if (empty($apptIdCode))
            $errors[] = "Invalid Url";
          $apptId = base64_decode($apptIdCode);

          $appt = $this->Appointments->getAppointmentRow($apptId);
          if (empty($appt))
            $errors[] = "Invalid URL";
          if ($appt['status'] != 'Requested')
            $errors[] = "Appointment status has been updated before";
          if (!empty($errors))
            throw new \Exception('');  //stop here

          if (!$this->Appointments->acceptAppt($apptId))
          {
            $errors[] = "Could not accept this request at the moment. please try later";
          }
          if (!empty($errors))
            throw new \Exception('');  //stop here

          //add message for this appt
          $message = [];
          $message['from_user_id'] = $appt['Tutor']['tutor_id'];
          $message['to_user_id'] = $appt['user_id'];
          $message['message_content'] = "Appointment Request Accepted:". $appt['Tutor']['first_name'].' '. $appt['Tutor']['last_name'].'  has accepted your appointment request.';
          $message['is_new'] = true;
          $this->Messages->createNew($message);

          //send email to the student
          $this->getMailer('User')->send('booking_response', [$appt, '1']);

        } catch (\Exception $e)
        {

        }
        $pageTitle = "uTute | Appointments";

        $menuItem = 'appointments';
        $this->set(compact(['menuItem', 'pageTitle', 'user', 'errors']));

        $this->viewBuilder()->setLayout(!empty($user) ? 'user':'default');
    }

    public function decline($apptIdCode)
    {
        $userId = $this->Authentication->getIdentity()['user_id'];
        $user = $this->Users->getUserById($userId);

        $errors = [];
        try {
          if (empty($apptIdCode))
            $errors[] = "Invalid Url";
          $apptId = base64_decode($apptIdCode);

          $appt = $this->Appointments->getAppointmentRow($apptId);
          if (empty($appt))
            $errors[] = "Invalid URL";
          if ($appt['status'] != 'Requested')
            $errors[] = "Appointment status has been updated before";
          if (!empty($errors))
            throw new \Exception('');  //stop here

          if (!$this->Appointments->declineAppt($apptId))
          {
            $errors[] = "Could not accept this request at the moment. please try later";
          }
          if (!empty($errors))
            throw new \Exception('');  //stop here

          //add message for this appt
          $message = [];
          $message['from_user_id'] = $appt['Tutor']['tutor_id'];
          $message['to_user_id'] = $appt['user_id'];
          $message['message_content'] = "Appointment Request Declined:". $appt['Tutor']['first_name'].' '. $appt['Tutor']['last_name'].'  has accepted your appointment request.';
          $message['is_new'] = true;
          $this->Messages->createNew($message);

          //send email to the student
          $this->getMailer('User')->send('booking_response', [$appt, '0']);

        } catch (\Exception $e)
        {

        }
        $pageTitle = "uTute | Appointments";

        $menuItem = 'appointments';
        $this->set(compact(['menuItem', 'pageTitle', 'user', 'errors']));

        $this->viewBuilder()->setLayout(!empty($user) ? 'user':'default');
    }

    public function list()
    {
      $userId = $this->Authentication->getIdentity()['user_id'];
      $user = $this->Users->getUserById($userId);

      $tutorId = null;
      if (!empty($user['is_tutor']))
        $tutorId = $this->Tutors->getTutorIdByUserId($userId);

      $appts = $this->Appointments->getUserAppointments($userId);

      $pageTitle = "uTute | Appointments";

      $menuItem = 'appointments';
      $this->set(compact(['menuItem', 'pageTitle', 'user', 'appts']));

      $this->viewBuilder()->setLayout(!empty($user) ? 'user':'default');
    }

    public function rating($apptIdCode = null)
    {
        $userId = $this->Authentication->getIdentity()['user_id'];
        $user = $this->Users->getUserById($userId);

        $this->Ratings = TableRegistry::getTableLocator()->get('Ratings', ['table' => 'ratings']);
        $errors = [];
        try {
          if (empty($apptIdCode))
            $errors[] = "Invalid Url";
          $apptId = base64_decode($apptIdCode);

          $appt = $this->Appointments->getAppointmentRow($apptId);
          if (empty($appt))
            $errors[] = "Invalid URL";
          if ($appt['status'] != 'Completed')
            $errors[] = "Appointment must be marked as Completed by the tutor first";
          if (!empty($errors))
            throw new \Exception('');  //stop here

          if ($this->Ratings->getApptRating($apptId))
          {
            $errors[] = "Review&Rating has be completed.";
          }
          if (!empty($errors))
            throw new \Exception('');  //stop here

          //add message for this appt
          if ($this->request->is("POST")):
            $post = $this->request->getData();

            if (empty($post['stars']))
            {
              $errors[] = "Please answer the second question";
              $this->Flash->error("Please answer the first question");
            }
            if (empty($post['review_content']))
            {
              $errors[] = "Please answer the second question";
              $this->Flash->error("Please answer the second question");
            }elseif (strlen($post['review_content']) > 255)
            {
              $errors[] = "The answer to second question is too long";
              $this->Flash->error("The answer to second question is too long");
            }
            if (!empty($errors))
              throw new \Exception('');  //stop here

            $rating = [];
            $rating['appointment_id'] = $apptId;
            $rating['user_id'] = $appt['user_id'];
            $rating['tutor_id'] = $appt['tutor_id'];
            $rating['stars'] = $post['stars'];
            $rating['review_content'] = $post['review_content'];

            if (!$this->Ratings->createNew($rating))
            {
              $errors[] = "Could not create a rating & review at the moment";
              $this->Flash->error("Could not create a rating & review at the moment");
            }

            if (!empty($errors))
              throw new \Exception('');  //stop here

            //send email to the student
            $this->getMailer('User')->send('rated', [$appt]);
            

          endif;


        } catch (\Exception $e)
        {

        }
        $pageTitle = "uTute | Appointments";

        $menuItem = 'appointments';
        $this->set(compact(['menuItem', 'pageTitle', 'user', 'errors', 'apptIdCode']));

        $this->viewBuilder()->setLayout(!empty($user) ? 'user':'default');
    }
}
