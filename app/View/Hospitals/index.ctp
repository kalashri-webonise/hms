<br><br>
<div align="right">
    <u><?php echo $this->Html->link('Logout',
        array('controller' => 'users', 'action' => 'logout')); ?></u>
</div>
<table>

    <tr>

        <td>
            <?php echo $this->Html->link('Hospital Registration',
            array('controller' => 'hospitals', 'action' => 'hospitalinfo')); ?>
        </td>
        <td>
            <?php echo $this->Html->link('Doctor Registration',
            array('controller' => 'doctors', 'action' => 'doctorinfo')); ?>
        </td>
        <td>
            <?php echo $this->Html->link('Patient Registration',
            array('controller' => 'patients', 'action' => 'patientinfo')); ?>
        </td>
        <td>
            <?php echo $this->Html->link('Appointment',
            array('controller' => 'appointments', 'action' => 'add')); ?>
        </td>

      </tr>
</table>