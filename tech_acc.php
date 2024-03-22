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
                <h3>Fullname:</p>
                <h3>Username: </p>
                <h3>Email: </p>
                <h3>Contact#:</p>
                <h3>Address:</p>
                <h3>Time Availability:</p>
            </div>
        <div class="btn-container">
            <a href="#" class="btn1">Appointment List</a>
            <a href="#" class="btn6">Ongoing</a>
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