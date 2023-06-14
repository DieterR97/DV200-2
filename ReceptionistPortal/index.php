<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="icon" href="assets/favicon_io/favicon.ico" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    <script type="text/javascript" src="particles js/particles.min.js"></script>
    <script type="text/javascript" src="particles js/app.js"></script>

    <style>
        /* Custom CSS for full-page background image */
        body {
            background-image: url('assets/receptionist portal/1.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>

    <!-- particles.js container -->
    <div id="particles-js" class="d-flex justify-content-center align-items-center">

        <div class="container center-div">
            <div class="row justify-content-center align-items-center">

                <div class="col-md-12">
                    <div class="card shadow opacity-75">
                        <!-- <div class="card shadow"> -->
                        <div class="card-header text-center font1">
                            <h3>Login</h3>
                        </div>
                        <div class="card-body font1">
                            <form>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username"
                                        placeholder="Enter your username">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password"
                                        placeholder="Enter your password">
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary rounded-pill px-5">Log in</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <p class="card-text font2">Login to your appointment management portal.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>

    <!--& jquery 3.6.1 js CDN -->
    <script src="https://code.jquery.com/jquery-3.6.1.js"
        integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

    <script type="text/javascript" src="particles js/particles.min.js"></script>
    <script type="text/javascript" src="particles js/app.js"></script>

</body>

</html>