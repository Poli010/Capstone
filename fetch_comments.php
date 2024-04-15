<?php
require_once("dbcon.php");

// Check if the user_id is provided and is numeric
if(isset($_GET['user_id']) && is_numeric($_GET['user_id'])) {
    // Sanitize the user_id to prevent SQL injection
    $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);

    // Fetch reviews from the database for the given user_id
    $review_query = mysqli_query($conn, "SELECT * FROM review WHERE user_id = '$user_id'");

    // Check if there are any reviews found
    if(mysqli_num_rows($review_query) > 0) {
        // Prepare an array to store the reviews data
        $reviews = array();

        // Loop through the fetched reviews and add them to the array
        while ($row = mysqli_fetch_assoc($review_query)) {
            $reviews[] = $row;
        }

        // Return the reviews data as JSON
        echo json_encode(array("success" => true, "data" => $reviews));
    } else {
        // No reviews found for the given user_id
        echo json_encode(array("success" => false, "message" => "No reviews found for the user."));
    }
} else {
    // user_id parameter is missing or not numeric
    echo json_encode(array("success" => false, "message" => "Invalid user ID."));
}
?>
