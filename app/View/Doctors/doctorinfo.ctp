



<br>
<br>
<div align="right"><?php echo $this->Form->postLink(
    'Home',
    array('controller' => 'hospitals','action' => 'index'));
    ?></div>
<table>
    <tr>
        <th>Doctor Name</th>


    </tr>


    <?php foreach ($doctors as $doctor): ?>
    <tr>

        <td>
            <?php echo $this->Html->link($doctor['Doctor']['first_name'].''.$doctor['Doctor']['last_name'],
            array('controller' => 'doctors', 'action' => 'view', $doctor['Doctor']['id']),array('style'=>'margin:0 20% 0 0;')); ?>
            <?php echo $this->Html->link('Edit',
            array('controller' => 'doctors', 'action' => 'edit', $doctor['Doctor']['id']),array('style'=>'margin:0 1% 0 0;')); ?>
            <?php echo $this->Html->link('Appointment',array('controller' => 'doctors', 'action' => 'calendar', $doctor['Doctor']['id']),array('style'=>'margin:0 1% 0 0;')); ?>
            <?php echo $this->Form->postLink(
            'Delete',
            array('action' => 'delete', $doctor['Doctor']['id']),
            array('confirm' => 'Are you sure?'));
            ?>
        </td>

    </tr>
    <?php endforeach; ?>
    <?php unset($doctor); ?>
</table>
