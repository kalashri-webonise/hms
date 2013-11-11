<?php
/**
 * Created by JetBrains PhpStorm.
 * User: webonise
 * Date: 8/11/13
 * Time: 3:58 PM
 * To change this template use File | Settings | File Templates.
 */

echo $this->Form->input('time',array(
    'type'=>'select',
    'options'=>$availableTime,'empty' => 'Select Time'));
