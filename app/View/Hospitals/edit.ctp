<div align="right"><h4><?php echo $this->html->Link(
    'Home',
    array('action' => 'index'));
    ?></h4></div>
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
                        echo $this->Form->input('confirm_password',array('type'=>'password'));
                        ?>
                    </div>
                </td>

            </tr>
            <tr>

                <td style="width:300px">
                    <div class="control-group span2">
                        <?php
                        echo $this->Form->input('establish_date', array('class' => 'datepicker1', 'id' => 'dp4', 'type' => 'text', 'label' => 'Establish Date'));
                        ?>
                    </div>
                </td>
                <td style="width:300px">
                    <div class="control-group span2">
                        <?php
                        echo $this->Form->input('contact_no');
                        ?>
                </td>
            </tr>
            <tr>

                <td style="width:300px">
                    <div class="control-group span2">
                        <?php
                        echo $this->Form->input('address', array('rows' => '3'));
                        ?>
                </td>
                <td style="width:300px">
                    <div class="control-group span2">
                        <?php
                        echo $this->Form->input('country');
                        ?>
                </td>
            </tr>
            <tr>

                <td style="width:300px">
                    <div class="control-group span2">
                        <?php
                        echo $this->Form->input('state');?>
                </td>
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

    $(function () {
        $('#HospitalAddForm').validate({

            debug:false,
            errorClass:"authError",
            errorElement:"span",
            rules:{

				"data[Hospital][city]":{

                    required:true

                },
                "data[Hospital][state]":{

                    required:true

                },
                "data[Hospital][country]":{

                    required:true

                },
                 "data[Hospital][address]":{
                    required:true

                },
              
                "data[Hospital][contact_no]":{
					required:true,
                    number:true
                 
                },
                 "data[Hospital][hospital_name]":{
                    required:true

                },
              
                "data[Hospital][establish_date]":{
					required:true,
                    number:true,
                    maxlength:20
                },
                "data[Hospital][registration_no]":{
					required:true,
                    number:true,
                    maxlength:20
                }
                 }
                
                });

		});
                </script>
