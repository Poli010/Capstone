<?php
    require_once("dbcon.php");

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM accounts WHERE email = '$email' AND password = '$password'";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($query);

        $account_type = $row['account_type'];
        $verification_code = $row['verification_code'];
        $verification_complete = $row['verification_complete'];
        $approved = $row['approved'];

        if($account_type == 'end_user' || $account_type == 'admin' || $account_type == 'technician'){
            if($verification_code == $verification_complete){
                if($account_type == 'end_user'){
                    header("Location: end_user.php");
                }
                else if($account_type == 'admin'){
                    header("Location: admin.php");
                }
                else if($account_type == 'technician'){
                    if($approved == 'yes'){
                        header("Location: technician.php");
                    }
                    else{
                        echo '<script>
                                    window.location.href="index.php?error=1";
                            </script>';
                    }
                }
            }
            else{
                echo '<script>
                            window.location.href = "index.php?error=2";
                    </script>';
                  
            }
        }
        else{
            echo '<script>
                        window.location.href="index.php?error=3";
                </script>';
        }
    }
?>