<?php
/**
 * Created by JetBrains PhpStorm.
 * User: webonise
 * Date: 8/11/13
 * Time: 10:09 AM
 * To change this template use File | Settings | File Templates.
 */

   echo $this->Form->input('doctor_id',array(
        'type'=>'select',
        'options'=>$doctors,'empty' => 'Select Doctor'));
