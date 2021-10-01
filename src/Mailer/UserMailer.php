<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;
use Cake\Core\Configure;

class UserMailer extends Mailer
{
    public function welcome($user)
    {
        $this
            ->setEmailFormat('html')
            ->setTo($user['email'])
            ->setSubject('Welcome to '. Configure::read('Domain.name') . (!empty($user['first_name'])? ', '.$user['first_name'] : '') )
            ->setViewVars(['user' => $user])
            ->viewBuilder()
                ->setTemplate('welcome'); // By default template with same name as method name is used.
    }
    public function otp($user)
    {
        $this
            ->setEmailFormat('html')
            ->setTo($user['email'])
            ->setSubject('OTP on '. Configure::read('Domain.name'))
            ->setViewVars(['user' => $user])
            ->viewBuilder()
              ->setTemplate('otp');
    }
    public function booking($appt, $user, $tutorUser, $unit, $content)
    {
        $this
            ->setEmailFormat('html')
            ->setTo($tutorUser['email'])
            ->setSubject('Appointment Request Received on '. Configure::read('Domain.name'))
            ->setViewVars(['user' => $user, 'appt' => $appt, 'tutorUser'=> $tutorUser, 'unit' => $unit, 'content' => $content])
            ->viewBuilder()
              ->setTemplate('booking');
    }
    public function booking_response($appt, $acceptedOrDeclined = '1')
    {
        $this
            ->setEmailFormat('html')
            ->setTo($appt['student_email'])
            ->setSubject('Appointment Request '. (!empty($acceptedOrDeclined) ? 'Accepted':'Declined').' on '. Configure::read('Domain.name'))
            ->setViewVars(['appt' => $appt, 'flag' => $acceptedOrDeclined])
            ->viewBuilder()
              ->setTemplate('booking_response');
    }




    // public function resetPassword($user)
    // {
    //     $this
    //         ->setEmailFormat('html')
    //         ->setTo($user['email'])
    //         ->setSubject('Reset password on '. Configure::read('Domain.name'))
    //         ->setViewVars(['user' => $user])
    //         ->viewBuilder()
    //           ->setTemplate('reset_password');
    // }
    //
    // public function apptRequest($teacher)
    // {
    //     $this
    //         ->setEmailFormat('html')
    //         ->setTo($teacher['email'])
    //         ->setSubject('Appointment request on '. Configure::read('Domain.name'))
    //         ->setViewVars(['teacher' => $teacher])
    //         ->viewBuilder()
    //           ->setTemplate('appt_request');
    // }
    //
    // public function newMessage($user)
    // {
    //     $this
    //         ->setEmailFormat('html')
    //         ->setTo($user['email'])
    //         ->setSubject('New Message on '. Configure::read('Domain.name'))
    //         ->setViewVars(['user' => $user])
    //         ->viewBuilder()
    //           ->setTemplate('new_message');
    // }
    //
    // //send email to
    // public function topicWished($user, $topic)
    // {
    //     $this
    //         ->setEmailFormat('html')
    //         ->setTo($topic['teacher_email'])
    //         ->setSubject('A student expressed interest in your topic on '. Configure::read('Domain.name'))
    //         ->setViewVars(['user' => $user, 'topic' => $topic])
    //         ->viewBuilder()
    //           ->setTemplate('topic_wished');
    // }
    //
    // //send email to topic's owner user
    // public function topicAdded($user, $topic)
    // {
    //     $this
    //       ->setEmailFormat('html')
    //       ->setTo($topic['teacher_email'])
    //       ->setSubject('A student added one of your '.(empty($topic['price']) || $topic['price']=='0.00' ? 'free': (!empty($row['currency']) ? $row['currency'].' '.$topic['price'] : $topic['price']) ).' topics on '. Configure::read('Domain.name'))
    //       ->setViewVars(['user' => $user, 'topic' => $topic])
    //       ->viewBuilder()
    //         ->setTemplate('topic_added');
    //
    // }
    //
    // public function newStudentAccount($user)
    // {
    //     $this
    //         ->setEmailFormat('html')
    //         ->setTo($user['email'])
    //         ->setSubject('You are invited to '. Configure::read('Domain.name'))
    //         ->setViewVars(['user' => $user])
    //         ->viewBuilder()
    //           ->setTemplate('new_student_account');
    // }
}
