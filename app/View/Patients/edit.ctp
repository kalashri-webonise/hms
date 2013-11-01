<div align="right"><?php echo $this->html->Link(
    'Home',
    array('controller' => 'hospitals','action' => 'index'));
    ?></div>
<h1>Patient Registration</h1>
<?php
echo $this->Form->create('Patient');
echo $this->Form->input('first_name');
echo $this->Form->input('middle_name');
echo $this->Form->input('last_name');
echo $this->Form->input('email');
echo $this->Form->input('mob1');
echo $this->Form->input('mob2');
echo $this->Form->input('disease');
echo $this->Form->input('year_of_suffering');
echo $this->Form->input('address', array('rows' => '3'));
echo $this->Form->input('country');
echo $this->Form->input('state');
echo $this->Form->input('city');
echo $this->Form->input('doctor_name');
echo $this->Form->input('hospital_name');
echo $this->Form->input('contact_no');
echo $this->Form->input('year_of_treatment');
echo $this->Form->input('consulting_doctor');
echo $this->Form->input('previously_visited');
echo $this->Form->input('last_appointment_date');
echo $this->Form->input('department');



echo $this->Form->end(array('class'=>'btn btn-primary'));

