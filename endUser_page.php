<?php
    require_once("dbcon.php");
    $email = $_GET['email'];
    $user = "SELECT * FROM accounts WHERE email = '$email'";
    $user_query = mysqli_query($conn, $user);

    $row2 = mysqli_fetch_assoc($user_query);

    $sql = "SELECT * FROM technician_form GROUP BY email";
    $query = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($query);
    

    $baranggay = "SELECT DISTINCT baranggay FROM technician_form ORDER BY baranggay ASC";
    $baranggay_result = mysqli_query($conn, $baranggay);

    $province = "SELECT DISTINCT province FROM technician_form ORDER BY province ASC";
    $province_result = mysqli_query($conn, $province);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Locator Services</title>
    <link rel="stylesheet" href="endUser_page.css">
    <link rel="website icon" href="icon/icon.png" type="png">
    <script src="https://kit.fontawesome.com/355342439a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
</head>
<body>
    <div class="container" id="container">
        <div class="header">
            <img src="icon/icon.png" alt="" srcset="" height="50" width="100">
            <i class="fa-solid fa-magnifying-glass"></i><input type="search" id="searchbar"  placeholder="Search" autocomplete="off">
            <button id="profile" onclick="profile()"><?php echo $row2['username'] ?> </button>
            <img src="<?php echo $row2['profile_picture'] ?>" alt="" id="profile_picture" class="profile_picture">
        </div>
        <div class="profile_modal" id="profile_modal">
            <div class="profile_items">
                <div class="username_image">
                    <h3><?php echo $row2['first_name'] ?> <?php echo $row2['last_name'] ?></h3>
                    <img src="<?php echo $row2['profile_picture'] ?>" alt="" id="" class="profile_picture2">
                </div>
                <hr>
                <div class="profile_settings">
                    <a href="edit_profile.php?user_id=<?php echo $row2['user_id']?>"><span><i class="fa-solid fa-user"></i> Edit Profile</span> </a>
                    <a href="appointment.php?email=<?php echo $email ?>"><span><i class="fa-solid fa-calendar-days"></i> Appointment</span></a>
                    <a href="#"><span><i class="fa-solid fa-handshake"></i> Transaction</span></a>
                    <a href="#"><span><i class="fa-solid fa-comment"></i> Chats</span></a>
                    <a href="change_password.php?user_id=<?php echo $row2['user_id']?>"><span><i class="fa-solid fa-key"></i> Change Password</span></a>
                    <a href="login_page.php"><span><i class="fa-solid fa-right-from-bracket"></i> Logout</span></a>
                </div>
            </div>
        </div>
        <hr>
        <div class="title">
            <h1>Welcome to E-Locator Services</h1>
            <p>Please free to browse our website and book for our technician</p>
        </div>
        <div class="filter_card">
            <!-- FILTER -->
            <div class="filter">
                <h2>Filter <i class="fa-solid fa-filter"></i></h2>
                <div class="filter_info">
                    <br>
                    <h3>Technician:</h3>
                    <input type="checkbox" id="electrician" value="electrician">
                    <label for="electrician">Electrician</label><br>
                    <input type="checkbox" id="computer_technician" value="computer_technician">
                    <label for="computer_technician">Computer Technician</label>
                    <br>
                    <br>
                    <h3>Location:</h3>
                    <label for="baranggay" class="baranggay">Baranggay:</label>
                    <select name="baranggay" id="baranggay">
                        <option value=""></option>
                        <?php
                            while($row_baranggay = mysqli_fetch_assoc($baranggay_result)){
                        ?>
                        <option value="<?php echo $row_baranggay['baranggay'] ?>"><?php echo $row_baranggay['baranggay'] ?></option>
                        <?php
                            }
                        ?>
                    </select>

                    <label for="province" >Province:</label>
                    <select name="province" id="province">
                        <option value=""></option>
                        <?php
                            while($row_province = mysqli_fetch_assoc($province_result)){
                        ?>
                        <option value="<?php echo $row_province['province'] ?>"><?php echo $row_province['province'] ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
            </div>




            <!-- CARD -->
            <div class="technician-container" id="technician-container">
                <div class="technician">
                    <?php
                        mysqli_data_seek($query, 0);
                        while($row = mysqli_fetch_assoc($query)){
                    ?>
                    <div class="card">
                        <img src="<?php echo $row['profile_picture'] ?>" height="200" width="200">
                        <h3><?php echo $row['first_name'] ?> <?php echo $row['last_name'] ?></h3>
                        <label><?php echo $row['position'] ?></label>
                        <div class="loc">
                            <p id="loc_brgy"><?php echo $row['baranggay'] ?></p>
                            <p id="loc_province">, <?php echo $row['province'] ?></p>
                        </div>
                        <div class="rate">
                            <p>Ratings:</p> <span class="rateYo" data-rating="<?php echo $row['ratings'] ?>"></span>
                        </div>
                        <input type="hidden" value="<?php echo $row['user_id'] ?>">
                        <button class="book" onclick="book('<?php echo $row['user_id'] ?>')">Book Now</button>
                    </div>
                        <?php
                        }
                        ?>
                </div>
            </div>

            <!-- BOOK NOW MODAL -->
            <div class="book-now" id="book_now">
                <div class="modal_info">
                    <div class="grid">
                        <div class="img">
                            <img src="icon/icon.png" alt="" srcset="" id="book_profile">
                        </div>
                        <div class="name">
                            <h2 id="firstname">First Name Last Name</h2>
                            <h3 id="technician_position">Electrician</h3>
                            <h3 id="location">Location</h3>
                            <p style="font-weight: bold" id="time_available">Time Availability: ---</p>
                            <div class="descriptions">
                                <p>Service Description:</p>
                                <p id="service_description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat neque maxime illum excepturi, distinctio ad! Totam, corrupti alias soluta quod ab rerum repellat dolor odio vero a animi delectus eos!</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="review_comments">
                    <div class="review">
                        <h2 class="title_review">Review:</h2>
                        <p class="comment_rate">Rate: <span id="rateYo"></span></p>
                        <textarea name="" id="comment_area" cols="30" rows="10" placeholder="Write Comment"></textarea>
                        <button class="sendBtn"><i class="fa-solid fa-paper-plane"></i></button>
                    </div>
                    <div class="comments">
                        <h2>Comments:</h2>
                        <p id="review_rate">Ivan Policarpio <span class="rateYo" data-rating="<?php echo $row['ratings'] ?>"></span></p> 
                        <input type="text" class="customer_comment" disabled>         
                    </div>
                </div>
                <div class="footer">
                    <hr>
                    <!-----DATA----->
                    <input type="hidden" value="" id="technician_contact"> 
                    <input type="hidden" value="" id="technician_social"> 
                    <input type="hidden" value="" id="technician_name"> 
                    <input type="hidden" value="<?php echo $row2['first_name'] ?> <?php echo $row2['last_name'] ?>" id="endUser_name"> 
                    <input type="hidden" value="Pending..." id="pending">
                    <input type="hidden" id="endUser_email" value="<?php echo $row2['email'] ?>">
                    <input type="hidden"id="endUser_message" value="Please wait to technician to accept your appointment">
                    <input type="hidden" value="" id="tech">
                    <input type="hidden" id="technician_message" value="Hi i have a problem can you help me?">
                    <input type="hidden" value="" id="date">
                    <input type="hidden" value="" id="time">
                    <button class="bookBtn" onclick="booking()">Book Now</button>
                </div>
                <span class="close_book" onclick="close_book()"><i class="fa-solid fa-xmark"></i></span>
            </div>  
        </div>  
        <hr>
        <div class="footer_page">
            <div class="capstone_contact">
                <h1>Contact Us!</h1>
                <div class="contact">
                    <p><i class="fa-solid fa-phone"></i> +639485905921</p>
                    <p><i class="fa-solid fa-envelope"></i> electroniclocatorservice@gmail.com</p>
                </div>
                <div class="social">
                    <a href=""><i class="fa-brands fa-facebook"></i> Facebook</a>
                    <a href=""><i class="fa-brands fa-x-twitter"></i> Twitter</a>
                    <a href=""><i class="fa-brands fa-telegram"></i> Telegram</a>
                    <a href=""><i class="fa-brands fa-discord"></i> Discord</a>
                    <a href=""><i class="fa-brands fa-linkedin"></i> LinkedIn</a>
                </div>
                <h1>Group Members:</h1>
                <div class="capstone_members">
                    <a href="">Ivan Policarpio</a>
                    <a href="">Angelo Capa</a>
                    <a href="">Reymi Angelo Dela Cruz</a>
                    <a href="">Dianne Castillo</a>
                    <a href="">Felecita Lamela</a>
                </div>
                <p class="copyright"><i class="fa-regular fa-copyright"></i>Copyright2024. All right reserved</p>
            </div>
        </div>
    </div>
    <div class="success_booking" id="success_modal">
        <div class="success_info">
            <h1>Success Booking</h1>
            <p>Please check your appointment page if the technician accept your book, you can see the appointment page in the profile menu bar</p>
            <button class="close" onclick="close_booking()">Close</button>
        </div>
    </div>
    
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
<script src="endUser_page.js"></script>
</body>
</html>
