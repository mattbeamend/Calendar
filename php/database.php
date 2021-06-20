<?php

    session_start();

    $host = "localhost";
    $user = "admin";
    $password = "password";

    // Create connection
    $conn = mysqli_connect('localhost', 'root', '', 'calendardb');

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if(isset($_POST['registerCal'])) {
        $calName = mysqli_real_escape_string($conn, $_POST['calName']);
        $calID = mysqli_real_escape_string($conn, $_POST['calID']);

        $adminFirstName = mysqli_real_escape_string($conn, $_POST['adminFirstName']);
        $adminLastName = mysqli_real_escape_string($conn, $_POST['adminLastName']);
        $adminUsername = mysqli_real_escape_string($conn, $_POST['adminUsername']);
        $adminPassword = mysqli_real_escape_string($conn, $_POST['adminPassword']);
        $password = md5($adminPassword);

        $query = "INSERT INTO calendars (Tag, Name, Admin) VALUES ('$calID', '$calName', '$adminUsername')";
        $query2 = "INSERT INTO users (Account, Username, FirstName, LastName, Password, Calendar) VALUES ('admin', '$adminUsername', '$adminFirstName', '$adminLastName', '$password', '$calID')";

        $result = mysqli_query($conn, $query);
        $result2 = mysqli_query($conn, $query2);

        $_SESSION['username'] = $adminUsername;
        $_SESSION['firstname'] = $adminFirstName;
        $_SESSION['lastname'] = $adminLastName;
        $_SESSION['calendarID'] = $calID;

        header('location: home.php');

    }

    if(isset($_POST['login'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $password = md5($password);

        $query = "SELECT * FROM users WHERE  Username = '$username' AND Password = '$password'";

        $result = mysqli_query($conn, $query);
        
        if(mysqli_num_rows($result) == 1) {
            
            while($row = mysqli_fetch_assoc($result)) {
                $_SESSION['username'] = $row['Username'];
                $_SESSION['firstname'] = $row['FirstName'];
                $_SESSION['lastname'] = $row['LastName'];
                $_SESSION['calendarID'] = $row['Calendar'];
            }
            
            header('location: home.php');
        }else {
            echo "Incorrect Username/Password";
        }
    }

    if(isset($_POST['addUser'])) {
        $calendarID = mysqli_real_escape_string($conn, $_POST['calID']);
        $firstname = mysqli_real_escape_string($conn, $_POST['userFirstName']);
        $lastname = mysqli_real_escape_string($conn, $_POST['userLastName']);
        $username = mysqli_real_escape_string($conn, $_POST['userUsername']);
        $password = mysqli_real_escape_string($conn, $_POST['userPassword']); 
        $password = md5($password);

        $query = "SELECT * FROM calendars WHERE Tag = '$calendarID'";
        $query2 = "INSERT INTO users (Account, Username, FirstName, LastName, Password, Calendar) VALUES ('user', '$username', '$firstname', '$lastname', '$password', '$calendarID')";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) == 1) {
            $result = mysqli_query($conn, $query2);

            $_SESSION['username'] = $username;
            $_SESSION['firstname'] = $firstname;
            $_SESSION['lastname'] = $lastname;
            $_SESSION['calendarID'] = $calendarID;

            header('location: home.php');
        }


        
    }


?>