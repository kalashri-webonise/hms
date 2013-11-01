
<div>
    <u><?php echo $this->Html->link('Register',
        array('controller' => 'patients', 'action' => 'add')); ?></u>
</div>
<br>
<br>
<div align="right"><?php echo $this->Form->postLink(
    'Home',
    array('controller' => 'hospitals','action' => 'index'));
    ?></div>
<table>
    <tr>
        <th>Patient Name</th>


    </tr>


    <?php foreach ($patients as $patient): ?>
    <tr>

        <td>
            <?php echo $this->Html->link($patient['Patient']['first_name'].''.$patient['Patient']['last_name'],
            array('controller' => 'patients', 'action' => 'view', $patient['Patient']['id']),array('style'=>'margin:0 20% 0 0;')); ?>
            <?php echo $this->Html->link('Edit',
            array('controller' => 'patients', 'action' => 'edit', $patient['Patient']['id']),array('style'=>'margin:0 1% 0 0;')); ?>

            <?php echo $this->Form->postLink(
            'Delete',
            array('action' => 'delete', $patient['Patient']['id']),
            array('confirm' => 'Are you sure?'));
            ?>
        </td>

    </tr>
    <?php endforeach; ?>
    <?php unset($patient); ?>
</table>
