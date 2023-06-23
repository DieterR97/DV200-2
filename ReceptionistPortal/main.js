function goBack() {
    window.history.back();
}

function showDetailsDoctor(button) {
    var Doctors_ID = button.id;
    //AJAX call to get specific doctor data
    $.ajax({
        // Path to your backend handler script
        url: 'doctor-details.php',
        // Tell jQuery that you expect JSON response
        dataType: 'json',
        data: { "Doctors_ID": Doctors_ID },
        // Define what should happen once the data is received
        success: function (doctor) {

            $("#ModalViewLabel").text(doctor.Name + ' ' + doctor.Surname);
            $("#ViewImage").attr('src', 'profile_img/' + doctor.ProfileImage);
            $("#ViewImage").attr('title', doctor.ProfileImage);
            $("#Specialisation-pill").text(doctor.Specialisation);

            $("#Gender-text").text(doctor.Gender);

            var today = new Date();
            var birthDate = new Date(doctor.DoB);
            var age = today.getFullYear() - birthDate.getFullYear();
            var m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }

            $("#Age-text").text(age);

            $("#DoB-text").text(doctor.DoB);
            $("#IDNumber-text").text(doctor.IDNumber);
            $("#Email-text").text(doctor.Email);
            $("#PhoneNumber-text").text(doctor.PhoneNumber);

            $("#Room-ID-text").text(doctor.RoomsID);
            $("#Room-type-text").text(doctor.RoomsType);

            $("#rating-text").text(doctor.Rating);

        },
        // Handle errors in retrieving the data
        error: function (result) {
            alert('Your AJAX request didn\'t work. Debug time!');
        }
    });
}

function showDetailsReceptionist(button) {
    var Receptionists_ID = button.id;
    //AJAX call to get specific doctor data
    $.ajax({
        // Path to your backend handler script
        url: 'receptionist-details.php',
        // Tell jQuery that you expect JSON response
        dataType: 'json',
        data: { "Receptionists_ID": Receptionists_ID },
        // Define what should happen once the data is received
        success: function (receptionist) {

            $("#ModalViewLabel").text(receptionist.Name + ' ' + receptionist.Surname);
            $("#ViewImage").attr('src', 'profile_img/' + receptionist.ProfileImage);
            $("#ViewImage").attr('title', receptionist.ProfileImage);
            $("#Specialisation-pill").text(receptionist.Rank);

            $("#Gender-text").text(receptionist.Gender);

            var today = new Date();
            var birthDate = new Date(receptionist.DoB);
            var age = today.getFullYear() - birthDate.getFullYear();
            var m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }

            $("#Age-text").text(age);

            $("#DoB-text").text(receptionist.DoB);
            $("#Username-text").text(receptionist.Username);
            $("#Email-text").text(receptionist.Email);
            $("#PhoneNumber-text").text(receptionist.PhoneNumber);
            $("#Banned-text").text(receptionist.Banned);

        },
        // Handle errors in retrieving the data
        error: function (result) {
            alert('Your AJAX request didn\'t work. Debug time!');
        }
    });
}

function showDetailsPatient(button) {
    var Patients_ID = button.id;
    //AJAX call to get specific doctor data
    $.ajax({
        // Path to your backend handler script
        url: 'patient-details.php',
        // Tell jQuery that you expect JSON response
        dataType: 'json',
        data: { "Patients_ID": Patients_ID },
        // Define what should happen once the data is received
        success: function (patient) {

            $("#ModalViewLabel").text(patient.Name + ' ' + patient.Surname);
            $("#ViewImage").attr('src', 'profile_img/' + patient.ProfileImage);
            $("#ViewImage").attr('title', patient.ProfileImage);

            $("#Specialisation-pill").text(patient.MedicalAidNumber);

            $("#Gender-text").text(patient.Gender);

            var today = new Date();
            var birthDate = new Date(patient.DoB);
            var age = today.getFullYear() - birthDate.getFullYear();
            var m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }

            $("#Age-text").text(age);

            $("#DoB-text").text(patient.DoB);
            $("#IDNumber-text").text(patient.IDNumber);
            $("#Email-text").text(patient.Email);
            $("#PhoneNumber-text").text(patient.PhoneNumber);
        },
        // Handle errors in retrieving the data
        error: function (result) {
            alert('Your AJAX request didn\'t work. Debug time!');
        }
    });
}

