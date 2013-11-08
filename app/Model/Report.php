<?php
/**
 * Created by JetBrains PhpStorm.
 * User: webonise
 * Date: 6/11/13
 * Time: 2:58 PM
 * To change this template use File | Settings | File Templates.
 */
class Report extends  AppModel
{
    public $belongsTo = array(
        'Patient' => array(
            'className' => 'Patient',
            'foreignKey' => 'patient_id'

        )
    );
}