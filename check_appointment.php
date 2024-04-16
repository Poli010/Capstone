<?php 
    require_once("dbcon.php");

    if($_SERVER['REQUEST_METHOD'] === "GET"){
        $technician_email = $_GET['technician_email'];
        $endUser_email = $_GET['endUser_email'];

        $sql = "SELECT technician_email FROM ongoing_appointment WHERE technician_email = '$technician_email'";
        $query = mysqli_query($conn, $sql);

        if(mysqli_num_rows($query) > 2){
            echo json_encode(['success' => false]);
        } 
        else {
            echo json_encode(['success' => true]);
        }
    }
?>
