//FUNCTION FOR SEE THE LOCATION OF TECHNICIAN
function seeLocation(){
    let technician_location = document.getElementById("technician_location").value;
    if ("geolocation" in navigator) {
        navigator.geolocation.getCurrentPosition(function(position) {
            let currentLatitude = position.coords.latitude;
            let currentLongitude = position.coords.longitude;
            let googleMapsUrl = "https://www.google.com/maps/dir/?api=1&origin=" + currentLatitude + "," + currentLongitude + "&destination=" + encodeURIComponent(technician_location);

            window.open(googleMapsUrl, "_blank");
        });
    }
}

//FUNCTION FOR STARS IN TECHNICIAN RATING
$(document).ready(function () {
    $(".rateYo").each(function() {
        var ratingValue = $(this).data('rating');
        $(this).rateYo({
            rating: ratingValue, 
            starWidth: "20px",
            readOnly: true 
        });
    });
});

//REVIEW RATING
$(function () {
 
    $("#rateYo").rateYo({
      normalFill: "#A0A0A0",
      starWidth: "20px"
    });
   
  });

  //
  document.addEventListener("DOMContentLoaded", function() {
    let ratingInput = document.getElementById("rating");
    let rateYoInstance = $("#rateYo").rateYo({
        starWidth: "20px" // Adjust the size of the stars here
    });

    $("#rateYo").rateYo("option", "onChange", function (rating, rateYoInstance) {
        ratingInput.value = rating;
    });

    ratingInput.addEventListener('input', function(){
        let ratingValue = this.value;
        rateYoInstance.rateYo("rating", parseFloat(ratingValue));
    });
});

document.addEventListener("DOMContentLoaded", function() {
    let review = document.getElementById('review');
    let endUser_email = document.getElementById("endUser_email").value;
    let technician_email = document.getElementById("tech").value;
    
    $.ajax({
        url: "check_status.php",
        type: "GET",
        dataType: "json",
        data:{
            endUser_email: endUser_email,
            technician_email: technician_email
        },
        success: function(response){
            if(response.success){
                review.style.display = "block"; // Display the review section
            }
        }
    });
});

