<?php
    require_once("dbcon.php");

    if(isset($_POST['submit'])){
        $techa = $_POST['techa'];
        $endUser_email = $_POST['endUser_email'];
        

        $sql = "DELETE FROM appointment_list WHERE technician_email = '$techa'";
        $delete = mysqli_query($conn, $sql);

        if($delete){
            header("Location: endUser_page.php?email=$endUser_email");
        }
    }
?>