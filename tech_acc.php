<?php
    require_once("dbcon.php");
    $email = $_GET['email'];

    $sql = "SELECT * FROM technician_form WHERE email = '$email'";
    $query = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($query);
    $firstname = $row['first_name'];
    $lastname = $row['last_name'];
    $username = $row['username'];
    $contact = $row['contact_number'];
    $address = $row['address'];
    $time_availability = $row['time_availability'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-DHSKfqZk5y3YSyP2KN3x1yVvQRnwBM2SA8xl6fJP5xLWIkC3mE+BmMC5LBJxyCZ4NRC0JcD8d4yh7xRzpZt8ZQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="tech_acc.css">
    <title>User Page</title>
</head>
<body>
<div class="container">
        <h1>Technician Account</h1>
        <hr>
    <div class="info">
        <form action="upload.php" method="post" enctype="multipart/form-data">
          <div class="file-input-container">
                <input type="file" name="profilePictureInput" id="profilePictureInput">
          </div>    
                <br>
                <label for="profilePictureInput" id="uploadLabel">Choose a file</label>
                <button type="submit" id="submit">Upload</button>
                <a href="edit_profile.php" class="settings"><i class="fas fa-cog"></i>Account Settings</a>
        </form>
     </div>  
        <div class="data">
            <h3>First Name: <?php echo $firstname; ?></h3>
            <h3>Last Name: <?php echo $lastname; ?></h3>
            <h3>Username: <?php echo $username; ?></h3>
            <h3>Email: <?php echo $email; ?></h3>
            <h3>Contact#: <?php echo $contact; ?></h3>
            <h3>Address: <?php echo $address; ?></h3>
            <h3>Time Availability: <?php echo $time_availability; ?></h3>
         </div>
        <div class="btn-container">
            <a href="appointment_list.php?email=<?php echo urlencode($email); ?>" class="btn1">Appointment List</a>
            <a href="ongoing_appointment.php?email=<?php echo urlencode($email); ?>" class="btn6">Ongoing</a>
            <a href="#" class="btn2">Succesful Transaction</a>
            <a href="#" class="btn3">Feedback</a>
            <a href="#" class="btn4">Chat</a>
            <br>
            <a href="logout.php" class="btn5">LOGOUT</a>
         </div>
    </div>

    </div>
    </body>
    </html>