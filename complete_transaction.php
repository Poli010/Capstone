<?php

require_once("dbcon.php");
if (isset($_POST['endUser_email'])) {
    
    $endUserEmail = $_POST['endUser_email'];
    $endUserName = $_POST['endUser_name'];
    $technicianEmail = $_POST['technician_email'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $appointmentId = $_POST['appointmentId'];
    $status = "Complete"; 

    
    $sqlInsert = "INSERT INTO successful_transactions (endUser_email, endUser_name, technician_email, date, time, status) VALUES ('$endUserEmail', '$endUserName', '$technicianEmail', '$date', '$time', '$status')";
    
    if (mysqli_query($conn, $sqlInsert)) {
        
        $sqlDelete = "DELETE FROM ongoing_appointment WHERE id = '$appointmentId'";
        if (mysqli_query($conn, $sqlDelete)) {
            
        } else {
           
        }
    } else {
       
    }
} else {
    
}
?>
