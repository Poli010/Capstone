<?php

require_once("dbcon.php");
if (isset($_POST['endUser_email'])) {
    $price = $_POST['price'];
    $endUserEmail = $_POST['endUser_email'];
    $endUserName = $_POST['endUser_name'];
    $technicianEmail = $_POST['technician_email'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $appointmentId = $_POST['appointmentId'];
    $status = "Complete"; 
    $type_of_service = $_POST['type_of_service'];
    $complete = '1';

    
    $sqlInsert = "INSERT INTO successful_transactions (endUser_email, endUser_name, technician_email, type_of_service, date, time, status, cost_of_repair) VALUES ('$endUserEmail', '$endUserName', '$technicianEmail','$type_of_service', '$date', '$time', '$status', '$price')";

    
    if (mysqli_query($conn, $sqlInsert)) {
        
        $sqlDelete = "DELETE FROM ongoing_appointment WHERE id = '$appointmentId'";
        if (mysqli_query($conn, $sqlDelete)) {
            $sql = "INSERT INTO able_comment VALUES('','$endUserEmail','$technicianEmail','$complete')";
            $query = mysqli_query($conn, $sql);
            
        } else {
           
        }
    } else {
       
    }
} else {
    
}
?>
