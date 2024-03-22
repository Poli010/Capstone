<?php
    require_once("dbcon.php");

    if(isset($_POST['save_changes'])){
        $profile_destination =  "profile_picture/";
        $profile_img = $profile_destination . $_FILES["input"]["name"];
        $profile_img_type = strtolower(pathinfo($profile_img,PATHINFO_EXTENSION));

        $user_id = $_POST['user_id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $username = $_POST['username'];
        $contact_number = $_POST['contact_number'];

        if(move_uploaded_file($_FILES['input']["tmp_name"],$profile_img) ){
            $sql = "UPDATE accounts SET first_name = '$first_name', last_name = '$last_name', username = '$username', contact_number = '$contact_number', profile_picture = '$profile_img' WHERE user_id = '$user_id'";
            $query = mysqli_query($conn, $sql);
            
            if($query){
               $select = "SELECT email FROM accounts WHERE user_id = '$user_id'";
               $fetch = mysqli_query($conn, $select);
               $row = mysqli_fetch_assoc($fetch);
               $email = $row['email'];

               header("Location:endUser_page.php?email=$email");
            }
        }
    }

?>