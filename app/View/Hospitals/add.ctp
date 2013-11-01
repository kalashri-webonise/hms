<div align="right"><?php echo  $this->Html->link(
    'Home',
    array('action' => 'index'));
    ?></div>
<h1>Add Hospital</h1>
<?php
echo $this->Html->script('hospital.js');
echo $this->Form->create('Hospital');
echo $this->Form->input('registration_no');
echo $this->Form->input('hospital_name');
echo $this->Form->input('address', array('rows' => '3'));
echo $this->Form->input('country');
echo $this->Form->input('state');
echo $this->Form->input('city');
echo $this->Form->input('contact_no');
echo $this->Form->input('establish_date', array('class' => 'datepicker','id'=>'dp4', 'type' => 'text', 'label' => false));
echo $this->Form->end(array('class'=>'btn btn-primary'));

?>