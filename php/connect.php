<?php 
    $host = "localhost";
    $user = "admin";
    $password = "password";

    // Create connection
    $conn = mysqli_connect('localhost', 'root', '', 'calendardb');

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>