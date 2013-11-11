<div>




    <br>
    <div align="right"><?php echo $this->Form->postLink(
        'Home',
        array('action' => 'index'));
        ?></div>
    <table>
        <tr>
            <th>Hospital Name</th>


        </tr>


        <?php foreach ($hospitals as $hospital): ?>
        <tr>

            <td>
                <?php echo $this->Html->link($hospital['Hospital']['hospital_name'],
                array('controller' => 'hospitals', 'action' => 'view', $hospital['Hospital']['id']),array('style'=>'margin:0 20% 0 0;')); ?>
                <?php echo $this->Html->link('Edit',
                array('controller' => 'hospitals', 'action' => 'edit', $hospital['Hospital']['id']),array('style'=>'margin:0 1% 0 0;')); ?>

                <?php echo $this->Form->postLink(
                'Delete',
                array('action' => 'delete', $hospital['Hospital']['id']),
                array('confirm' => 'Are you sure?'));
                ?>
            </td>

        </tr>
        <?php endforeach; ?>
        <?php unset($hospital); ?>
    </table>
</div>
