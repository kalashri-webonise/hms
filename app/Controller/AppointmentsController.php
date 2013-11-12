<?php
/**
 * Created by JetBrains PhpStorm.
 * User: webonise
 * Date: 7/11/13
 * Time: 6:52 PM
 * To change this template use File | Settings | File Templates.
 */
App::uses('AuthComponent', 'Controller/Component');

class AppointmentsController extends AppController
{

    public function ajax_fetch_doctor($id=null)
    {

        $this->layout = 'ajax';
        if ($id!=null) {

            $doctors = $this->Appointment->ajaxFetchDoctor($id);


            $this->set(compact('doctors'));

        }


    }

    public function ajax_fetch_timeslot($date=null)
    {


        $this->layout = 'ajax';
        if ($date!=null) {

            $availableTime = $this->Appointment->ajaxFetchtime($date);


            $this->set(compact('availableTime'));

        }


    }


    public function add()
    {   $users = $this->Session->read('Auth.User');
        $hospitalName = $this->Appointment->Hospital->find('list', array(
            'fields' => array('Hospital.hospital_name')
        ));
        $this->set('hospital_name', $hospitalName);

        if ($this->request->is('post')) {
            $this->Appointment->create();
          $this->request->data['Appointment']['doctor_id']=$this->request->data['doctor_id'];
            $this->request->data['Appointment']['time']=$this->request->data['time'];


            if ($this->Appointment->save($this->request->data)) {
                $this->Session->setFlash(__('Appointment has been saved.'));
                if($users['Role']['role'] == 'superadmin')
                {
                    $this->redirect(array('controller' => 'hospitals', 'action' => 'index'));
                }
                else{
                    $this->redirect(array('controller' => 'patients', 'action' => 'myaccount'));
                }

            }
            $this->Session->setFlash(__('Unable to set Appointment.'));

        }
}
}