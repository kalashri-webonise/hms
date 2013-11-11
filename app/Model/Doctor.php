<?php
/**
 * Created by JetBrains PhpStorm.
 * User: webonise
 * Date: 31/10/13
 * Time: 4:09 PM
 * To change this template use File | Settings | File Templates.
 */

/**
 * @property Hospital $Hospital
 */
class Doctor extends AppModel
{
    public $inserted_id;

    public function afterSave($created)
    {
        if ($created) {
            $inserted_id = $this->getInsertID();
            $idHash = md5($inserted_id);
            $this->set('registration_no', $idHash);
            $this->set('id', $inserted_id);
            $this->save();
        }

    }

    public $belongsTo = array(
        'Hospital' => array(
            'className' => 'Hospital',
            'foreignKey' => 'hospital_id'

        ),
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'

        )

    );
    public $hasMany = array(
        'Appointment' => array(
            'className' => 'Appointment',
            'foreignKey' => 'doctor_id',

        )
    );


    public $validate = array(

        'last_name' => array(


            'rule' => '/^[a-zA-Z]+/i',
            'message' => 'Only letters allowed last name',

            'required' => array( 'rule' => array('notEmpty'),'message' => 'last name cannot be left blank')
        ),


        'middle_name' => array(


            'rule' => '/^[a-zA-Z]+/i',
            'message' => 'Only letters allowed in middle name',

            'required' => array( 'rule' => array('notEmpty'),'message' => 'middle name cannot be left blank')
        ),

        'address' => array(

            'rule' => '/^[a-zA-Z0-9-\/] ?([a-zA-Z0-9-\/]|[a-zA-Z0-9-\/] )*[a-zA-Z0-9-\/]$/i',
            'message' => 'Please supply a valid address.',

            'required' => array( 'rule' => array('notEmpty'),'message' => 'address cannot be left blank')
        ),

        'mobile_no' => array(
            'rule' => 'numeric',
            'message' => 'Mobile number should be numeric',
            'required' => array( 'rule' => array('notEmpty'),'message' => 'mobile number cannot be left blank'),
            'maxLength' => array(
                'rule' => array('maxLength', 20),
                'message' => 'mobile must be no larger than 20 digits.'
            ),


        ),

        'specialization' => array(


            'rule' => '/^[a-zA-Z]+/i',
            'message' => 'Only letters allowed in specialization',

            'required' => array( 'rule' => array('notEmpty'),'message' => 'specialization cannot be left blank')

        ),
        'year_of_exp' => array(

            'rule' => 'numeric',
            'message' => 'Years of experience should be numeric',
            'required' => array( 'rule' => array('notEmpty'),'message' => 'year of exp cannot be left blank')
        ),


        'city' => array(


            'rule' => '/^[a-zA-Z]+/i',
            'message' => 'Only letters allowed in City',

            'required' => array( 'rule' => array('notEmpty'),'message' => 'city cannot be left blank')
        ),
        'state' => array(


            'rule' => '/^[a-zA-Z]+/i',
            'message' => 'Only letters allowed in State',

            'required' => array( 'rule' => array('notEmpty'),'message' => 'state cannot be left blank')
        ),

        'country' => array(

            'rule' => '/^[a-zA-Z]+/i',
            'message' => 'Only letters allowed in Country',

            'required' => array( 'rule' => array('notEmpty'),'message' => 'country cannot be left blank')

        ),
        'password' => array(

            // 'passwordequal'  => array('rule' =>'checkpasswords','message' => 'Passwords dont match with confirm password')
            'required' => array( 'rule' => array('notEmpty'),'message' => 'password cannot be left blank')
        )

    );

    function checkpasswords()
    {
        if(strcmp($this->data['Doctor']['password'],$this->data['Doctor']['confirm_password']) ==0 )
        {
            return true;
        }
        return false;
    }
}


