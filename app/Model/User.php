<?php
App::uses('AuthComponent', 'Controller/Component');
class User extends  AppModel
{
    public $hasOne = array(
        'Patient' => array(
            'className' => 'Patient',
            'foreignKey' => 'user_id'

        ),
        'Doctor' => array(
            'className' => 'Doctor',
            'foreignKey' => 'user_id'

        ),
        'Hospital' => array(
            'className' => 'Hospital',
            'foreignKey' => 'user_id'
        )

    );
    public $belongsTo = array(
        'Role' => array(
            'className' => 'Role',
            'foreignKey' => 'role_id',

        )
    );

}