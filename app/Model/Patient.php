<?php
/**
 * Created by JetBrains PhpStorm.
 * User: webonise
 * Date: 31/10/13
 * Time: 6:25 PM
 * To change this template use File | Settings | File Templates.
 */
/**
 * @property Patient $Patient
 */
class Patient extends  AppModel
{
    public $inserted_id;

    public function afterSave($created) {
        if($created) {
            $inserted_id = $this->getInsertID();
            $idHash= md5( $inserted_id);
            $this->set('registration_no',$idHash);
            $this->set('id',$inserted_id);
            $this->save();
        }

    }


    public $displayField = 'hospital_name';
    public $hasMany = array(
        'Report' => array(
            'className' => 'Report',
            'foreignKey' => 'patient_id',
        )
    );
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'

        )
    );

    public $validate = array(
        'first_name' => array(

            'required' => array( 'rule' => array('notEmpty'),'message' => 'first_name cannot be left blank'),
            'rule' => '/^[a-zA-Z]+/i',
            'message' => 'Only letters allowed in first name'

        ),
        'last_name' => array(

            'rule' => '/^[a-zA-Z]+/i',
            'message' => 'Only letters allowed last name',
            'required' => array( 'rule' => array('notEmpty'),'message' => 'last_name cannot be left blank')
        ),


        'middle_name' => array(
            'required' => array( 'rule' => array('notEmpty'),'message' => 'middle_name cannot be left blank'),
            'rule' => '/^[a-zA-Z]+/i',
            'message' => 'Only letters allowed in middle name'
        ),



        'address' => array(
            'required' => array( 'rule' => array('notEmpty'),'message' => 'address cannot be left blank'),
            'rule' => '/^[a-zA-Z0-9-\/] ?([a-zA-Z0-9-\/]|[a-zA-Z0-9-\/] )*[a-zA-Z0-9-\/]$/i',
            'message' => 'Please supply a valid address.'

        ),

        'mob1' => array(
            'required' => array( 'rule' => array('notEmpty'),'message' => 'mob1 cannot be left blank'),

            'rule' => 'numeric',
            'maxLength' => array(
                'rule' => array('maxLength', 20),
                'message' => 'mobile must be no larger than 20 digits.'
            )


        ),
        'mob2' => array(

            'rule' => 'numeric',
            'allowEmpty' => true,
            'maxLength' => array(
                'rule' => array('maxLength', 20),
                'message' => 'mobile must be no larger than 20 digits.'
            )

        ),



        'disease_name' => array(
            'required' => array( 'rule' => array('notEmpty'),'message' => 'disease name cannot be left blank'),

            'rule' => '/^[a-zA-Z]+/i',
            'message' => 'Only letters allowed last name'


        ),

        'year_of_suffering' => array(

            'rule' => 'numeric',
            'message' => 'year_of_suffering  should be numeric',
             'allowEmpty' => true
        ),


        'hospital_name' => array(

            'rule' =>'alphaNumeric',
            'message' => 'Hospital name should contain letter or digits ',
            'allowEmpty' => true


        ),
        'contact_no' => array(

            'rule' =>'numeric',
            'message' => 'contact number should be numeric',
            'allowEmpty' => true,


            'maxLength' => array(
                'rule' => array('maxLength', 20),
                'message' => 'mobile must be no larger than 20 digits.'
            )
        ),
        'start_year_of_treatment' => array(

            'rule' =>'numeric',
            'message' => 'start_year_of_treatment should be numeric',
            'allowEmpty' => true
        ),
        'previous_visit_date' => array(
            'rule'       => array('date', 'ymd'),
            'message'    => 'Enter a valid date in YY-MM-DD format.',
            'allowEmpty' => true
        ),
        'department' => array(

            'rule' => '/^[a-zA-Z]+/i',
            'message' => 'Only letters allowed in Department',
            'allowEmpty' => true

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
            'required' => array( 'rule' => array('notEmpty'),'message' => 'password cannot be left blank')
            //'passwordequal'  => array('rule' =>'checkpasswords','message' => 'Passwords dont match with confirm password')
        )



    );
    function checkpasswords()
    {
        if(strcmp($this->data['Patient']['password'],$this->data['Patient']['confirm_password']) ==0 )
        {
            return true;
        }
        return false;
    }
}
