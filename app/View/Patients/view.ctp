<div align="right"><?php echo $this->Html->Link(
    'Home',
    array('controller' => 'hospitals','action' => 'index'));
    ?></div>
<table style='border:1px solid #000000;border-style:collapse;'>
<colgroup>
<col width='300px'></col>
<col></col>
</colgroup>
    
	<tr style="background-color:#b94a48"><td><h4>Personal Details</h4></td><td style="background-color:#b94a48"></td></tr>
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
    <br>
    <tr style="background-color:#b94a48"><td><h4>Medical Details</h4></td><td style="background-color:#b94a48"></td></tr>
    <tr><td><h4>Disease :</h4></td><td><?php echo $patient['Patient']['disease_name']; ?></td></tr>
    <tr><td><h4>Hospital Name :</h4></td><td><?php echo $patient['Patient']['hospital_name']; ?></td></tr>
	<tr><td><h4>Years Of Suffering :</h4></td><td><?php echo $patient['Patient']['year_of_suffering']; ?></td></tr>
    <tr><td><h4>Years Of Treatment :</h4></td><td><?php echo $patient['Patient']['start_year_of_treatment']; ?></td></tr>
	<tr><td><h4>Consulting Doctor :</h4></td><td><?php echo $patient['Patient']['consulting_doctor']; ?></td></tr>
	<tr><td><h4>Contact Number :</h4></td><td><?php echo $patient['Patient']['contact_no']; ?></td></tr>
    <tr><td><h4>Last Appointment Date :</h4></td><td><?php echo $patient['Patient']['previous_visit_date']; ?></td></tr>
    <tr><td><h4>Department :</h4></td><td><?php echo $patient['Patient']['department']; ?></td></tr>
	<tr><td><h4>Created :</h4></td><td><?php echo $patient['Patient']['created']; ?></td></tr>
</table>
