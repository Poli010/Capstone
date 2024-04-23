//FUNCTION FOR ARROW 
function show(id, iconId,technician_email,email){
    let message_collapse = document.getElementById(id);
    let icon = document.getElementById(iconId);
    let techa = document.getElementById("techa");
    let endUser_email = document.getElementById("endUser_email");

    message_collapse.classList.toggle('message-open');
    icon.classList.toggle('fa-solid-open');
    $.ajax({
        url: "delete_appointment.php",
        type: "GET",
        dataType: "json",
        data:{
            technician_email: technician_email,
            email: email
        },
        success: function(response){
            techa.value = response.data.technician_email;
            endUser_email.value = response.data.endUser_email;
           
        }
    })
}



//FUNCTION FOR CANCEL BOOK BUTTON
function cancelbook(){
    var container = document.getElementById("container");
    var cancel_modal = document.getElementById("cancel_modal");

    container.classList.add("container-open");
    cancel_modal.classList.add("cancel_modal-open");
}

function close_modal(){
    container.classList.remove("container-open");
    cancel_modal.classList.remove("cancel_modal-open");
}

//FUNCTION FOR COMPLETE BUTTON

function accept(type_of_service, endUserEmail, endUserName, technicianEmail, date, time, appointmentId) {
    var price = document.getElementById('priceInput').value.trim();
    $.ajax({
        url: "complete_transaction.php",
        type: "POST",
        data: {
            endUser_email: endUserEmail,
            endUser_name: endUserName,
            technician_email: technicianEmail,
            date: date,
            time: time,
            appointmentId: appointmentId,
            price: price,
            type_of_service: type_of_service
        },
        success: function(response) {
         location.reload();
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            alert("Error accepting appointment. Please try again.");
        }
    });
}

document.addEventListener("DOMContentLoaded", function() {
    var confirmModal = document.getElementById('confirmModal');
    confirmModal.style.display = 'none'; 

    
    var completeButton = document.querySelector('.acceptBtn');
    completeButton.addEventListener('click', function() {
        var priceInput = document.getElementById('priceInput').value.trim();
        
      
        if (priceInput === '') {
       
            document.getElementById('modalMessage').innerText = "Please enter the price before completing the transaction.";
            confirmModal.style.display = 'block';
        } else {
            
            document.getElementById('modalMessage').innerText = "Are you sure that you input the right amount?";
            confirmModal.style.display = 'block';
        }
    });
});

//function for price//
function togglePrice() {
    var priceInput = document.getElementById('priceInput');
    if (priceInput.style.display === "none") {
        priceInput.style.display = "block";
    } else {
        priceInput.style.display = "none";
    }
}



var priceInput = document.getElementById('priceInput');
var completeButton = document.querySelector('.acceptBtn');


priceInput.addEventListener('input', function() {

    if (priceInput.value.trim() !== '') {
        completeButton.disabled = false;
    } else {
        completeButton.disabled = true;
    }
});