function showDetailsAppointments(button) {
    var Appointments_ID = button.id;
    //AJAX call to get specific doctor data
    $.ajax({
        // Path to your backend handler script
        url: 'appointment-details.php',
        // Tell jQuery that you expect JSON response
        dataType: 'json',
        data: { "Appointments_ID": Appointments_ID },
        // Define what should happen once the data is received
        success: function (appointment) {

            // $("#ModalViewLabel").text(patient.Name + ' ' + patient.Surname);            
            // $("#ViewImage").attr('src', 'profile_img/' + patient.ProfileImage);
            // $("#ViewImage").attr('title', patient.ProfileImage);
            // $("#Specialisation-pill").text(patient.MedicalAidNumber);

            $("#PatientsID-text").text(appointment.PatientsID);
            $("#DoctorsID-text").text(appointment.DoctorsID);
            $("#AppointmentDate-text").text(appointment.AppointmentDate);
            $("#AppointmentTime-text").text(appointment.AppointmentTime);
            $("#DurationMinutes-text").text(appointment.DurationMinutes);
            $("#ReasonForAppointment-text").text(appointment.ReasonForAppointment);
            $("#BookedByReceptionistID-text").text(appointment.BookedByReceptionistID);
        },
        // Handle errors in retrieving the data
        error: function (result) {
            alert('Your AJAX request didn\'t work. Debug time!');
        }
    });
}

// Get the form, overlay, and button elements
// const form = document.querySelector('#popup form');
const form = document.querySelector('#popup');
const overlay = document.getElementById('overlay');
const closeButton = document.getElementById('closeButton');
const openButton = document.getElementById('openFormButton');

// Function to toggle the display of the form and overlay
function toggleForm() {
    form.style.display = form.style.display === 'none' ? 'block' : 'none';
    overlay.style.display = overlay.style.display === 'none' ? 'block' : 'none';
}

// Event listener for opening the form
openButton.addEventListener('click', function () {
    toggleForm();
});

// Event listener for closing the form
closeButton.addEventListener('click', function () {
    toggleForm();
});

// Event listener for closing the form when clicking outside the form
overlay.addEventListener('click', function () {
    toggleForm();
});


function callcheck(selectObject) {
    var Patients_ID = selectObject.value;

    console.log(Patients_ID);

    // Make DataTable call with selected value
    $.ajax({
        // Path to your backend handler script
        url: 'confirm-patient.php',
        // Tell jQuery that you expect JSON response
        dataType: 'json',
        data: { "Patients_ID": Patients_ID },
        // type: 'GET',
        // data: { value: Patients_ID },
        success: function (response) {

            console.log(response.Name);

            var imageURL = 'profile_img/' + response.ProfileImage;
            var chosenPerson = response.Name + ' ' + response.Surname;
            showImagePopup(imageURL, chosenPerson);

        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });
}

function callcheck2(selectObject) {
    var Doctors_ID = selectObject.value;

    console.log(Doctors_ID);

    // Make DataTable call with selected value
    $.ajax({
        // Path to your backend handler script
        url: 'confirm-doctor.php',
        // Tell jQuery that you expect JSON response
        dataType: 'json',
        data: { "Doctors_ID": Doctors_ID },
        success: function (response) {

            console.log(response.ProfileImage);

            var imageURL = 'profile_img/' + response.ProfileImage;
            var chosenPerson = response.Name + ' ' + response.Surname;
            showImagePopup(imageURL, chosenPerson);

        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });
}

function showImagePopup(imageURL, chosenPerson) {

    // Create a new <div> element to hold the popup
    var popup = document.createElement('div');
    popup.className = 'image-popup';

    // Create an <img> element to display the image
    var img = document.createElement('img');
    img.src = imageURL;

    // Create a <p> element for the text message
    var text = document.createElement('p');
    text.textContent = 'You have chosen ' + chosenPerson + '.';
    text.className = 'text-popup';

    // Add the image and text to the popup
    popup.appendChild(img);
    popup.appendChild(text);

    // Append the popup to the document body
    document.body.appendChild(popup);

    // Close the popup when clicked outside of the image
    popup.addEventListener('click', function (event) {
        if (event.target === popup) {
            document.body.removeChild(popup);
        }
    });
}


