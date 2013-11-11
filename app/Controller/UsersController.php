<?php
/**
 * Created by JetBrains PhpStorm.
 * User: webonise
 * Date: 7/11/13
 * Time: 11:46 AM
 * To change this template use File | Settings | File Templates.
 */
    App::uses('AuthComponent', 'Controller/Component');
    App::uses('String', 'Utility');

class UsersController extends AppController
{



    public function beforeFilter() {
        parent::beforeFilter();

    }

    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
              $users=$this->Session->read('Auth.User');
                switch($users['Role']['role'])
                {
                    case 'hospital_admin':
                    {

                        $this->redirect(array('controller' => 'hospitals', 'action' => 'myaccount'));
                        break;
                    }
                    case 'superadmin':
                    {

                        $this->redirect(array('controller' => 'hospitals', 'action' => 'index'));
                        break;
                    }
                    case 'doctor':
                    {

                        $this->redirect(array('controller' => 'doctors', 'action' => 'myaccount'));
                        break;
                    }
                    case 'patient':
                    {

                        $this->redirect(array('controller' => 'patients','action' => 'myaccount'));
                        break;
                    }

                }

                return $this->redirect(array('controller' => 'hospitals', 'action' => 'index'));
            }
            $this->Session->setFlash(__('Invalid username or password, try again'));
        } else {
           if($this->Session->read('Auth.User') != ''){
               $this->redirect($this->Auth->redirect());
           }
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }


}