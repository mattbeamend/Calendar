<?php
session_start();

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
    <link href="./css/home.css" rel="stylesheet">
    <title>Home</title>
    <link href='lib/calendar/lib/main.css' rel='stylesheet' />

</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
            <div class="container-fluid">
                <a class="navbar-brand mb-1" href="home.php">Family Calendar</a>
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
        <h1 class="display-4 text-center">Welcome, <?php echo $_SESSION['firstname']; ?></h1>
        <div id="calendar"></div>
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
            });
            calendar.render();
        });
    </script>

</body>

</html>