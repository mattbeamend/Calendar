<?php 

    session_start();
    include('connect.php');

    // Fetch all events for calendar from database and store in array for FullCalendar to use
    $calendarID = $_SESSION['calendarID'];
    $query = "SELECT title, start, end FROM events WHERE CalendarID = '$calendarID'";
    $result = mysqli_query($conn, $query);

    $eventArray = array();
    if($result->num_rows > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $eventArray[] = $row;
        }
    }else {
        echo "No results found!";
    }

    // Add events to events table in database from home.php
    if(isset($_POST['submitEvent'])) {

        $event = mysqli_real_escape_string($conn, $_POST['eventName']);
        $start = mysqli_real_escape_string($conn, $_POST['startDate']);
        $end = mysqli_real_escape_string($conn, $_POST['endDate']);

        if($end != null) {
            $end = date('Y-m-d', strtotime("+1 day", strtotime($end)));
        }
        $creator = $_SESSION['username'];
        $calendarID = $_SESSION['calendarID'];

        $query = "INSERT INTO events (title, start, end, Creator, CalendarID) VALUES ('$event', '$start', '$end', '$creator', '$calendarID')";
        $result = mysqli_query($conn, $query);

        header('location: home.php');
    }





?>