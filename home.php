<?php
include('php/calendar.php');

if (!isset($_SESSION['username'])) {
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['firstname']);
    unset($_SESSION['lastname']);
    unset($_SESSION['calendarID']);
    unset($_SESSION['calendarName']);
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <link href="./css/home.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>
    <link href='lib/calendar/lib/main.css' rel='stylesheet' />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>Home</title>

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark nav-bk5 mb-3">
            <div class="container-fluid">
                <a class="navbar-brand mb-1" href="home.php"><?php echo $_SESSION['calendarName']; ?></a>
                <div class="navbar-collapse collapse d-sm-inline-flex justify-content-between">
                    <ul class="navbar-nav flex-grow-1">
                        <li class="nav-item">
                            <a id="homeBtn" class="nav-link" href="home.php">Home</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a id="accountBtn" class="nav-link" href="account.php"><?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?> </a>
                        </li>
                        <li class="nav-item">
                            <a id="logoutBtn" class="nav-link" href="home.php?logout='1'">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main style="padding-left: 5%; padding-right: 5%;" class="container-fluid">
        <div style="margin-top: 3%;" class="row">

            <div style="border-radius: 20px;" class="container col-md-3">
                <ul class="nav nav-pills nav-fill">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="pill" href="#add">Create</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#edit">Edit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#remove">Remove</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div style="border-radius: 15px;" class="card tab-content">
                    <div class="tab-pane fade show active" id="add">
                        <h5 style="margin-bottom: 20px; font-size: 35px" class="display-1 text-center">Create Event</h5>
                        <hr />
                        <form action="home.php" method="POST">
                            <div class="form-group">
                                <label for="eventName" class="form-label">Event Name</label>
                                <input type="text" class="form-control" name="eventName" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label for="startDate" class="form-label">Start Date</label>
                                <input type="date" class="form-control" name="startDate" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label for="endDate" class="form-label">End Date</label>
                                <input type="date" class="form-control" name="endDate" placeholder="">
                            </div>
                            <div style="margin-top: 10px;" class="form-group text-center">
                                <button type="submit" id="submitEvent" name="submitEvent" class="btn btn-dark">Create Event</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane container fade" id="edit">
                        <h5 style="margin-bottom: 20px; font-size: 35px" class="display-1 text-center">Edit Event</h5>
                        <hr />
                    </div>
                    <div class="tab-pane container fade" id="remove">
                        <h5 style="margin-bottom: 20px; font-size: 35px" class="display-1 text-center">Remove Event</h5>
                        <hr />
                    </div>
                </div>
            </div>




            <div class="col-md-9" id="calendar"></div>
        </div>
    </main>

    <footer class="border-top footer blue text-muted">
        <div class="container text-center">
            2021 - Family Calendar
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src='lib/calendar/lib/main.js'></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                aspectRatio: 2,
                themeSystem: 'bootstrap',
                initialView: 'dayGridMonth',
                height: 720,
                allDay: true,
                events: <?php echo json_encode($eventArray); ?>,
                eventColor: '#007bff',
                headerToolbar: {
                    left: 'prev',
                    center: 'title',
                    right: 'next'
                },

            });
            calendar.render();
        });

        function openCity(cityName) {
            var i;
            var x = document.getElementsByClassName("city");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            document.getElementById(cityName).style.display = "block";
        }

        $('#myTab a').on('click', function(e) {
            e.preventDefault()
            $(this).tab('show')
        })
    </script>
</body>

</html>