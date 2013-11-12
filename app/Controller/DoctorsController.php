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
class DoctorsController extends AppController
{

    public $helpers = array('Html', 'Form', 'Js', 'Session');
    public $components = array('Session');

    public function index()
    {
        //  $this->set('hospitals', $this->Hospital->find('all'));
    }

    public function doctorinfo()
    {
        $users = $this->Session->read('Auth.User');
        if ($users['Role']['role'] == 'superadmin') {
            $this->set('doctors', $this->Doctor->find('all'));
        } else {
            $this->Session->setFlash(__('You are not authorised to access Doctor information.'));
            $this->redirect(array('controller' => 'hospitals', 'action' => 'index'));


        }

    }
    public function myaccount()
    {  $this->loadModel('Hospital');
        $users = $this->Session->read('Auth.User');
        if ($users['Role']['role'] == 'doctor') {
            $this->set('users',$users);

            $hospitalList=$this->Hospital->find('all');
            $this->set('hospitalList',$hospitalList);
    }
    else {
        $this->Session->setFlash(__('You are not authorised to access Doctor account.'));
        $this->redirect(array('controller' => 'hospitals', 'action' => 'index'));


    }

    }


    public function add()
    {
        $users = $this->Session->read('Auth.User');
        $this->set('hospitals',
            $this->Doctor->Hospital->find(
                'list',
                array('order' => 'hospital_name ASC')
            )
        );

        if ($this->request->is('post')) {
            $this->Doctor->create();



            $this->request->data['Doctor']['password'] = AuthComponent::password($this->request->data['Doctor']['password']);

            $roleId = $this->Doctor->User->Role->field('Role.id', array('role' => 'doctor'));

            $userArray = array('email' => $this->request->data['Doctor']['email'], 'password' => $this->request->data['Doctor']['password'], 'role_id' => $roleId);
            if ($this->Doctor->validates()) {


                if ($this->Doctor->User->save($userArray)) {
                //$this->request->data['Doctor']['user_id'] = $this->Auth->user(’id’);
                $user_id = $this->Doctor->User->getInsertID();
                $this->request->data['Doctor']['user_id'] = $user_id;
                if ($this->Doctor->save($this->request->data)) {
                    $this->Session->setFlash(__('Doctor has been saved.'));
                    $this->redirect(array('controller' => 'users','action' => 'login'));
                }
            }
            }
            $this->Session->setFlash(__('Unable to registrar doctor.'));

        }
    }

    public function view($id = null)
    {
        $users = $this->Session->read('Auth.User');
        if ($users['Role']['role'] == 'doctor' || $users['Role']['role'] == 'superadmin') {
            if (!$id) {
                throw new NotFoundException(__('Invalid doctor'));
            }

            $doctor = $this->Doctor->findById($id);
            if (!$doctor) {
                throw new NotFoundException(__('Invalid doctor'));
            }
            $this->set('doctor', $doctor);
        } else {
            $this->Session->setFlash(__('You are not authorised to access Doctor information.'));
            $this->redirect(array('controller' => 'hospitals', 'action' => 'index'));


        }
    }


    public function edit($id = null)
    {
        $users = $this->Session->read('Auth.User');
        if ($users['Role']['role'] == 'doctor' || $users['Role']['role'] == 'superadmin') {
            $this->set('hospitals',
                $this->Doctor->Hospital->find(
                    'list',
                    array('order' => 'hospital_name ASC')
                )
            );

            if (!$id) {
                throw new NotFoundException(__('Invalid doctor'));
            }

            $doctor = $this->Doctor->findById($id);
            if (!$doctor) {
                throw new NotFoundException(__('Invalid doctor'));
            }

            if ($this->request->is(array('post', 'put'))) {
                $this->Doctor->id = $id;
                if ($this->Doctor->save($this->request->data)) {
                    $this->Session->setFlash(__('doctor has been updated.'));
                   $this->redirect(array('controller' => 'doctors', 'action' => 'myaccount'));
                }
                $this->Session->setFlash(__('Unable to update doctor.'));
            }

            if (!$this->request->data) {
                $this->request->data = $doctor;
            }
        } else {
            $this->Session->setFlash(__('You are not authorised to access Doctor information.'));
            $this->redirect(array('controller' => 'hospitals', 'action' => 'index'));


        }
    }

    public function delete($id=null)
    {  $users = $this->Session->read('Auth.User');
        if ($users['Role']['role'] == 'doctor' || $users['Role']['role'] == 'superadmin') {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Doctor->delete($id)) {
            $this->Session->setFlash(__('The doctor with id: %s has been deleted.', h($id)));
            $this->redirect(array('controller' => 'doctors', 'action' => 'myaccount'));
        }
        }
        else {
            $this->Session->setFlash(__('You are not authorised to access Doctor information.'));
            $this->redirect(array('controller' => 'hospitals', 'action' => 'index'));


        }
    }

    public function calendar($id = null)
    {
        $users = $this->Session->read('Auth.User');
        if ($users['Role']['role'] == 'doctor' || $users['Role']['role'] == 'superadmin') {
        $app = $this->Doctor->Appointment->find('all', array('conditions' => array('Appointment.doctor_id' => $id), 'recursive' => -1));
        if ($app != null) {
            $i = 0;
            $j = 1;
            foreach ($app as $key => $value) {

                $dateD = $value['Appointment']['date'];
                $time = $value['Appointment']['time'];
                $name = $value['Appointment']['name'];

                $dbDate = explode('-', $dateD);
                $year = intval($dbDate[0]);
                $month = intval($dbDate[1]);
                $day = intval($dbDate[2]);


                $dbTime = explode('-', $time);
                $start = $dbTime[0];
                $end = $dbTime[1];

                $str = explode(':', $start);
                $start1 = $str[0];
                $start2 = $str[1];


                $endTim = explode(':', $end);
                $end1 = $endTim[0];
                $end2 = $endTim[1];


                // pr(date(''))

                //    $startTime = gmdate('d-m-Y H:i:s', strtotime($dateD . $start)) . ' GMT+0530 (IST)';
                //    $endTime = gmdate('d-m-Y H:i:s', strtotime($dateD . $end)) . ' GMT+0530 (IST)';

                //  $startTime=($dateD.$start);
                //  $endTime=($dateD.$end);


                $appointmentArr[$i] = array(
                    'id' => $j, 'year' => $year, 'month' => $month, 'day' => $day, 'title' => $name, 'start1' => $start1, 'start2' => $start2, 'end1' => $end1, 'end2' => $end2);

                $i++;
                $j++;

            }

            //   pr($appointmentArr);
//        $as = json_encode($appointmentArr);
            $this->set(compact('appointmentArr'));
        } else {
            $this->Session->setFlash(__('No appointment sheduled.'));
            $this->redirect(array('controller' => 'doctors', 'action' => 'myaccount'));
        }

    }

else {
$this->Session->setFlash(__('You are not authorised to access Doctor information.'));
$this->redirect(array('controller' => 'hospitals', 'action' => 'index'));


}
}
}