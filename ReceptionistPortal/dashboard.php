<?php
session_start();

if (isset($_SESSION['Receptionists_ID']) && isset($_SESSION['Username'])) {

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link rel="icon" href="assets/favicon_io/favicon.ico" type="image/x-icon">
        <!-- Bootstrap CSS -->
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="stylesheet" href="main.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
            crossorigin="anonymous"></script>

        <script src="https://code.jquery.com/jquery-3.7.0.js"
            integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="main.js"></script>

    </head>

    <body>

        <div class="c-navbar">

            <div class="container">
                <br>
                <div class="container">
                    <div class="row">
                        <div class="card shadow profile-disco">
                            <div class="card-body">
                                <div class="row">

                                    <?php

                                    include 'db.php';

                                    // 1. Capture the contents of the db (sql)
                                    $sql = "SELECT * FROM receptionists WHERE Receptionists_ID = $_SESSION[Receptionists_ID]";

                                    // $conn from the db.php file
                                    $result = $conn->query($sql);
                                    // $results will be an array holding the info from the sql statement
                                
                                    while ($row = $result->fetch_assoc()) {

                                        echo '<div class="col-md-12">';
                                        echo '<div class="row">';

                                        echo '<div class="col-md-4 upload">';
                                        echo '<img src="profile_img/' . $row['ProfileImage'] . '" class="img-fluid rounded-circle" alt="Profile Image">';
                                        echo '</div>';

                                        echo '<div class="col-md-8">';
                                        echo '<h3 class="mb-0"><strong>' . $row['Name'] . ' ' . $row['Surname'] . '</strong></h3>';
                                        echo '<p class="text-muted">' . $row['Email'] . '</p>';
                                        echo '<p>' . $row['Rank'] . ' Receptionist</p>';
                                        echo '</div>';

                                        echo '<a href="logout.php" class="btn btn-primary btn-grad3 btn-add" role="button" style="padding-left: 0px;"><strong>Log Out</strong></a>';

                                        echo '</div>';
                                        echo '</div>';

                                    }

                                    $conn->close();

                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <a class="nav-item active-nav" href="dashboard.php">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="icon icon-tabler icon-tabler-active icon-tabler-layout-dashboard" width="40" height="40"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M4 4h6v8h-6z" />
                    <path d="M4 16h6v4h-6z" />
                    <path d="M14 12h6v8h-6z" />
                    <path d="M14 4h6v4h-6z" />
                </svg>Dashboard</a>


            <a class="nav-item" href="doctors.php">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-stethoscope" width="40"
                    height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M6 4h-1a2 2 0 0 0 -2 2v3.5h0a5.5 5.5 0 0 0 11 0v-3.5a2 2 0 0 0 -2 -2h-1" />
                    <path d="M8 15a6 6 0 1 0 12 0v-3" />
                    <path d="M11 3v2" />
                    <path d="M6 3v2" />
                    <path d="M20 10m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                </svg>Doctors</a>

            <a class="nav-item" href="patients.php">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-disabled-2" width="40"
                    height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M17 6m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                    <path d="M9 11a5 5 0 1 0 3.95 7.95" />
                    <path d="M19 20l-4 -5h-4l3 -5l-4 -3l-4 1" />
                </svg>Patients</a>

            <a class="nav-item" href="appointments.php">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bookmark" width="40" height="40"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M9 4h6a2 2 0 0 1 2 2v14l-5 -3l-5 3v-14a2 2 0 0 1 2 -2" />
                </svg>Appointments</a>

            <a class="nav-item" href="receptionists.php">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="40" height="40"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                </svg>Receptionists</a>

            <a class="nav-item" href="profile.php">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle" width="40"
                    height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                    <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                    <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
                </svg>Profile</a>

        </div>

        <div class="container content-div">

            <div class="row">

                <div class="col-md-10">
                    <nav class="navbar navbar-dark bg-dark card">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="#">
                                <img src="assets/logo/logo-mix.svg" alt="Logo">
                                <!-- <img src="assets/logo/logo-black.svg" alt="Logo" class="recolor"> -->
                                <!-- <img src="assets/logo/Medical Docker Heart.svg" alt="Logo"> -->
                                <img src="assets/logo/Mecial Docker White.svg" alt="Logo" style="margin-left: 130px;">
                                <!-- <img src="assets/logo/Medical Docker Pink.svg" alt="Logo"> -->
                                <!-- Medical Docker -->
                            </a>
                        </div>
                    </nav>
                </div>

                <div class="col-md-2 d-flex text-end">
                    <div class="flex-grow-1"></div>
                    <div>
                        Today's Date
                        <br>
                        <?php
                        $today = date("F j, Y");
                        echo '<b>' . $today . '</b>';
                        ?>
                    </div>

                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar" width="50"
                        height="50" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" />
                        <path d="M16 3v4" />
                        <path d="M8 3v4" />
                        <path d="M4 11h16" />
                        <path d="M11 15h1" />
                        <path d="M12 15v3" />
                    </svg>

                </div>
            </div>

            <div class="spacer"></div>

            <button type="button" class="btn btn-primary btn-grad" data-toggle="modal" data-target="#appointmentModal">
                Open Appointment Form
            </button>

            <div class="modal fade" id="appointmentModal" tabindex="-1" role="dialog"
                aria-labelledby="appointmentModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-header-bb">
                            <h5 class="modal-title" id="appointmentModalLabel">Book an Appointment</h5>
                            <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form class="m-2" action="create-appointment-dash.php" enctype="multipart/form-data" method="POST">
                                <div class="form-group">
                                    <label for="Patient">Patient:</label>
                                    <select class="form-control" id="Patient-dropdown" name="Patient" required
                                        onchange="callcheck(this)">
                                        <option value="" selected disabled>Choose a Patient</option>
                                        <?php
                                        include 'db.php';

                                        // 1. Capture the contents of the db (sql)
                                        $sql = "SELECT * FROM patients";

                                        // $conn from the db.php file
                                        $result = $conn->query($sql);
                                        // $results will be an array holding the info from the sql statement
                                    
                                        // 2. Display the contents (loop)
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<option value="' . $row["Patients_ID"] . '">' . $row["Name"] . ' ' . $row["Surname"] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="Doctor">Doctor:</label>
                                    <select class="form-control" id="Doctor" name="Doctor" required
                                        onchange="callcheck2(this)">
                                        <option value="" selected disabled>Choose a Doctor</option>
                                        <?php
                                        include 'db.php';

                                        // 1. Capture the contents of the db (sql)
                                        $sql = "SELECT * FROM doctors";

                                        // $conn from the db.php file
                                        $result = $conn->query($sql);
                                        // $results will be an array holding the info from the sql statement
                                    
                                        // 2. Display the contents (loop)
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<option value="' . $row["Doctors_ID"] . '">' . $row["Name"] . ' ' . $row["Surname"] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="AppointmentDate">Appointment Date</label>
                                    <input type="date" class="form-control" id="AppointmentDate" name="AppointmentDate"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="AppointmentTime">Appointment Time</label>
                                    <input type="time" class="form-control" id="AppointmentTime" name="AppointmentTime"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="DurationMinutes">Duration</label>
                                    <input type="number" class="form-control" id="DurationMinutes" name="DurationMinutes"
                                        placeholder="e.g. 30" required>
                                </div>
                                <div class="form-group">
                                    <label for="ReasonForAppointment">Reason for Appointment</label>
                                    <textarea class="form-control" id="ReasonForAppointment" name="ReasonForAppointment"
                                        rows="3" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="BookedByReceptionistID">Receptionist</label>
                                    <input type="hidden" class="form-control" id="BookedByReceptionistID"
                                        name="BookedByReceptionistID" value="1"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

            <div class="spacer"></div>

            <h2 class="f-left bbold">Appointments for this week:</h2>


            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Patient</th>
                        <th>Doctor</th>
                        <th>Appointment Date</th>
                        <th>Appointment Time</th>
                        <th>Appointment Duration</th>
                        <th>Reason For Appointment</th>
                        <th>Receptionist</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                    include 'list-all-appointments-this-week.php';

                    ?>

                </tbody>
            </table>

            <!-- Modal VIEW-->
            <div class="modal fade" id="ModalView" tabindex="-1" aria-labelledby="ModalViewLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-border-b modal-header-disco">
                            <h3 class="modal-title bbold" id="ModalViewLabel"></h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body modal-border-b">
                            <!-- Display the fields that will be displayed in pop-up -->
                            <div class="row">

                                <!-- <div class="col-md-6">

                                <div class="col-md-8 upload grow">
                                    <img class="img-fluid rounded-circle" id="ViewImage" alt="Profile Image" src=""
                                        title="">
                                </div>

                                <button class="Specialisation-pill" id="Specialisation-pill"></button>

                            </div> -->

                                <div class="col-md-12">

                                    <p><strong>PatientsID: </strong><span id="PatientsID-text"></span></p>
                                    <p><strong>DoctorsID: </strong><span id="DoctorsID-text"></span></p>
                                    <p><strong>AppointmentDate: </strong><span id="AppointmentDate-text"></span></p>
                                    <p><strong>AppointmentTime: </strong><span id="AppointmentTime-text"></span></p>
                                    <p><strong>DurationMinutes: </strong><span id="DurationMinutes-text"></span></p>
                                    <p><strong>ReasonForAppointment: </strong><span id="ReasonForAppointment-text"></span>
                                    </p>

                                    <p><strong>BookedByReceptionistID </strong><span
                                            id="BookedByReceptionistID-text"></span>



                                </div>

                            </div>
                        </div>

                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button> -->
                        </div>

                    </div>
                </div>
            </div>


        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
            crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.7.0.js"
            integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
        <script src="main.js"></script>

    </body>

    </html>
    <?php
} else {
    header("Location: index.php");
    exit();
}
?>