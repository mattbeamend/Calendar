<?php include('php/database.php') ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="./css/adduser.css" rel="stylesheet">
    <title>Add User</title>
</head>

<body>

    <div class="card text-dark bg-light mb-3">
        <h2 class="text-center">Join a Calendar</h2>
        <hr />
        <form action="adduser.php" method="POST" class="row g-3">

            <div class="input-group">
                <span class="input-group-text" id="calID">Calendar ID</span>
                <input type="text" class="form-control" name="calID" placeholder="e.g. smith201" required>
            </div>

            <div class="form-group col-md-6">
                <input type="text" class="form-control" name="userFirstName" placeholder="First Name" required>
            </div>
            <div class="form-group col-md-6">
                <input type="text" class="form-control" name="userLastName" placeholder="Last Name" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="userUsername" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="userPassword" placeholder="Password" required>
            </div>

            <div class="form-group text-center">
                <button type="submit" id="addBtn" name="addUser" class="btn btn-dark">Register</button>
            </div>
            <a class="text-center" href="login.php">Back to Login.</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>
</html>