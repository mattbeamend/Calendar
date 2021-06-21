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
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.css' rel='stylesheet' />
    <link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>
    <link href='lib/calendar/lib/main.css' rel='stylesheet' />
    <link href="./css/home.css" rel="stylesheet">
    <title>Home</title>

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
            <div class="container-fluid">
                <a class="navbar-brand mb-1" href="home.php">Family Calendar</a>
                <div class="navbar-collapse collapse d-sm-inline-flex justify-content-between">
                    <ul class="navbar-nav flex-grow-1">
                        <li class="nav-item">
                            <a id="homeBtn" class="nav-link" href="home.php">Home</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a id="altProfileLink" class="nav-link" href="account.php"><?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?> </a>
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
            <div id="custom-card" class="card text-dark bg-light col-md-3">
                <h2 style="margin-top: 20px;" class="text-center"><?php echo $_SESSION['calendarName']; ?></h2>
                <hr />
                <h5 class="card-title text-center">Add an Event</h5>
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
                eventColor: '#378006'
            });
            calendar.render();
        });

        $('#calendar').fullCalendar('removeEvents', function(ev) {
            return (ev._id == calEvent._id);
        })
    </script>
</body>
</html>