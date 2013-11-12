<?php   echo $this->Html->script('jquery-ui');?>

<h2 align="center" style="color:#b94a48">Doctor Registration</h2>
<?php
echo $this->Html->script('hospital.js');
echo $this->Form->create('Doctor');
?>
<div class="">


<div class="" style="border:1px solid #b94a48;background-color:#bbbbbb">

<table style="border:none">
    <tr>
        <td style="width:300px">
            <div class="control-group span2">
                <?php
                echo $this->Form->input('registration_no',array('type' => 'hidden'));
                ?>
            </div>
        </td>
    </tr>
    <tr>
        <td style="width:300px">
            <div class="control-group span2">
                <?php
                echo $this->Form->input('first_name');
                ?>
            </div>
        </td>
        <td style="width:300px">
            <div class="control-group span2">
                <?php
                echo $this->Form->input('middle_name');
                ?>
            </div>
        </td>
        <td style="width:300px">
            <div class="control-group span2">
                <?php
                echo $this->Form->input('last_name');
                ?>
            </div>
        </td>

    </tr>
    <tr>
        <td style="width:300px">
            <div class="control-group span2">
                <?php
                echo $this->Form->input('email');
                ?>
            </div>
        </td>
        <td style="width:300px">
            <div class="control-group span2">
                <?php
                echo $this->Form->input('password',array('type'=>'password'));
                ?>
            </div>
        </td>


    </tr>
    <tr>
        <td style="width:300px">
            <div class="control-group span2">
                <?php
                echo $this->Form->input('education');
                ?>
            </div>
        </td>
        <td style="width:300px">
            <div class="control-group span2">
                <?php
                echo $this->Form->input('specialization');
                ?>
            </div>
        </td>
        <td style="width:300px">
            <div class="control-group span2">
                <?php
                echo $this->Form->input('year_of_exp');
                ?>
            </div>
        </td>
    </tr>
    <tr>


        <td style="width:300px">
            <div class="control-group span2">
                <?php
                echo $this->Form->input('country');
                ?>
            </div>
        </td>
        <td style="width:300px">
            <div class="control-group span2">
                <?php
                echo $this->Form->input('state');
                ?>
            </div>
        </td>
        <td style="width:300px">
            <div class="control-group span2">
                <?php
                echo $this->Form->input('city');
                ?>
            </div>
        </td>


    </tr>
    <tr>
        <td style="width:300px">
            <div class="control-group span2">
                <?php
                echo $this->Form->input('mobile_no');
                ?>
            </div>
        </td>
        <td style="width:300px">
            <div class="control-group span2">
                <?php
                echo $this->Form->input('hospital_id', array('type' => 'select'));
                ?>
            </div>
        </td>
        <td style="width:300px">
            <div class="control-group span2">
                <?php
                echo $this->Form->input('department', array('type' => 'select' ,'options'=>array('cancer'=>'cancer','Orthopedic'=>'Orthopedic','Heart'=>'Heart'),'empty' => 'Select department'));
                ?>
            </div>
        </td>
    </tr>
    <tr>
        <td style="width:300px">
            <div class="control-group span2">
                <?php
                echo $this->Form->input('address', array('rows' => '3'));
                ?>
            </div>
        </td>
    </tr>
</table>
<div align="center">
    <?php echo $this->Form->end(array('class'=>'btn btn-primary')); ?>
</div>
<script>


    jQuery.validator.addMethod("lettersonly", function(value, element) {
        return this.optional(element) || /^[a-z]+$/i.test(value);

    }, "Letters only please");

    jQuery.validator.addMethod("address", function(value, element) {
        return this.optional(element) || /^[a-zA-Z0-9-\/] ?([a-zA-Z0-9-\/]|[a-zA-Z0-9-\/] )*[a-zA-Z0-9-\/]$/i.test(value);

    }, "Only letters,digits,single spaces,hyphen and slash allowed");

    $(function () {
        $('#DoctorAddForm').validate({

            debug:false,
            errorClass:"authError",
            errorElement:"span",
            rules:{
                "data[Doctor][first_name]":{
                    required:true,
                    lettersonly: true

                },
                "data[Doctor][last_name]":{
                    required:true,
                    lettersonly: true

                },
                "data[Doctor][middle_name]":{
                    required:true,
                    lettersonly: true

                },

                "data[Doctor][email]":{
                    required:true,
                    email:true

                },
                "data[Doctor][address]":{
                    required:true,
                    address:true

                },

                "data[Doctor][mobile_no]":{
                    required:true,
                    number:true,
                    maxlength:20
                },
                "data[Doctor][education]":{

                    required:true

                },
                "data[Doctor][specialization]":{
                    lettersonly: true,
                    required:true

                },
                "data[Doctor][year_of_exp]":{
                    number:true,
                    required:true


                },
                "data[Doctor][department]":{
                    required:true
                },

                "data[Doctor][city]":{
                    lettersonly: true,
                    required:true

                },
                "data[Doctor][state]":{
                    lettersonly: true,
                    required:true

                },
                "data[Doctor][country]":{
                    lettersonly: true,
                    required:true

                },
                "data[Doctor][hospital_id]":{
                    required:true

                },
                "data[Doctor][password]":{
                    required:true

                }
            }

        });

    });
</script>


