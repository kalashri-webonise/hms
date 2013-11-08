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

class HospitalsController extends  AppController
{

    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');




    public function index() {

      //  $this->set('hospitals', $this->Hospital->find('all'));
    }

    public function hospitalinfo($id = null) {

        $this->set('hospitals', $this->Hospital->find('all'));
    }



    public function add() {
        if ($this->request->is('post')) {

            $this->Hospital->create();

            $this->request->data['Hospital']['password'] = AuthComponent::password($this->request->data['Hospital']['password']);

            $roleId= $this->Hospital->User->Role->field('Role.id',array('role'=>'hospital_admin'));

            $userArray=array('email'=>$this->request->data['Hospital']['email'],'password'=>$this->request->data['Hospital']['password'],'role_id'=>$roleId);


           if($this->Hospital->User->save($userArray))
           {
               if ($this->Hospital->save($this->request->data)) {
                $this->Session->setFlash(__('Hospital  has been saved.'));
               return $this->redirect(array('action' => 'index'));
            }
           }
            $this->Session->setFlash(__('Unable to registar hospital.'));
        }
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid hospital'));
        }

        $hospital = $this->Hospital->findById($id);
        if (!$hospital) {
            throw new NotFoundException(__('Invalid hospital'));
        }
        $this->set('hospital', $hospital);
    }


    public function edit($id = null) {
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
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to update hospital.'));
        }

        if (!$this->request->data) {
            $this->request->data = $hospital;
        }
    }


    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Hospital->delete($id)) {
            $this->Session->setFlash(__('The post with id: %s has been deleted.', h($id)));
            return $this->redirect(array('action' => 'index'));
        }
    }

}