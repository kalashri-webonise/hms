<br><br>
<div align="right">
    <u><?php echo $this->Html->link('Logout',
        array('controller' => 'users', 'action' => 'logout')); ?></u>
</div>
<table>

    <tr>

        <td>
            <?php echo $this->Html->link('Hospital',
            array('controller' => 'hospitals', 'action' => 'hospitalinfo')); ?>
        </td>
        <td>
            <?php echo $this->Html->link('Doctor',
            array('controller' => 'doctors', 'action' => 'doctorinfo')); ?>
        </td>
        <td>
            <?php echo $this->Html->link('Patient',
            array('controller' => 'patients', 'action' => 'patientinfo')); ?>
        </td>
        <td>
            <?php echo $this->Html->link('Take Appointment',
            array('controller' => 'appointments', 'action' => 'add')); ?>
        </td>

      </tr>
</table>