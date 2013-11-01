<div align="right"><?php echo $this->Form->postLink(
    'Home',
    array('action' => 'index'));
    ?></div>
<table>
    <tr><td>
<h3>Registration Number :<?php echo h($hospital['Hospital']['registration_no']); ?></h3></tr></td>
    <tr><td><h4>Hospital Name :</h4></td><td><?php echo $hospital['Hospital']['hospital_name']; ?></td></tr>
    <tr><td><h4>Address :</h4></td><td><?php echo $hospital['Hospital']['address']; ?></td></tr>
    <tr><td><h4>Establish Date :</h4></td><td><?php echo $hospital['Hospital']['establish_date']; ?></td></tr>
    <tr><td><h4>Country :</h4></td><td><?php echo $hospital['Hospital']['country']; ?></td></tr>
    <tr><td><h4>State :</h4></td><td><?php echo $hospital['Hospital']['state']; ?></td></tr>
    <tr><td><h4>City :</h4></td><td><?php echo $hospital['Hospital']['city']; ?></td></tr>
    <tr><td><h4>Contact Number :</h4></td><td><?php echo $hospital['Hospital']['contact_no']; ?></td></tr>
    <tr><td><h4>Created :</h4></td><td><?php echo $hospital['Hospital']['created']; ?></td></tr>
</table>
