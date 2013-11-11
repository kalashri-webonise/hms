<div><div>
    <u><?php echo $this->Html->link('Register new Hospital',
        array('controller' => 'hospitals', 'action' => 'add')); ?></u>
</div>

    <div>
        <u><?php echo $this->Html->link('Register patient',
            array('controller' => 'patients', 'action' => 'add')); ?></u>
    </div>
    <div>
        <u><?php echo $this->Html->link('Register doctor',
            array('controller' => 'doctors', 'action' => 'add')); ?></u>
    </div>
</div>
<div class="users form">
    <?php echo $this->Session->flash('auth'); ?>
    <?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Please enter your username and password'); ?></legend>
        <?php echo $this->Form->input('email');
        echo $this->Form->input('password');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Login')); ?>
</div>
