
<div align="right">
    <u><?php echo $this->Html->link('Logout',
        array('controller' => 'users', 'action' => 'logout')); ?></u>
</div>


<br>
<br>

<table>
    <tr>
        <th>Hospital Name</th>


    </tr>



    <tr>

        <td>
            <?php echo $this->Html->link($users['Hospital']['hospital_name'],
            array('controller' => 'hospitals', 'action' => 'view',$users['Hospital']['id']),array('style'=>'margin:0 20% 0 0;')); ?>
            <?php echo $this->Html->link('Edit',
            array('controller' => 'hospitals', 'action' => 'edit', $users['Hospital']['id']),array('style'=>'margin:0 1% 0 0;')); ?>

            <?php echo $this->Form->postLink(
            'Delete',
            array('action' => 'delete', $users['Hospital']['id']),
            array('confirm' => 'Are you sure?'));
            ?>

        </td>

    </tr>

</table>