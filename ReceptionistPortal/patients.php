<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients</title>
    <link rel="icon" href="assets/favicon_io/favicon.ico" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <!-- <script src="main.js"></script> -->

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
                                $sql = "SELECT * FROM receptionists WHERE Rank = 'Head'";

                                // $conn from the db.php file
                                $result = $conn->query($sql);
                                // $results will be an array holding the info from the sql statement
                                
                                // $receptionist = mysqli_fetch_object($result);
                                
                                // $NewResult = json_decode($receptionist);
                                
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

                                    echo '<button type="submit" class="btn btn-primary btn-grad3 btn-add"><strong>Log Out</strong></button>';

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

        <a class="nav-item" href="dashboard.php">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-layout-dashboard" width="40"
                height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round"
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

        <a class="nav-item active-nav" href="patients.php">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-active icon-tabler-disabled-2"
                width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
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
                <div class="form-inline d-flex">

                    <button class="back-button btn btn-primary btn-grad2" type="button" onclick="goBack()">
                        <svg class="back-icon" viewBox="0 0 24 24">
                            <path d="M20.59 12H6.83l5.59-5.59L12 5l-8 8 8 8 1.41-1.41L6.83 14h13.76z"></path>
                        </svg>
                        Back
                    </button>

                    <form class="m-2 d-flex width-full" action="patients.php" enctype="multipart/form-data"
                        method="POST">
                        <input type="text" class="form-control mr-sm-2" placeholder="Search for Patients" id="search"
                            name="search">
                        <button type="submit" class="btn btn-primary search-btn btn-grad2 search-button" type="button">
                            <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                <path
                                    d="M15.707 14.293l-4.063-4.063C11.409 8.856 12 7.493 12 6c0-2.757-2.243-5-5-5S2 3.243 2 6s2.243 5 5 5c1.493 0 2.856-.591 3.23-1.543l4.063 4.063a.996.996 0 1 0 1.414-1.414zM7 10c-2.206 0-4-1.794-4-4s1.794-4 4-4 4 1.794 4 4-1.794 4-4 4z" />
                            </svg>
                            Search
                        </button>
                        <button type="submit" class="btn btn-primary search-btn btn-grad2" type="button">Reset</button>
                    </form>

                </div>
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

        <div>

            <div class="spacer"></div>

            <button class="add-doctor-button btn btn-primary btn-grad" id="openFormButton" type="button">
                <svg class="plus-icon" viewBox="0 0 24 24">
                    <path d="M12 4V12H4V14H12V22H14V14H22V12H14V4H12Z"></path>
                </svg>
                Add New Patient
            </button>

            <div class="spacer"></div>

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

                                <div class="col-md-6">

                                    <div class="col-md-8 upload grow">
                                        <img class="img-fluid rounded-circle" id="ViewImage" alt="Profile Image" src=""
                                            title="">
                                    </div>

                                    <p class="med-text"><strong>Medical Aid Number</strong></p>
                                    <button class="Specialisation-pill" id="Specialisation-pill"></button>

                                </div>

                                <div class="col-md-6">

                                    <p><strong>Gender: </strong><span id="Gender-text"></span></p>
                                    <p><strong>Age: </strong><span id="Age-text"></span></p>
                                    <p><strong>Date of Birth: </strong><span id="DoB-text"></span></p>
                                    <p><strong>ID Number: </strong><span id="IDNumber-text"></span></p>
                                    <p><strong>Email: </strong><span id="Email-text"></span></p>
                                    <p><strong>Phone Number: </strong><span id="PhoneNumber-text"></span></p>

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

            <div class="container">
                <h2 class="f-left bbold">Patient Records</h2>
                <?php
                error_reporting(0);

                // (B) PROCESS SEARCH WHEN FORM SUBMITTED
                if (isset($_POST["search"])) {
                    // (B1) SEARCH FOR USERS
                    require "search-patients.php";

                    // (B2) DISPLAY RESULTS
                    if (count($results) > 0) {

                        $length = count($results); // Get the length of the array
                
                        echo '<p class="f-right">All Patients (' . $length . ')</p>';

                    } else {
                        echo '<p class="f-right">All Patients (0)</p>';
                    }
                } else {
                    include 'db.php';

                    // Query to get the count of records in the table
                    $query = "SELECT COUNT(*) as total_records FROM patients";
                    $result = mysqli_query($conn, $query);

                    // Fetch the result
                    $row = mysqli_fetch_assoc($result);
                    $totalRecords = $row['total_records'];

                    // Display the count
                    echo '<p class="f-right">All Patients (' . $totalRecords . ')</p>';
                }
                ?>

                <table class="table table-bordered font2">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>ID Number</th>
                            <th>Gender</th>
                            <th>Date of Birth</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Medical Aid Number</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        // (B) PROCESS SEARCH WHEN FORM SUBMITTED
                        if (isset($_POST["search"])) {
                            // (B1) SEARCH FOR USERS
                            require "search-patients.php";

                            // (B2) DISPLAY RESULTS
                            if (count($results) > 0) {
                                foreach ($results as $row) {

                                    echo '<tr>';

                                    echo '<td>' . $row['Name'] . '</td>';
                                    echo '<td>' . $row['Surname'] . '</td>';
                                    echo '<td>' . $row['IDNumber'] . '</td>';
                                    echo '<td>' . $row['Gender'] . '</td>';
                                    echo '<td>' . $row['DoB'] . '</td>';
                                    echo '<td>' . $row['Email'] . '</td>';
                                    echo '<td>' . $row['PhoneNumber'] . '</td>';
                                    echo '<td>' . $row['MedicalAidNumber'] . '</td>';
                                    echo '<td>';
                                    echo '<a class="btn btn-info btn-sm" title="Edit" href="patients.php?Patients_ID=' . $row['Patients_ID'] . '" role="button"><i class="fas fa-edit"></i></a>';

                                    echo '
                                        <script>
                                            window.addEventListener("beforeunload", function() {
                                                localStorage.setItem("scrollPos", window.pageYOffset);
                                            });
                                        
                                            window.addEventListener("load", function() {
                                                var scrollPos = localStorage.getItem("scrollPos");
                                                if (scrollPos) {
                                                    window.scrollTo(0, scrollPos);
                                                    localStorage.removeItem("scrollPos");
                                                }
                                            });
                                        </script>';
                                    echo '<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ModalView" id="' . $row['Patients_ID'] . '" onClick="showDetailsPatient(this);" title="View"><i class="fas fa-eye"></i></button>';
                                    echo '<a class="btn btn-danger btn-sm" href="delete-patient.php?Patients_ID=' . $row['Patients_ID'] . '" title="Delete" role="button"><i class="fas fa-trash-alt"></i></a>';
                                    echo '</td>';
                                    echo '</tr>';

                                }
                            } else {
                                echo '<tr>';
                                echo '<td>No results found</td>';
                                echo '</tr>';
                            }
                        } else {

                            include 'list-all-patients.php';

                        }
                        ?>

                    </tbody>
                </table>

            </div>

            <div id="overlay"></div>
            <div id="popup" class="hide-scroll">
                <div class="relative-pop">
                    <h2 class="add-title">Add New Patient.</h2>
                    <hr>
                    <button id="closeButton">&times;</button>

                    <form class="m-2" action="create-patient.php" enctype="multipart/form-data" method="POST">
                        <div class="form-group">
                            <label for="Name">Name:</label>
                            <input type="text" class="form-control" id="Name" name="Name" placeholder="Enter Name" required>
                        </div>
                        <div class="form-group">
                            <label for="Surname">Surname:</label>
                            <input type="text" class="form-control" id="Surname" name="Surname"
                                placeholder="Enter Surname" required>
                        </div>
                        <div class="form-group">
                            <label for="IDNumber">ID Number:</label>
                            <input type="number" class="form-control" id="IDNumber" name="IDNumber"
                                placeholder="Enter ID number" required>
                        </div>
                        <div class="form-group">
                            <label for="MedicalAidNumber">MedicalAidNumber:</label>
                            <input type="text" class="form-control" id="MedicalAidNumber" name="MedicalAidNumber"
                                placeholder="Enter MedicalAidNumber" required>
                        </div>
                        <div class="form-group">
                            <label for="DoB">Date of Birth:</label>
                            <input type="date" class="form-control" id="DoB" name="DoB" required>
                        </div>
                        <div class="form-group">
                            <label for="Gender">Gender:</label>
                            <select class="form-control" id="Gender" name="Gender" required>
                                <option value="" selected disabled>Choose a Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Email">Email:</label>
                            <input type="email" class="form-control" id="Email" name="Email" placeholder="Enter Email" required>
                        </div>
                        <div class="form-group">
                            <label for="PhoneNumber">PhoneNumber:</label>
                            <input type="number" class="form-control" id="PhoneNumber" name="PhoneNumber"
                                placeholder="Enter Phone Number" required>
                        </div>
                        <div class="form-group">
                            <label for="ProfileImage">Profile Image:</label>
                            <input type="file" class="form-control-file" id="ProfileImage" name="ProfileImage"
                                accept=".jpg, .jpeg, .png">
                        </div>
                        <button type="submit" class="btn btn-primary btn-grad btn-add m-4">Add Patient Record</button>
                    </form>

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