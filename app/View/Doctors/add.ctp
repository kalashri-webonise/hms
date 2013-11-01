

<div align="right"><?php echo $this->html->Link(
    'Home',
    array('controller' => 'hospitals','action' => 'index'));
?></div>
<h1>Doctor Registration</h1>
<?php
echo $this->Html->script('hospital.js');
echo $this->Form->create('Doctor');
echo $this->Form->input('registration_no');
echo $this->Form->input('first_name');
echo $this->Form->input('middle_name');
echo $this->Form->input('last_name');
echo $this->Form->input('email');
echo $this->Form->input('education');
echo $this->Form->input('specialization');
echo $this->Form->input('year_of_exp');
echo $this->Form->input('department', array('type' => 'select' ,'options'=>array('cancer','Orthopedic','Heart'),'empty' => '(choose one)'));
echo $this->Form->input('address', array('rows' => '3'));
echo $this->Form->input('country');
echo $this->Form->input('state');
echo $this->Form->input('city');
echo $this->Form->input('mobile_no');

echo $this->Form->input('hospital_id', array('type' => 'select'));
echo $this->Form->end(array('class'=>'btn btn-primary'));

