<?php
/**
 * Created by JetBrains PhpStorm.
 * User: webonise
 * Date: 31/10/13
 * Time: 11:12 AM
 * To change this template use File | Settings | File Templates.
 */

class Hospital extends AppModel
{
    public $inserted_id;

    public function afterSave($created) {
        if($created) {
            $inserted_id = $this->getInsertID();
            $idHash= md5($inserted_id);
            $this->set('registration_no',$idHash);
            $this->set('id',$inserted_id);
            $this->save();
        }

    }

    public $displayField = 'hospital_name';
    public $hasMany = array(
        'Doctor' => array(
            'className' => 'Doctor',
            'foreignKey' => 'hospital_id',

        ),

        'Appointment' => array(
            'className' => 'Appointment',
            'foreignKey' => 'hospital_id',

        )

    );

    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'

        )
    );


    public $validate = array(

      /*  'contact_no' => array(


            'rule'    => 'numeric',
            'required' =>true,
            'allowEmpty' => false,
            'message' => 'Contact number should be numeric',




        ),

        'hospital_name' => array(


            'rule' => 'alphaNumeric',
            'message' => 'Hospital name should contain letter or digits ',

            'required' =>true,
            'allowEmpty' => false
        ),*/

        'city' => array(


            'rule' => '/^[a-zA-Z]+/i',
            'message' => 'Only letters allowed in City',
            'required' => array( 'rule' => array('notEmpty'),'message' => 'city cannot be left blank')
        ),
        'state' => array(

            'pattern' => array(
                'rule' => '/^[a-zA-Z]+/i',
                'message' => 'Only letters allowed in State'
            ),
            'required' => array( 'rule' => array('notEmpty'),'message' => 'State cannot be left blank')
        ),

        'country' => array(

            'pattern' => array(
                'rule' => '/^[a-zA-Z]+/i',
                'message' => 'Only letters allowed in Country'
            ),
            'required' => array( 'rule' => array('notEmpty'),'message' => 'Country cannot be left blank')
        ),
        'establish_date' => array(
            'rule'       => array('date', 'ymd'),
            'message'    => 'Enter a valid date in YY-MM-DD format.',
            'allowEmpty' => true
        ),
        'password' => array(

            'required' => array( 'rule' => array('notEmpty'),'message' => 'Password cannot be left blank')
        ),
        'email' => array(

            'required' => array( 'rule' => array('notEmpty'),'message' => 'email cannot be left blank')
        )
    );



}
