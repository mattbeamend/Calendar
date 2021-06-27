<?php 

    session_start();
    include('connect.php');
    
    $calendarID = $_SESSION['calendarID'];


    $query = "SELECT * FROM calendars WHERE Tag = '$calendarID'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1) {   
        while($row = mysqli_fetch_assoc($result)) {
            $_SESSION['calendarName'] = $row['Name'];
        };
    }


    // Fetch all events for calendar from database and store in array for FullCalendar to use
    
    $query = "SELECT events.title, events.start, events.end, users.color FROM events INNER JOIN users ON events.CalendarID = '$calendarID' AND events.Creator = users.Username";
    $result = mysqli_query($conn, $query);

    $eventArray = array();
    if($result->num_rows > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $eventArray[] = $row;
        }
    }

    $query2 = "SELECT * FROM users WHERE Calendar = '$_SESSION[calendarID]'";
    $result2 = mysqli_query($conn, $query2);


    // Add events to events table in database from index.php
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

        header('location: index.php');
    }

    if(isset($_POST['editEvent'])) {
        
        $event = mysqli_real_escape_string($conn, $_POST['editEventName']);
        $start = mysqli_real_escape_string($conn, $_POST['editStartDate']);
        $end = mysqli_real_escape_string($conn, $_POST['editEndDate']);
        $originalName = mysqli_real_escape_string($conn, $_POST['originalName']);

        if($end != null) {
            $end = date('Y-m-d', strtotime("+1 day", strtotime($end)));
        }
        $calendarID = $_SESSION['calendarID'];

        $query = "UPDATE events SET title = '$event', start = '$start', end = '$end' WHERE CalendarID = '$calendarID' AND title = '$originalName'";
        $result = mysqli_query($conn, $query);
        header('location: index.php');

    }

    if(isset($_POST['removeEvent'])) {
        
        $event = mysqli_real_escape_string($conn, $_POST['removeEventName']);
        $start = mysqli_real_escape_string($conn, $_POST['removeStartDate']);
        $end = mysqli_real_escape_string($conn, $_POST['removeEndDate']);

        if($end != null) {
            $end = date('Y-m-d', strtotime("+1 day", strtotime($end)));
        }
        $calendarID = $_SESSION['calendarID'];

        $query = "DELETE FROM events WHERE title = '$event' AND start = '$start' AND end = '$end' AND CalendarID = '$calendarID'";
        $result = mysqli_query($conn, $query);
        header('location: index.php');

    }

    // Fetch selected event start and end dates






?>