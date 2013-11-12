<?php   echo $this->Html->script('jquery-ui');?>
<script type="text/javascript">
    $(document).ready(function () {
        $('#AppointmentHospitalId').on('change', function () {
            // selected value
            var selected = this.value;
            $.ajax({
                url:'/appointments/ajax_fetch_doctor/' + selected,
                //   data: "id="+selected,
                type:'post',

                success:function (data) {
                    $('#ajax_doctor_id').html(data);

                }
            });
        });
        $('#datepicker').on('change', function () {
            // selected value
            var select = this.value;

            $.ajax({
                url:'/appointments/ajax_fetch_timeslot/' + select,

                type:'post',

                success:function (data) {

                    $('#ajax_time').html(data);

                }
            });
        });
    });

</script>
<div align="right"><h4><?php echo $this->html->Link(
    'Patient Home',
    array('controller' => 'patients', 'action' => 'myaccount'));
    ?></h4></div>
<div align="right"><h4><?php echo $this->html->Link(
    'Admin Home Page',
    array('controller' => 'hospitals', 'action' => 'index'));
    ?></h4></div>
<h2 align="center" style="color:#b94a48">Appointment</h2>
<?php
echo $this->Html->script('hospital');
?>
<div class="">


    <div class="" style="border:1px solid #b94a48;background-color:#bbbbbb">
        <?php echo $this->Form->create('Appointment'); ?>
        <table style="border:none">
            <tr>
                <td>
                    <div class="control-group span2">
                        <?php
                        echo $this->Form->input('hospital_id', array('type' => 'select', 'options' => $hospital_name, 'empty' => 'Select Hospital'));
                        ?>
                    </div>
                </td>

            </tr>
            <tr>
                <td>
                    <div class="control-group span2">
                        <div id="ajax_doctor_id">
                            <?php
                            echo $this->Form->input('doctor_id', array('type' => 'select', 'empty' => 'Select Doctor'));
                            ?>
                        </div>

                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="control-group span2">
                        <?php
                        echo $this->Form->input('name');
                        ?>
                    </div>
                </td>

            </tr>
            <tr>
                <td>
                    <div class="control-group span2">
                        <?php
                        echo $this->Form->input('email');
                        ?>
                    </div>
                </td>

            </tr>
            <tr>
                <td>
                    <div class="control-group span2">
                        <?php
                        echo $this->Form->input('contact_no');
                        ?>
                    </div>
                </td>

            </tr>
            <tr>

                <td>
                    <div class="control-group span2">
                        <?php
                        echo $this->Form->input('date', array('class' => 'datepicker', 'id' => 'datepicker', 'type' => 'text', 'label' => false, 'div' => false, 'label' => 'Date'));
                        ?>
                    </div>
                </td>

            </tr>
            <tr>
                <td>
                    <div class="control-group span2">
                        <div id="ajax_time">
                        <?php
                            echo $this->Form->input('time',array('type'=>'select','empty' => 'Select Time'));

                            ?>
                        </div>
                    </div>
                </td>
            </tr>

        </table>
        <div align="center">
            <?php echo $this->Form->end(array('class' => 'btn btn-primary')); ?>
        </div>
        <script>
            $(document).ready(function () {


                $.datepicker.setDefaults({ dateFormat:'yy-mm-dd'});

                $("#datepicker").datepicker({

                });
            });

        </script>