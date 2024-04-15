<?php
    require_once("dbcon.php");
    $email = $_GET['email'];

    $sql = "SELECT * FROM ongoing_appointment WHERE technician_email = '$email'";
    $query = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment List</title>
    <link rel="website icon" href="icon/icon.png" type="png">
    <link rel="stylesheet" href="appointment_list.css">
    <script src="https://kit.fontawesome.com/355342439a.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container" id="container">
        <h1>Ongoing Appointment <i class="fa-solid fa-calendar-check"></i></h1>
        <div class="header">
            <label for="">Client Name:</label>
            <label for="">Date:</label>
            <label for="">Time:</label>
            <label for="">Status:</label>
            <label for="">Action:</label>
        </div>
        <hr>
        <?php
                while($row = mysqli_fetch_assoc($query)){
            ?>
        <div class="info">

            <p><?php echo $row['endUser_name'] ?></p>
            <p><?php echo date("F j, Y", strtotime($row['date'])); ?></p>
            <p><?php echo $row['time'] ?> </p>
            <p><?php echo $row['status'] ?></p>
            <button class="action_btn" onclick="show('message_collapse_<?php echo $row['id']; ?>','icon_<?php echo $row['id']; ?>','<?php echo $row['technician_email'] ?>','<?php echo $email ?>')"><i id="icon_<?php echo $row['id']; ?>" class="fa-solid fa-arrow-down"></i></button>
        </div>
        <div class="message" id="message_collapse_<?php echo $row['id']; ?>">
           
            <div class="contact">
                <p><i class="fa-solid fa-envelope"></i> <?php echo $row['endUser_email'] ?></p>
                <button class="acceptBtn" onclick="accept('<?php echo $row['endUser_email']; ?>', '<?php echo $row['endUser_name']; ?>', '<?php echo $row['technician_email']; ?>', '<?php echo $row['date']; ?>', '<?php echo $row['time']; ?>', '<?php echo $row['id']; ?>')">Complete</button>
                <button class="cancelBtn" onclick="cancelbook()">Cancel Book</button>
                <input type="hidden" id="technician_email" value="<?php echo $row['technician_email'] ?>">
            </div>
            
        </div>
        <hr>
        <?php
            }
        ?>
    </div>
    <div class="cancel_modal" id="cancel_modal">
        <h1>Are you sure you want to cancel your book?</h1>
        <div class="modal_button">
            <form action="appointment_cancelBook.php" method="post">
                <button class="btnYes" name="submit" onclick="delete_book()">Yes</button>
                <button class="btnNo" type="button" onclick="close_modal()">No</button>
                <input type="hidden" name="techa" id="techa" value="">
                <input type="hidden" name="endUser_email" id="endUser_email" value="">
            </form>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="ongoing_appointment.js"></script>
</body>
</html>