<?php
/**
 * Created by JetBrains PhpStorm.
 * User: webonise
 * Date: 7/11/13
 * Time: 6:53 PM
 * To change this template use File | Settings | File Templates.
 */
class Appointment extends AppModel
{
  public $belongsTo = array(
      'Doctor' => array(
          'className' => 'Doctor',
          'foreignKey' => 'doctor_id'

      ),
      'Hospital' => array(
          'className' => 'Hospital',
          'foreignKey' => 'hospital_id'

      )
      );

     public $validate = array(
         'hospital_id' => array(

             'required' => array( 'rule' => array('notEmpty'),'message' => 'hospital name cannot be left blank')
         ),
         'doctor_id' => array(
             'required' => array( 'rule' => array('notEmpty'),'message' => 'doctor  name cannot be left blank')
         ),

         'name' => array(
             'rule' => '/^[a-zA-Z]+/i',
             'message' => 'Only letters please',
             'required' => array( 'rule' => array('notEmpty'),'message' => 'patient name cannot be left blank')
         ),
         'time' => array(

             'required' => array( 'rule' => array('notEmpty'),'message' => 'time cannot be left blank')
         ),
         'date' => array(

             'required' => array( 'rule' => array('notEmpty'),'message' => 'date cannot be left blank')
         ),
         'contact_no' => array(
             'rule'    => 'numeric',
             'required' => array( 'rule' => array('notEmpty'),'message' => 'contact number cannot be left blank')
         )
         );


   // var $virtualFields = array( 'name' => 'CONCAT(Doctor.first_name," ", Doctor.last_name)');
    public function ajaxFetchDoctor($id)
    {

            $doc = $this->Doctor->find('list', array('fields' => array('Doctor.id', 'Doctor.first_name'), 'conditions' => array('Doctor.hospital_id' => $id)));

           return $doc;

    }
    public function ajaxFetchtime($date)
    {

        $timeSlots=array('9:30-10:00'=>'9:30-10:00','10:00-10:30'=>'10:00-10:30','10:30-11:00'=>'10:30-11:00','11:00-11:30'=>'11:00-11:30','11:30-12:00'=>'11:30-12:00','12:00-12:30'=>'12:00-12:30','12:30-13:00'=>'12:30-1:00','17:00-17:30'=>'5:00-5:30','17:30-18:00'=>'5:30-6:00','18:00-18:30'=>'6:00-6:30','18:30-19:00'=>'6:30-7:00','19:00-19:30'=>'7:00-7:30');

        $time = $this->find('list', array('fields' => array('Appointment.time','Appointment.time'), 'conditions' => array('Appointment.date' => $date)));

        $avalTime=array_diff($timeSlots,$time);

        return $avalTime;

    }


}