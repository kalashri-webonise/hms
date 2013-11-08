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
App::uses('AuthComponent', 'Controller/Component');
App::uses('String', 'Utility');

class PatientsController extends AppController
{
    public $components = array('FileUpload');

    public $helpers = array('Html', 'Form', 'Session');



    public function index()
    {
        //  $this->set('hospitals', $this->Hospital->find('all'));
    }

    public function patientinfo($id = null)
    {

        $this->set('patients', $this->Patient->find('all'));
    }


    public function add()
    {

        if ($this->request->is('post')) {

            $this->Patient->create();

            $this->request->data['Patient']['password'] = AuthComponent::password($this->request->data['Patient']['password']);

            $roleId= $this->Patient->User->Role->field('Role.id',array('role'=>'patient'));

            $userArray=array('email'=>$this->request->data['Patient']['email'],'password'=>$this->request->data['Patient']['password'],'role_id'=>$roleId);


            if($this->Patient->User->save($userArray))
            {

            $permitted = array('image/gif', 'image/jpeg', 'image/png', 'application/pdf', 'application/msword');

            $path = $this->request->data['Patient']['registration_no'];

            if (!file_exists('img/uploads/' . $path)) {
                $oldumask = umask(0);
                mkdir("img/uploads/" . $path, 0777, true);

                $fileUpload = $this->FileUpload->uploadFiles('img/uploads/' . $path . '/', $this->request->data['Patient']['report'], null, $permitted, false);
                umask($oldumask);

                if ($this->Patient->save($this->request->data)) {
                   $patient_id=$this->Patient->id;

                    $this->Session->setFlash(__('Patient  has been saved.'));
                    return $this->redirect(array('controller' => 'hospitals', 'action' => 'index'));
                }
            }
            if (file_exists('img/uploads/' . $path)) {
                if (!file_exists('img/uploads/' . $path . '/' . $this->request->data['Patient']['report']['name'])) {
                    $fileUpload = $this->FileUpload->uploadFiles('img/uploads/' . $path, $this->request->data['Patient']['report'], null, $permitted, false);
                } else {
                    $this->Session->setFlash(__('File already exist.'));
                }

                if ($this->Patient->save($this->request->data)) {
                    $this->Session->setFlash(__('Patient  has been saved.'));
                    return $this->redirect(array('controller' => 'hospitals', 'action' => 'index'));
                }
            }
            }

            $this->Session->setFlash(__('Unable to registrar patient.'));
        }
    }

    public function view($id = null)
    {
        if (!$id) {
            throw new NotFoundException(__('Invalid hospital'));
        }

        $patient = $this->Patient->findById($id);
        if (!$patient) {
            throw new NotFoundException(__('Invalid hospital'));
        }
        $this->set('patient', $patient);
    }


    public function edit($id = null)
    {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $patient = $this->Patient->findById($id);
        if (!$patient) {
            throw new NotFoundException(__('Invalid post'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Patient->id = $id;
           if(isset($this->request->data['Patient']['password'])!=null)
           {
            $this->request->data['Patient']['password'] = AuthComponent::password($this->request->data['Patient']['password']);

            $roleId= $this->Patient->User->Role->field('Role.id',array('role'=>'patient'));

            $userArray=array('email'=>$this->request->data['Patient']['email'],'password'=>$this->request->data['Patient']['password'],'role_id'=>$roleId);


            if($this->Patient->User->save($userArray))
            {

            if ($this->Patient->save($this->request->data)) {
                $this->Session->setFlash(__('patient has been updated.'));
                return $this->redirect(array('controller' => 'hospitals', 'action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to update patient.'));
        }
        }
            else{
                if ($this->Patient->save($this->request->data)) {
                    $this->Session->setFlash(__('patient has been updated.'));
                    return $this->redirect(array('controller' => 'hospitals', 'action' => 'index'));
                }
                $this->Session->setFlash(__('Unable to update patient.'));

            }
        }


        if (!$this->request->data) {
            $this->request->data = $patient;
        }
    }


    public function delete($id)
    {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Patient->delete($id)) {
            $this->Session->setFlash(__('The patient with id: %s has been deleted.', h($id)));
            return $this->redirect(array('controller' => 'hospitals', 'action' => 'index'));
        }
    }

}