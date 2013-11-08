$(document).ready(function() {

    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd'

    });

    $('.datepicker1').datepicker({

         format: 'yyyy-mm-dd'
       //  endDate:'-1d',
      //  daysOfWeekDisabled:'[0,6]'

    });


});
function disablInput()
{
    if(document.getElementById('PatientPreviouslyVisited').checked)
    {
        document.getElementById('PatientDepartment').disabled=false;

        document.getElementById('PatientLastAppointmentDateMonth').disabled=false;
        document.getElementById('PatientLastAppointmentDateDay').disabled=false;
        document.getElementById('PatientLastAppointmentDateYear').disabled=false;

    }
    else if(document.getElementById('PatientPreviouslyVisited').checked!=true)
    {
        document.getElementById('PatientDepartment').disabled=true;

        document.getElementById('PatientLastAppointmentDateMonth').disabled=true;
        document.getElementById('PatientLastAppointmentDateDay').disabled=true;
        document.getElementById('PatientLastAppointmentDateYear').disabled=true;

    }



}
function disease()
{
    if(document.getElementById('PatientDisease').checked)
    {
        document.getElementById('medicalHistory').style.display="inline";

}
    if(document.getElementById('PatientDisease').checked!=true)
    {
        document.getElementById('medicalHistory').style.display="none";

    }
    }
