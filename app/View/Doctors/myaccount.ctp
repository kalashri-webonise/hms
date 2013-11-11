
<div align="right">
    <u><?php echo $this->Html->link('Logout',
        array('controller' => 'users', 'action' => 'logout')); ?></u>
</div>


<br>
<br>

<table>
    <tr>
        <th>Doctor Name</th>


    </tr>



    <tr>

        <td>
            <?php echo $this->Html->link($users['Doctor']['first_name'].''.$users['Doctor']['last_name'],
            array('controller' => 'doctors', 'action' => 'view',$users['Doctor']['id']),array('style'=>'margin:0 20% 0 0;')); ?>
            <?php echo $this->Html->link('Edit',
            array('controller' => 'doctors', 'action' => 'edit', $users['Doctor']['id']),array('style'=>'margin:0 1% 0 0;')); ?>
            <?php echo $this->Html->link('Appointment',array('controller' => 'doctors', 'action' => 'calendar', $users['Doctor']['id']),array('style'=>'margin:0 1% 0 0;')); ?>
            <?php echo $this->Form->postLink(
            'Delete',
            array('action' => 'delete', $users['Doctor']['id']),
            array('confirm' => 'Are you sure?'));
            ?>

        </td>

    </tr>

</table>
