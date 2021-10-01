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
class MessagesController extends AppController
{

    use MailerAwareTrait;
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
      parent::beforeFilter($event);
      // Configure the login action to not require authentication, preventing
      // the infinite redirect loop issue
      $this->Authentication->addUnauthenticatedActions([]);

      $this->Users = TableRegistry::getTableLocator()->get('Users', ['table' => 'users']);
    }

    public function list()
    {

        $userId = $this->Authentication->getIdentity()['user_id'];
        $user = $this->Users->getUserById($userId);

        $this->request->allowMethod(['get', 'post']);
        if ($this->request->is('POST')):


        endif;

        $pageTitle = "uTute | Messages";

        $menuItem = 'messages';
        $this->set(compact(['menuItem', 'pageTitle', 'user']));
        $this->viewBuilder()->setLayout('user');
    }

}
