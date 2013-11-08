<?php
/**
 * Created by JetBrains PhpStorm.
 * User: webonise
 * Date: 31/10/13
 * Time: 4:03 PM
 * To change this template use File | Settings | File Templates.
 */
/**
 * @property Doctor $Doctor
 */
App::uses('AuthComponent', 'Controller/Component');
App::uses('String', 'Utility');
class DoctorsController extends  AppController
{

    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');

    public function index() {
        //  $this->set('hospitals', $this->Hospital->find('all'));
    }

    public function doctorinfo($id = null) {

        $this->set('doctors', $this->Doctor->find('all'));

    }



    public function add() {

        $this->set('hospitals',
            $this->Doctor->Hospital->find(
                'list',
                array( 'order' => 'hospital_name ASC' )
            )
        );

        if ($this->request->is('post')) {
            $this->Doctor->create();

            $this->request->data['Doctor']['password'] = AuthComponent::password($this->request->data['Doctor']['password']);

            $roleId= $this->Doctor->User->Role->field('Role.id',array('role'=>'doctor'));

            $userArray=array('email'=>$this->request->data['Doctor']['email'],'password'=>$this->request->data['Doctor']['password'],'role_id'=>$roleId);


            if($this->Doctor->User->save($userArray))
            {

            if ($this->Doctor->save($this->request->data))
            {
                $this->Session->setFlash(__('Doctor has been saved.'));
                return $this->redirect(array('controller' => 'hospitals','action' => 'index'));
            }
            }
            $this->Session->setFlash(__('Unable to registrar hospital.'));
        }
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid hospital'));
        }

        $doctor = $this->Doctor->findById($id);
        if (!$doctor) {
            throw new NotFoundException(__('Invalid hospital'));
        }
        $this->set('doctor', $doctor);
    }


    public function edit($id = null) {

        $this->set('hospitals',
            $this->Doctor->Hospital->find(
                'list',
                array( 'order' => 'hospital_name ASC' )
            )
        );

        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $doctor = $this->Doctor->findById($id);
        if (!$doctor) {
            throw new NotFoundException(__('Invalid post'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Doctor->id = $id;
            if ($this->Doctor->save($this->request->data)) {
                $this->Session->setFlash(__('hospital has been updated.'));
                return $this->redirect(array('controller' => 'hospitals','action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to update hospital.'));
        }

        if (!$this->request->data) {
            $this->request->data = $doctor;
        }
    }


    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Doctor->delete($id)) {
            $this->Session->setFlash(__('The post with id: %s has been deleted.', h($id)));
            return $this->redirect(array('controller' => 'hospitals','action' => 'index'));
        }
    }

    public function calendar($id = null) {

        $app=$this->Doctor->Appointment->find('all',array('conditions' => array('Appointment.doctor_id' => $id),'recursive' => -1));
        pr($app);

    }


}