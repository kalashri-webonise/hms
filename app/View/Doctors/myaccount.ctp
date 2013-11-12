
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
</br></br></br>

<h3 align='center'><ul>Registered Hospital List</ul></h3>

<fieldset>

    <table>


        <?php
        foreach ($hospitalList as $hospital): ?>
            <tr>

                <td>
                    <?php echo '<b>Hospital Name :</b>'.$this->Form->input($hospital['Hospital']['hospital_name'],
                    array('type'=>'label')); ?>
                </td> </tr>

            <tr><th>Department</th><th>Doctor Name</th></tr>
            <?php for($i=0;$i<count($hospital['Doctor']);$i++) { ?>
                <tr> <td>
                    <?php echo $hospital['Doctor'][$i]['department']; ?>

                </td>
                    <td>
                        <?php echo $hospital['Doctor'][$i]['first_name'].' '.$hospital['Doctor'][$i]['middle_name'].' '.$hospital['Doctor'][$i]['last_name']; ?>

                    </td></tr>
                <?php } ?>
            </tr>
            <?php endforeach; ?>
        <?php unset($hospital); ?>
    </table>
</fieldset>