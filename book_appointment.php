<?php
    require_once("dbcon.php");
    if($_SERVER["REQUEST_METHOD"]==="POST"){
        $endUser_email = $_POST['endUser_email'];
        $endUser_message = $_POST['endUser_message'];
        $tech = $_POST['tech'];
        $technician_message = $_POST['technician_message'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $technician_name = $_POST['technician_name'];
        $endUser_name = $_POST['endUser_name'];
        $pending = $_POST['pending'];
        $technician_contact = $_POST['technician_contact'];
        $technician_social = $_POST['technician_social'];

        $sql = "INSERT INTO appointment_list VALUES ('','$endUser_email','$endUser_name','$endUser_message','$tech','$technician_name','$technician_message','$date' , '$time','$technician_contact','$technician_social','$pending')";
        $query = mysqli_query($conn, $sql);

        if($query){
            echo json_encode(['success' => true]);
        }
    }

?>