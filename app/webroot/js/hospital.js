$(document).ready(function() {


    $.datepicker.setDefaults({ dateFormat:'yy-mm-dd'});
    $('#datepicker').datepicker({
     minDate:0

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
