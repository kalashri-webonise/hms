<div align="right"><h4><?php echo $this->html->Link(
    'Home',
    array('controller' => 'doctors', 'action' => 'myaccount'));
    ?></h4></div>
<?php
echo $this->Html->css('reset');
echo $this->Html->css('jquery-ui-1.8rc3.custom');
echo $this->Html->css('jquery.weekcalendar');
echo $this->Html->css('demo');
//pr($as);exit;
?>
<!--<script>

    var app='<?php /*echo $as; */?>';

</script>-->

<?php
echo $this->Html->script('jquery.min.js');
echo $this->Html->script('jquery-ui-1.8rc3.custom.min');
echo $this->Html->script('jquery.weekcalendar');
//    echo $this->Html->script('demo');
?>
<?php
echo $this->Html->script('hospital');
?>
<h1>Appointment List</h1>
<?php echo $this->element('appointment');?>
<div id='calendar'></div>
<div id="event_edit_container">
    <form id="DoctorCalendarForm">
        <input type="hidden" />
        <ul>
            <li>
                <span>Date: </span><span class="date_holder"></span>
            </li>

            <li>
                <?php
                echo $this->Form->input('name');
                ?>
            </li>
            <li>
                <?php
                echo $this->Form->input('email');
                ?>
            </li>
            <li>
                <?php
                echo $this->Form->input('contact_no');
                ?>
            </li>
            <li>
                <?php
                echo $this->Form->input('date', array('class' => 'datepicker', 'id' => 'datepicker', 'type' => 'text', 'label' => false,  'label' => 'Date'));
                ?>
            </li>
            <li>
                <div id="ajax_time">
                    <?php
                    echo $this->Form->input('time',array('type'=>'select','empty' => 'Select Time'));

                    ?>
                </div>
            </li>
        </ul>
    </form>
</div>


</body>

</html>
