<?php

// Connection to database variables //
$server = "localhost";
$username = "andrew";
$password = "networkproject";
$database = "users";

// Connecting to the database //
$connection = mysqli_connect($server, $username, $password, $database);

// Checking for database errors //
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">

<!--Head-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <link rel="stylesheet" href="./profile.css">
    <link rel="stylesheet" href="./core.css">
    <title>Welcome</title>
</head>
<!--End of head-->

<!--Body-->
<body class="bg-light">

<div class="album py-5 bg-light container emp-profile">

    <!--Sign In Form -->
    <div class="py-5 text-center">
        <form method="POST">
            <h2>Sign In</h2>
    </div>

    <div class="col-md-12 order-md-1">
        <form class="needs-validation" novalidate>
            <div class="mb-3">
                <label for="username">Username</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">@</span>
                    </div>
                    <input type="text" class="form-control" name="username" placeholder="username" required>
                    <div class="invalid-feedback" style="width: 100%;">
                        Your username is required.
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="password" required>
                <div class="invalid-feedback">
                    Valid password is required.
                </div>
            </div>
    </div>
    <!--End of Sign In Form -->

    <!--Sign Up Form-->
    <hr class="mb-4">
    <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">Sign In</button>
    <?php

    if (isset($_POST['submit'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM ACCOUNTS WHERE username = '$username' AND password = '$password'";

        $sql = mysqli_query($connection, $query);

        if (mysqli_num_rows($sql)) {
            $user = mysqli_fetch_assoc($sql);
            $result = $connection->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    setcookie("first_name", $row["first_name"], time() + 3600 * 24);
                    setcookie("last_name", $row["last_name"], time() + 3600 * 24);
                    setcookie("username", $row["username"], time() + 3600 * 24);
                    setcookie("email", $row["email"], time() + 3600 * 24);
                    setcookie("address", $row["address"], time() + 3600 * 24);
                    setcookie("city", $row["city"], time() + 3600 * 24);
                    setcookie("state", $row["state"], time() + 3600 * 24);
                    setcookie("zip", $row["zip"], time() + 3600 * 24);

                    if ($row["address_two"] == NULL) {
                        setcookie("address_two", " ", time() + 3600 * 24);
                    } else {
                        setcookie("address_two", $row["address_two"], time() + 3600 * 24);
                    }
                }
            }
            header("location: library.php");
        } else {
            echo '<b style="color:red;"><center>Invalid username or password, please try again!</b></center>';
        }
    }

    ?>
    <form>
        <hr class="mb-4">
        <p class="lead" style="text-align: center">Haven't signed up yet? Hit sign up now to create an account</p>
        <button class="btn btn-lg btn-block" name="signUp" onclick="location='./sign_up.php'">Sign up</button>
    </form?>
            <!--End of Sign Up Form-->
</div>

</body>
<!--End of Body-->

</html>

