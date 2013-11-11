
<div align="right">
    <u><?php echo $this->Html->link('Logout',
        array('controller' => 'users', 'action' => 'logout')); ?></u>
</div>


<br>
<br>
<table>
    <tr><td>
        <?php echo $this->Html->link('Take an appointment',
        array('controller' => 'appointments', 'action' => 'add')); ?>
    </td></tr>
</table>
<table>
    <tr>
        <th>Patient Name</th>


    </tr>



    <tr>

        <td>
            <?php echo $this->Html->link($users['Patient']['first_name'].''.$users['Patient']['last_name'],
            array('controller' => 'patients', 'action' => 'view',$users['Patient']['id']),array('style'=>'margin:0 20% 0 0;')); ?>
            <?php echo $this->Html->link('Edit',
            array('controller' => 'patients', 'action' => 'edit', $users['Patient']['id']),array('style'=>'margin:0 1% 0 0;')); ?>

            <?php echo $this->Form->postLink(
            'Delete',
            array('action' => 'delete', $users['Patient']['id']),
            array('confirm' => 'Are you sure?'));
            ?>

        </td>

    </tr>

</table>
