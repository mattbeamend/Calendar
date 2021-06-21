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
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/vendor/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet" href="assets/vendor/sweetalert2/dist/sweetalert2.min.css">
    <link href='lib/calendar/lib/main.css' rel='stylesheet' />
    <link href="./css/home.css" rel="stylesheet">
    <title>Home</title>

</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
            <div class="container-fluid">
                <a class="navbar-brand mb-1" href="home.php"><?php echo $_SESSION['calendarID']; ?></a>
            </div>
            <div class="navbar-collapse collapse d-sm-inline-flex justify-content-between">
                <ul class="navbar-nav flex-grow-1">
                    <li class="nav-item">
                        <a id="logoutBtn" class="nav-link" href="home.php?logout='1'">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main class="container">
        <h2 class="text-left">Welcome <?php echo $_SESSION['firstname']; ?></h2>
        <div class="row">
            <div id="custom-card" class="card text-dark bg-light col-md-4">
                <h5 style="margin-top: 20px;" class="card-title text-center">Add an Event</h5>
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
            <div class="col-md-8" id="calendar"></div>
        </div>
    </main>



    <footer class="border-top footer blue text-muted">
        <div class="container text-center">
            2021 - Family Calendar
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src='lib/calendar/lib/main.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                aspectRatio: 2,
                themeSystem: 'boostrap',
                initialView: 'dayGridMonth',
                height: 650,
                allDay: true,
                events: <?php echo json_encode($eventArray); ?>
            });
            calendar.render();
        });
    </script>

</body>

</html>