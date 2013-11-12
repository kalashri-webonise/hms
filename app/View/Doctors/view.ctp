<div align="right"><?php echo $this->Html->Link(
    'Admin Back to home',
    array('controller' => 'hospitals','action' => 'index'));
    ?></div>
<div align="right"><?php echo $this->Html->Link(
    'Home',
    array('controller' => 'doctors', 'action' => 'myaccount'));
    ?></div>
<table>
    <tr>

    <tr><td><h4>First Name :</h4></td><td><?php echo $doctor['Doctor']['first_name']; ?></td></tr>
    <tr><td><h4>Middle Name :</h4></td><td><?php echo $doctor['Doctor']['middle_name']; ?></td></tr>
    <tr><td><h4>Last Name :</h4></td><td><?php echo $doctor['Doctor']['last_name']; ?></td></tr>
    <tr><td><h4>Email :</h4></td><td><?php echo $doctor['Doctor']['email']; ?></td></tr>
    <tr><td><h4>Address :</h4></td><td><?php echo $doctor['Doctor']['address']; ?></td></tr>
    <tr><td><h4>Mobile No :</h4></td><td><?php echo $doctor['Doctor']['mobile_no']; ?></td></tr>
    <tr><td><h4>education :</h4></td><td><?php echo $doctor['Doctor']['education']; ?></td></tr>

    <tr><td><h4>Specialization :</h4></td><td><?php echo $doctor['Doctor']['specialization']; ?></td></tr>
    <tr><td><h4>Years of experience :</h4></td><td><?php echo $doctor['Doctor']['year_of_exp']; ?></td></tr>
    <tr><td><h4>Department :</h4></td><td><?php echo $doctor['Doctor']['department']; ?></td></tr>
    <tr><td><h4>Country :</h4></td><td><?php echo $doctor['Doctor']['country']; ?></td></tr>
    <tr><td><h4>State :</h4></td><td><?php echo $doctor['Doctor']['state']; ?></td></tr>
    <tr><td><h4>City :</h4></td><td><?php echo $doctor['Doctor']['city']; ?></td></tr>
    <tr><td><h4>Created :</h4></td><td><?php echo $doctor['Doctor']['created']; ?></td></tr>
</table>
