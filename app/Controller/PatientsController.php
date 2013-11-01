<?php
/**
 * Created by JetBrains PhpStorm.
 * User: webonise
 * Date: 31/10/13
 * Time: 11:14 AM
 * To change this template use File | Settings | File Templates.
 */
/**
 * @property Doctor $Doctor
 */

class PatientsController extends  AppController
{

    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');

    public function index() {
        //  $this->set('hospitals', $this->Hospital->find('all'));
    }

    public function patientinfo($id = null) {

        $this->set('patients', $this->Patient->find('all'));
    }



    public function add() {
        if ($this->request->is('post')) {
            $this->Patient->create();

            if ($this->Patient->save($this->request->data)) {
                $this->Session->setFlash(__('Patient  has been saved.'));
                return $this->redirect(array('controller' => 'hospitals','action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to registrar patient.'));
        }
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid hospital'));
        }

        $patient = $this->Patient->findById($id);
        if (!$patient) {
            throw new NotFoundException(__('Invalid hospital'));
        }
        $this->set('patient', $patient);
    }


    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $patient = $this->Patient->findById($id);
        if (!$patient) {
            throw new NotFoundException(__('Invalid post'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Patient->id = $id;
            if ($this->Patient->save($this->request->data)) {
                $this->Session->setFlash(__('patient has been updated.'));
                return $this->redirect(array('controller' => 'hospitals','action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to update patient.'));
        }

        if (!$this->request->data) {
            $this->request->data = $patient;
        }
    }


    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Patient->delete($id)) {
            $this->Session->setFlash(__('The patient with id: %s has been deleted.', h($id)));
            return $this->redirect(array('controller' => 'hospitals','action' => 'index'));
        }
    }

}