<?php
    require_once("dbcon.php");
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'C:\xampp\htdocs\Capstone\PHPMailer\src\Exception.php';
    require 'C:\xampp\htdocs\Capstone\PHPMailer\src\PHPMailer.php';
    require 'C:\xampp\htdocs\Capstone\PHPMailer\src\SMTP.php';

    if(isset($_POST['submit'])){
        $endUser_email = $_POST['endUser_email'];
        $endUser_name = $_POST['endUser_name'];
        $endUser_message = $_POST['endUser_message'];
        $technician_email = $_POST['technician_email'];
        $technician_name = $_POST['technician_name'];
        $technician_message = $_POST['technician_message'];
        $technician_contact = $_POST['technician_contact'];
        $technician_social = $_POST['technician_social'];
        $time = $_POST['time'];
        $date = $_POST['date'];
        $service = $_POST['ipapagawa'];
        $pending = $_POST['pending'];
        
        $sql = "INSERT INTO appointment_list VALUES('','$endUser_email','$endUser_name','$endUser_message','$technician_email','$technician_name','$technician_message','$technician_contact','$technician_social','$time','$date','$service','$pending')";
        $query = mysqli_query($conn, $sql);

        if($query){
            $mail = new PHPMailer(true);

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth=true;
            $mail ->Username = 'electroniclocatorservice@gmail.com';
            $mail ->Password = 'bjwlvkfcfkglpgqa';
            $mail ->SMTPSecure='ssl';
            $mail ->Port='465';
            $mail ->setFrom('electroniclocatorservice@gmail.com','Electronic Locator Service');

            $mail->addAddress($_POST['technician_email']);
            $mail->isHTML(true);
            $mail->Subject = "You have new appointment";
            $mail->Body =  ucwords($endUser_name). " Says: <strong>$service</strong>, open your account and go to appointment page to accept this request";
        
            $mail->send();
            
            header("Location:endUser_page.php?email=$endUser_email");
        }

    }

?>