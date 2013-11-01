<div align="right"><?php echo $this->Html->Link(
    'Home',
    array('controller' => 'hospitals','action' => 'index'));
    ?></div>
<table>
    <tr><td>

    <tr><td><h4>First Name :</h4></td><td><?php echo $patient['Patient']['first_name']; ?></td></tr>
    <tr><td><h4>Middle Name :</h4></td><td><?php echo $patient['Patient']['middle_name']; ?></td></tr>
    <tr><td><h4>Last Name :</h4></td><td><?php echo $patient['Patient']['last_name']; ?></td></tr>
    <tr><td><h4>Email :</h4></td><td><?php echo $patient['Patient']['email']; ?></td></tr>
    <tr><td><h4>Address :</h4></td><td><?php echo $patient['Patient']['address']; ?></td></tr>
    <tr><td><h4>Country :</h4></td><td><?php echo $patient['Patient']['country']; ?></td></tr>
    <tr><td><h4>State :</h4></td><td><?php echo $patient['Patient']['state']; ?></td></tr>
    <tr><td><h4>City :</h4></td><td><?php echo $patient['Patient']['city']; ?></td></tr>
    <tr><td><h4>Mob1 :</h4></td><td><?php echo $patient['Patient']['mob1']; ?></td></tr>
    <tr><td><h4>Mob2 :</h4></td><td><?php echo $patient['Patient']['mob2']; ?></td></tr>
    <tr><td><h4>Contact Number :</h4></td><td><?php echo $patient['Patient']['contact_no']; ?></td></tr>
    <tr><td><h4>Disease :</h4></td><td><?php echo $patient['Patient']['disease']; ?></td></tr>

    <tr><td><h4>Years Of Suffering :</h4></td><td><?php echo $patient['Patient']['year_of_suffering']; ?></td></tr>
    <tr><td><h4>Hospital Name :</h4></td><td><?php echo $patient['Patient']['hospital_name']; ?></td></tr>
    <tr><td><h4>Doctor Name :</h4></td><td><?php echo $patient['Patient']['doctor_name']; ?></td></tr>

    <tr><td><h4>Years Of Treatment :</h4></td><td><?php echo $patient['Patient']['year_of_treatment']; ?></td></tr>
    <tr><td><h4>Consulting Doctor :</h4></td><td><?php echo $patient['Patient']['consulting_doctor']; ?></td></tr>

    <tr><td><h4>Previously Visited :</h4></td><td><?php echo $patient['Patient']['previously_visited']; ?></td></tr>
    <tr><td><h4>Last Appointment Date :</h4></td><td><?php echo $patient['Patient']['last_appointment_date']; ?></td></tr>
    <tr><td><h4>Department :</h4></td><td><?php echo $patient['Patient']['department']; ?></td></tr>

    <tr><td><h4>Created :</h4></td><td><?php echo $patient['Patient']['created']; ?></td></tr>
</table>
