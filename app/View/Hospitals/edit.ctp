<?php   echo $this->Html->script('jquery-ui');?>
<div align="right"><?php echo $this->Html->Link(
    'Home',
    array('controller' => 'hospitals','action' => 'myaccount'));
    ?></div>
<h2 align="center" style="color:#b94a48">Hospital Registration</h2>
<?php
echo $this->Html->script('hospital.js');
echo $this->Form->create('Hospital');
?>
<div class="span7 offset2">


    <div class="" style="border:1px solid #b94a48;background-color:#bbbbbb">

        <table style="border:none;width:auto">
            <colgroup>
                <col width="40%"></col>
            </colgroup>
            <tr>
                <td style="width:300px">
                    <div class="control-group span2">
                        <?php
                        echo $this->Form->input('hospital_name');
                        ?>
                    </div>
                </td>
                <td style="width:300px">
                    <div class="control-group span2">
                        <?php
                        echo $this->Form->input('email');
                        ?>
                    </div>
                </td>

            </tr>
            <tr>
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
                        echo $this->Form->input('establish_date', array('class' => 'datepicker', 'id' => 'datepicker', 'type' => 'text', 'label' => 'Establish Date'));
                        ?>
                    </div>
                </td>
            </tr>
            <tr>


                <td style="width:300px">
                    <div class="control-group span2">
                        <?php
                        echo $this->Form->input('contact_no');
                        ?>
                </td>

                <td style="width:300px">
                    <div class="control-group span2">
                        <?php
                        echo $this->Form->input('address', array('rows' => '3'));
                        ?>
                </td>
            </tr>
            <tr>

                <td style="width:300px">
                    <div class="control-group span2">
                        <?php
                        echo $this->Form->input('country');
                        ?>
                </td>

                <td style="width:300px">
                    <div class="control-group span2">
                        <?php
                        echo $this->Form->input('state');?>
                </td>
            </tr>
            <tr>

                <td style="width:300px">
                    <div class="control-group span2">
                        <?php
                        echo $this->Form->input('city');
                        ?>
                </td>
            </tr>


        </table>

        <div align="center">
            <?php
            echo $this->Form->end(array('class' => 'btn btn-primary'));
            ?>
        </div>

        <?php
        echo $this->Form->input('registration_no', array('type' => 'hidden'));

        ?>

        <script>


            jQuery.validator.addMethod("lettersonly", function (value, element) {
                return this.optional(element) || /^[a-z]+$/i.test(value);

            }, "Letters only please");

            jQuery.validator.addMethod("address", function (value, element) {
                return this.optional(element) || /^[a-zA-Z0-9-\/] ?([a-zA-Z0-9-\/]|[a-zA-Z0-9-\/] )*[a-zA-Z0-9-\/]$/i.test(value);

            }, "Only letters,digits,single spaces,hyphen and slash allowed");

            $(function () {
                $('#HospitalAddForm').validate({

                    debug:false,
                    errorClass:"authError",
                    errorElement:"span",
                    rules:{

                        "data[Hospital][city]":{
                            lettersonly:true,
                            required:true

                        },
                        "data[Hospital][state]":{
                            lettersonly:true,
                            required:true

                        },
                        "data[Hospital][country]":{
                            lettersonly:true,
                            required:true

                        },
                        "data[Hospital][address]":{
                            required:true,
                            address:true
                        },

                        "data[Hospital][contact_no]":{
                            required:true,
                            number:true,
                            maxlength:20

                        },
                        "data[Hospital][hospital_name]":{
                            required:true,
                            alphanumeric:true

                        },

                        "data[Hospital][establish_date]":{

                            date:true

                        },
                        "data[Hospital][email]":{
                            required:true,
                            email:true

                        },
                        "data[Hospital][password]":{
                            required:true


                        }


                    }

                });

            });

            $('#datepicker').datepicker({
                maxDate:0,
                minDate:'-100Y'

            });
        </script>
