<?php
/**
 * Created by JetBrains PhpStorm.
 * User: webonise
 * Date: 7/11/13
 * Time: 12:38 PM
 * To change this template use File | Settings | File Templates.
 */
class Role extends  AppModel
{

public $hasMany = array(
    'User' => array(
        'className' => 'User',
        'foreignKey' => 'role_id',


    )
);


}