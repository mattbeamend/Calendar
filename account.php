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
    <link href="./css/account.css" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.css' rel='stylesheet' />
    <title>Account</title>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark nav-bk5 mb-3">
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

    <main class="container">
        <div style="padding: 10px;" id="custom-card" class="card text-dark bg-light col-md-4">
           <h2 class="text-center">Account Details</h2>
           <p><strong>Name:</strong> <?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?></p>
           <p><strong>Username:</strong> <?php echo $_SESSION['username']?>
           <p><strong>Account Calendar:</strong> <?php echo $_SESSION['calendarName']?>
           <p><strong>Calendar ID:</strong> <?php echo $_SESSION['calendarID']?></p>

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

</body>

</html>