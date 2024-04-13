<?php
require_once("dbcon.php");

if (isset($_POST['endUser_email'])) {
   
    $endUser_email = $_POST['endUser_email'];
    $endUser_name = $_POST['endUser_name'];
    $technician_email = $_POST['technician_email'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $status = "Ongoing";
    $appointmentId = $_POST['appointmentId'];

  
    $sql_insert = "INSERT INTO ongoing_appointment (endUser_email, endUser_name, technician_email, date, time, status) VALUES ('$endUser_email', '$endUser_name', '$technician_email', '$date', '$time', '$status')";

 
    if (mysqli_query($conn, $sql_insert)) {
      
        $sql_delete = "DELETE FROM appointment_list WHERE id = '$appointmentId'";
        if (mysqli_query($conn, $sql_delete)) {
            echo "Appointment accepted and added to ongoing appointments. Appointment removed from the list.";
        } else {
            echo "Error deleting appointment from the list: " . mysqli_error($conn);
        }
    } else {
       
        echo "Error accepting appointment and adding to ongoing appointments: " . mysqli_error($conn);
    }
} else {
   
    echo "Error: End User Email not provided.";
}
?>