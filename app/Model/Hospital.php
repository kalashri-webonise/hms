<?php
/**
 * Created by JetBrains PhpStorm.
 * User: webonise
 * Date: 31/10/13
 * Time: 11:12 AM
 * To change this template use File | Settings | File Templates.
 */

class Hospital extends  AppModel
{
    public $displayField = 'hospital_name';
    public $hasMany = array(
        'Doctor' => array(
            'className' => 'Doctor',
            'foreignKey' => 'hospital_id',


        )
    );

}