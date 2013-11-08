<?php   echo $this->Html->script('jquery-ui');?>
<div align="right"><h4><?php echo $this->html->Link(
    'Home',
    array('controller' => 'hospitals', 'action' => 'index'));
    ?></h4></div>
<h2 align="center" style="color:#b94a48">Patient Registration</h2>
<?php
echo $this->Html->script('hospital.js');
echo $this->Form->create('Patient');
?>



<div class="">


    <div class="" style="border:1px solid #b94a48;background-color:#bbbbbb">
        <label><h3 is='lbl' align="center"><b>Personal Details</b></h3></label>
        <?php echo $this->Form->create('Patient',array('type' => 'file')); ?>
        <table style="border:none">
            <tr>

                <td style="width:300px">
                    <div class="control-group span2">
                        <?php
                        echo $this->Form->input('first_name', array('div' => false));
                        ?>
                    </div>
                </td>
                <td style="width:300px">
                    <div class="control-group span2">


                        <?php
                        echo $this->Form->input('middle_name', array('div' => false));
                        ?>

                    </div>
                </td>

                <td style="width:300px">
                    <div class="control-group span2">


                        <?php
                        echo $this->Form->input('last_name', array('div' => false)); ?> </div>
                </td>


            </tr>
            <tr>

                <td style="width:300px">
                    <div class="control-group span2">
                        <?php
                        echo $this->Form->input('country', array('div' => false));
                        ?>
                    </div>
                </td>
                <td>
                    <div class="control-group span2 "><?php  echo $this->Form->input('state', array('div' => false)); ?></div>
                </td>
                <td>
                    <div class="control-group span2"><?php echo $this->Form->input('city', array('div' => false)); ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width:300px">
                    <div class="control-group span2">

                        <?php
                        echo $this->Form->input('address', array('rows' => '3', 'div' => false));
                        ?>
                    </div>
                </td>

                <td style="width:300px">
                    <div class="control-group span2">
                        <?php

                        echo $this->Form->input('mob1', array('div' => false));
                        ?>
                    </div>
                </td>
                <td style="width:300px">
                    <div class="control-group span2">
                        <?php
                        echo $this->Form->input('mob2', array('div' => false));
                        ?>
                    </div>
                </td>
            </tr>
            <tr>

                <td style="width:300px">
                    <div class="control-group span2">
                        <?php

                        echo $this->Form->input('email', array('div' => false));
                        ?> </div>
                </td>
                <td style="width:300px">
                    <div class="control-group span2">
                        <?php
                        echo $this->Form->input('password',array('type'=>'password'));
                        ?>
                    </div>
                </td>
                <td style="width:300px">
                    <div class="control-group span2">
                        <?php
                        echo $this->Form->input('confirm_password',array('type'=>'password'));
                        ?>
                    </div>
                </td>
            </tr>
        </table>

    </div>


    <div class="" style="border:1px solid #b94a48;background-color:#bbbbbb"">
    <label><h3 is='lbl' align="center"><b>Medical Details</b></h3></label>
    <table style="border:none" id="medicalHistory">
        <tr>
            <td style="width:300px">
                <div class="control-group span2">
                    <?php
                    echo $this->Form->input('disease_name', array('div' => false)); ?>
                </div>
            </td>
            <td style="width:300px">
                <div class="control-group span2">
                    <?php
                    echo $this->Form->input('hospital_name', array('div' => false)); ?>
                </div>
            </td>

            <td style="width:300px">
                <div class="control-group span2">
                    <?php
                    echo $this->Form->input('year_of_suffering', array('div' => false)); ?>
                </div>
            </td>


        </tr>
        <tr>

            <td style="width:300px">
                <div class="control-group span2">
                    <?php
                    echo $this->Form->input('consulting_doctor', array('div' => false));  ?>
                </div>
            </td>
            <td style="width:300px">
                <div class="control-group span2" id='dept'>
                    <?php
                    echo $this->Form->input('department', array('div' => false)); ?>

                </div>
            </td>
            <td style="width:300px">
                <div class="control-group span2">
                    <?php

                    echo $this->Form->input('contact_no', array('div' => false));

                    ?>
                </div>
            </td>

        </tr>
        <tr>
            <td style="width:300px">
                <div class="control-group span2">
                    <?php
                    echo $this->Form->input('start_year_of_treatment', array('div' => false));
                    ?>
                </div>
            </td>
            <td style="width:300px">
                <div class="control-group span2" id='LstAppointment'>
                    <?php

                    echo $this->Form->input('previous_visit_date', array('class' => 'datepicker', 'id' => 'dp4', 'type' => 'text', 'label' => false, 'div' => false, 'label' => 'Previous Visit Date')); ?>

                </div>
            </td>
            <td style="width:300px">
                <div class="control-group span2">
                    <?php
                    echo $this->Form->input('report',array('type'=>'file'));
                    ?>
            </td>
        </tr>
    </table>


</div>


<div align='center'>
    <?php
    echo $this->Form->end(array('class' => 'btn btn-primary', array('div' => false)));  ?>
</div>

</div>
<?php
echo $this->Form->input('registration_no', array('div' => false,'type' => 'hidden'));
?>


<!--  <td style="width:300px">
                    <div class="control-group span2">

                        <?php

//  echo $this->Form->input('previously_visited',array('type'=>'checkbox','div' => false,'onclick'=>'disablInput();','checked'=>'checked')); ?>
                    </div>
                </td>  -->
<script>
    jQuery.validator.addMethod("lettersonly", function(value, element) {
        return this.optional(element) || /^[a-z]+$/i.test(value);

    }, "Letters only please");
    jQuery.validator.addMethod("alphanumeric", function(value, element) {
        return this.optional(element) || /^[a-z0-9]*$/i.test(value);

    }, "Only Letters and digits allowed");

    jQuery.validator.addMethod("address", function(value, element) {
        return this.optional(element) || /^[a-zA-Z0-9-\/] ?([a-zA-Z0-9-\/]|[a-zA-Z0-9-\/] )*[a-zA-Z0-9-\/]$/i.test(value);

    }, "Only letters,digits,single spaces,hyphen and slash allowed");


    $(function () {
        $('#PatientAddForm').validate({

            debug:false,
            errorClass:"authError",
            errorElement:"span",
            rules:{
                "data[Patient][first_name]":{
                    required:true,
                    lettersonly: true


                },
                "data[Patient][last_name]":{
                    required:true,
                    lettersonly: true


                },
                "data[Patient][middle_name]":{
                    required:true,
                    lettersonly: true


                },

                "data[Patient][email]":{
                    required:true,
                    email:true

                },
                "data[Patient][address]":{
                    required:true,
                    address:true

                },
                "data[Patient][mob1]":{
                    required:true,
                    number:true,
                    maxlength:20
                },
                "data[Patient][mob2]":{

                    number:true,
                    maxlength:20
                },
                "data[Patient][disease_name]":{

                    required:true,
                    lettersonly: true

                },
                "data[Patient][year_of_suffering]":{

                    number:true

                },
                "data[Patient][hospital_name]":{

                    alphanumeric:true

                },
                "data[Patient][consulting_doctor]":{

                },
                "data[Patient][contact_no]":{
                    number:true,
                    maxlength:20
                },

                "data[Patient][start_year_of_treatment]":{

                    number:true

                },
                "data[Patient][previous_visit_date]":{

                    date:true
                },

                "data[Patient][city]":{

                    required:true

                },
                "data[Patient][state]":{

                    required:true

                },
                "data[Patient][country]":{

                    required:true

                },
                "data[Patient][department]":{
                    lettersonly: true

                }
            }

        });

    });
</script>
