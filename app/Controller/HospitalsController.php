<?php
/**
 * Created by JetBrains PhpStorm.
 * User: webonise
 * Date: 31/10/13
 * Time: 11:14 AM
 * To change this template use File | Settings | File Templates.
 */
App::uses('AuthComponent', 'Controller/Component');
App::uses('String', 'Utility');

class HospitalsController extends AppController
{

    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');


    public function index()
    {   $users = $this->Session->read('Auth.User');

       /* if ($users['Role']['role'] != 'superadmin') {

            $this->redirect(array('controller' => 'users', 'action' => 'login'));
        }*/

         $this->set('hospitals', $this->Hospital->find('all'));


    }

    public function hospitalinfo($id = null)
    {
        $users = $this->Session->read('Auth.User');
        if ($users['Role']['role'] == 'superadmin') {
            $this->set('hospitals', $this->Hospital->find('all'));
        } else {
            $this->Session->setFlash(__('You are not authorised to access Hospital information.'));
            $this->redirect(array('controller' => 'hospitals', 'action' => 'index'));


        }
    }
    public function myaccount()
    {   $users = $this->Session->read('Auth.User');
        if ($users['Role']['role'] == 'hospital_admin') {
            $this->set('users',$users);
            $hospitalList=$this->Hospital->find('all');
            $this->set('hospitalList',$hospitalList);
        }
        else
        {
            $this->Session->setFlash(__('You are not authorised to access Hospital account.'));
            $this->redirect(array('controller' => 'hospitals', 'action' => 'index'));


        }

    }


    public function add()
    {
        if ($this->request->is('post')) {
            $this->request->data['Hospital']['password'] = AuthComponent::password($this->request->data['Hospital']['password']);

            $roleId = $this->Hospital->User->Role->field('Role.id', array('role' => 'hospital_admin'));

            $userArray = array('email' => $this->request->data['Hospital']['email'], 'password' => $this->request->data['Hospital']['password'], 'role_id' => $roleId);
            if ($this->Hospital->validates()) {
            if ($this->Hospital->User->save($userArray))
            {
                $user_id = $this->Hospital->User->getInsertID();
                $this->request->data['Hospital']['user_id'] = $user_id;
            if ($this->Hospital->save($this->request->data)) {



                $this->Session->setFlash(__('Hospital  has been saved.'));
                return $this->redirect(array('controller' => 'users','action' => 'login'));

            }
            }
            }
            $this->Session->setFlash(__('Unable to register Hospital.'));

        }
    }

    public function view($id = null)
    {
        $users = $this->Session->read('Auth.User');
        if ($users['Role']['role'] == 'hospital_admin' || $users['Role']['role'] == 'superadmin') {
            if (!$id) {
                throw new NotFoundException(__('Invalid hospital'));
            }

            $hospital = $this->Hospital->findById($id);
            if (!$hospital) {
                throw new NotFoundException(__('Invalid hospital'));
            }
            $this->set('hospital', $hospital);
        } else {
            $this->Session->setFlash(__('You are not authorised to access Hospital information.'));
            $this->redirect(array('controller' => 'hospitals', 'action' => 'index'));


        }
    }


    public function edit($id = null)
    {   $users = $this->Session->read('Auth.User');
        if ($users['Role']['role'] == 'hospital_admin' || $users['Role']['role'] == 'superadmin') {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $hospital = $this->Hospital->findById($id);
        if (!$hospital) {
            throw new NotFoundException(__('Invalid post'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Hospital->id = $id;
            if ($this->Hospital->save($this->request->data)) {
                $this->Session->setFlash(__('hospital has been updated.'));
                $this->redirect(array('controller' => 'users','action' => 'login'));
            }
            $this->Session->setFlash(__('Unable to update hospital.'));
        }

        if (!$this->request->data) {
            $this->request->data = $hospital;
        }
    } else {
        $this->Session->setFlash(__('You are not authorised to access Hospital information.'));
        $this->redirect(array('controller' => 'hospitals', 'action' => 'index'));


    }
    }


    public function delete($id=null)
    {  $users = $this->Session->read('Auth.User');
        if ($users['Role']['role'] == 'hospital_admin' || $users['Role']['role'] == 'superadmin') {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Hospital->delete($id)) {
            $this->Session->setFlash(__('The post with id: %s has been deleted.', h($id)));
            $this->redirect(array('controller' => 'users','action' => 'login'));
        }
    }
    else {
        $this->Session->setFlash(__('You are not authorised to access Hospital information.'));
        $this->redirect(array('controller' => 'hospitals', 'action' => 'index'));


    }

}
}