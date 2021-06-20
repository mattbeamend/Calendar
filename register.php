<?php include('php/database.php') ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="./css/register.css" rel="stylesheet">
    <title>Register</title>
</head>

<body>

    <div class="card text-dark bg-light mb-3">
        <h2 class="text-center">Create a New Calendar</h2>
        <hr />
        <form action="register.php" method="POST" class="row g-3">
            <div class="form-group">
                <label for="calName" class="form-label">Calendar Name</label>
                <input type="text" class="form-control" name="calName" placeholder="e.g. Smith's Calendar" required>
            </div>
            <div class="form-group">
                <label for="calID" class="form-label">Calendar ID</label>
                <input type="text" class="form-control" name="calID" placeholder="e.g. smith201" required>
            </div>

            <h5 class="text-center">Admin</h5>

            <div class="form-group col-md-6">
                <input type="text" class="form-control" name="adminFirstName" placeholder="First Name" required>
            </div>
            <div class="form-group col-md-6">
                <input type="text" class="form-control" name="adminLastName" placeholder="Last Name" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="adminUsername" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="adminPassword" placeholder="Password" required>
            </div>

            <div class="form-group text-center">
                <button type="submit" id="registerBtn" name="registerCal" class="btn btn-dark">Register</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>
</html>
