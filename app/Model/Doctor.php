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
class Doctor extends  AppModel
{
    public $belongsTo = array(
        'Hospital' => array(
            'className' => 'Hospital',
            'foreignKey' => 'hospital_id'

        )
    );

}