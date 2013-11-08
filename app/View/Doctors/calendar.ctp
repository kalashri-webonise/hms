<div align="right"><h4><?php echo $this->html->Link(
    'Home',
    array('controller' => 'hospitals', 'action' => 'index'));
    ?></h4></div>
<?php
echo $this->Html->css('reset');
echo $this->Html->css('jquery-ui-1.8rc3.custom');
echo $this->Html->css('jquery.weekcalendar');
echo $this->Html->css('demo');
?>
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js'></script>
<?php
    echo $this->Html->script('jquery-ui-1.8rc3.custom.min');
    echo $this->Html->script('jquery.weekcalendar');
    echo $this->Html->script('demo');
?>

<h1>Appointment List</h1>

<div id='calendar'></div>
<div id="event_edit_container">
    <form>
        <input type="hidden" />
        <ul>
            <li>
                <span>Date: </span><span class="date_holder"></span>
            </li>
            <li>
                <label for="start">Start Time: </label><select name="start"><option value="">Select Start Time</option></select>
            </li>
            <li>
                <label for="end">End Time: </label><select name="end"><option value="">Select End Time</option></select>
            </li>
            <li>
                <label for="title">Title: </label><input type="text" name="title" />
            </li>
            <li>
                <label for="body">Body: </label><textarea name="body"></textarea>
            </li>
        </ul>
    </form>
</div>


</body>
</html>
