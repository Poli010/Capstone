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

//FUNCTION FOR CHAT BUTTON
function chats(endUser_email){
    window.location.href = "chats.php?email=" + endUser_email;
}

//FUNCTION FOR CANCEL BOOK BUTTON
function cancelbook(){
    var container = document.getElementById("container");
    var cancel_modal = document.getElementById("cancel_modal");

    container.classList.add("container-open");
    cancel_modal.classList.add("cancel_modal-open");
}
function delete_book(){
    var reason = document.getElementById("reason");

    reason.classList.add("reason-open");
    cancel_modal.classList.remove("cancel_modal-open");

}

function close_reason(){
    reason.classList.remove("reason-open");
    container.classList.remove("container-open");
}

function close_modal(){
    container.classList.remove("container-open");
    cancel_modal.classList.remove("cancel_modal-open");
}

//FUNCTION FOR ACCEPT BUTTON
function accept(type_of_service, end_user_contact,endUser_email, endUser_name, technician_email, date, time, appointmentId) {
    let update_endUser_message = document.getElementById("update_endUser_message").value;
    let accepted = document.getElementById("accepted").value;

    $.ajax({
        url: "accept_appointment.php",
        type: "POST",
        data: {
            endUser_email: endUser_email,
            endUser_name: endUser_name,
            technician_email: technician_email, 
            date: date, 
            time: time, 
            appointmentId: appointmentId,
            update_endUser_message: update_endUser_message,
            accepted:accepted,
            end_user_contact: end_user_contact,
            type_of_service: type_of_service
        },
        success: function(response) {
            location.reload();
        },

    });
}


//HIDE ACCEPT BUTTON IF THE STATUS IS ACCEPTED
function hideAcceptButton() {
    let status = document.getElementById("status");
    let acceptButton = document.getElementById("acceptBtn");

    if (status.textContent.trim() === "accepted") {
      
        acceptButton.style.display = "none";
    }
}
hideAcceptButton();