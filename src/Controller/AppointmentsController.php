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

}
