<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply as Technician?</title>
    <link rel="stylesheet" href="technician.css">
    <link rel="website icon" href="icon/icon.png" type="png">
    <script src="https://kit.fontawesome.com/355342439a.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container" id="container">
        <div class="title">
            <h1>Apply As Technician?</h1>
            <p>Please Fill up the form below:</p>
        </div>
        <div class="application_form">
            <form action="technician_signup.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="technician" value="technician">
                <div class="name">
                    <label for="technician">Position:</label>
                    <select name="technician_position" id="" required>
                        <option value=""></option>
                        <option value="Electrician">Electrician</option>
                        <option value="Computer Technician">Computer Technician</option>
                    </select>
                    <label for="firstname">First Name:</label>
                    <input type="text" name="firstname" autocomplete="off" required>
                    <label for="lastname">Last Name:</label>
                    <input type="text" name="lastname" autocomplete="off" required>
                </div>

                <div class="address">
                    <label for="address">Address:</label>
                    <input type="text" name="address" autocomplete="off" required>
                    <label for="baranggay">Baranggay:</label>
                    <input type="text" name="baranggay" autocomplete="off" required>
                    <label for="province">Province:</label>
                    <input type="text" name="province" autocomplete="off" required>
                </div>

                <div class="social_resume">
                    <label for="date">Birthday:</label>
                    <input type="date" name="birthday" class="bday" autocomplete="off" required>
                    <label for="contact_number">Contact Number:</label>
                    <input type="number" name="contact_number" id="contact_number" maxlength="11" autocomplete="off" required>
                    <label for="social">Social Media Link:</label>
                    <input type="text" name="social" id="social" autocomplete="off" required>
                </div>

                <div class="accounts">
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="email" class="email" autocomplete="off" required>
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" class="username" autocomplete="off" required>
                    <label for="password ">Password:</label>
                    <input type="password" name="password" id="password" class="password" autocomplete="off" required>
                    <label for="confirm_password">Confirm Password:</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="confirm_password" autocomplete="off" required>
                </div>
                
                <div class="photos">
                    <div class="profile_photo">
                        <label for="">Profile Picture: </label>
                        <input type="file" name="profile" id="profile_input" autocomplete="off" requiredrequired>
                        <label for="profile_input" class="profile"><i class="fa-solid fa-image"></i> Upload Profile</label>
                    </div>

                    <div class="valid_id">
                        <label for="">Valid ID:</label>
                        <input type="file" name="valid" id="valid" autocomplete="off" requiredrequired>
                        <label for="valid" class="ID"><i class="fa-solid fa-id-card"></i> Upload Valid ID</label>
                    </div>
                    
                    <div class="business_permit">
                        <label for="">Business Permit:</label>
                        <input type="file" name="business_permit" id="business_permit" autocomplete="off" requiredrequired>
                        <label for="business_permit" class="business"><i class="fa-solid fa-paperclip"></i> Upload Business Permit</label>
                    </div>

                    <div class="curriculum_vitae">
                        <label for="">Curriculum Vitae:</label>
                        <input type="file" name="resume" id="resume" autocomplete="off" requiredrequired>
                        <label for="resume" class="upload_cv"><i class="fa-regular fa-file"></i> Upload CV</label>
                    </div>
                </div>

                <div class="chosen_files">
                    <div class="file_name" id="file_name">No Chosen File</div>
                    <div class="file_valid" id="file_valid">No Chosen File</div>
                    <div class="file_business" id="file_business">No Chosen File</div>
                    <div class="file_cv" id="file_cv">No Chosen File</div>
                </div>

                <div class="services">
                    <label for="service">Service Description:</label><br>
                    <textarea name="service" id="service" cols="30" rows="10" autocomplete="off" required></textarea>
                </div>
                <input type="submit" name="submit" value="submit" id="upload_form">
            </form>
            <button class="btnsubmit" onclick="check()">Submit</button>
        </div>
    </div>

    <div class="wrong" id="wrong_pass">
        <h1>Wrong Password</h1>
        <p>Please make sure that the password is same!</p>
        <button class="ok" onclick="remove()">OK</button>
    </div>

    <div class="wrong" id="wrong_email">
        <h1>Invalid Email</h1>
        <p>Please enter a valid email ending with @gmail.com </p>
        <button class="ok" onclick="remove()">OK</button>
    </div>

    <div class="wrong" id="empty">
        <h1>Requirements Missing</h1>
        <p>Please upload the picture and file that we required </p>
        <button class="ok" onclick="remove()">OK</button>
    </div>

    <div class="wrong" id="contact">
        <h1>Invalid Contact Number</h1>
        <p>Please enter a contact number that has 11 digits</p>
        <button class="ok" onclick="remove()">OK</button>
    </div>
<script src="technician.js"></script>
</body>
</html>