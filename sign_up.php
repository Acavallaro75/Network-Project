<?PHP

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

// Checking for POST data from the browser //
if (isset($_POST['submit'])) {

    // Address two variable for apartments and suite numbers //
    $address_two = " ";

    /* Checking for variables in POST method; if field is not empty, assign a value
     * HTML Special Chars is used to protect against XSS (Cross Site Scripting)
     * Prepares the strings for entry to the database
     */
    if (!empty($_POST['first_name'])) {
        $first_name = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['first_name']));
    }

    if (!empty($_POST['last_name'])) {
        $last_name = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['last_name']));
    }

    if (!empty($_POST['username'])) {
        $username = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['username']));
    }

    if (!empty($_POST['password'])) {
        $password = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['password']));
    }

    if (!empty($_POST['email'])) {
        $email = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['email']));
    }

    if (!empty($_POST['address'])) {
        $address = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['address']));
    }

    if (!empty($_POST['address_two'])) {
        $address_two = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['address_two']));
    }

    if (!empty($_POST['state'])) {
        $state = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['state']));
    }

    if (!empty($_POST['city'])) {
        $city = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['city']));
    }

    if (!empty($_POST['zip'])) {
        $zip = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['zip']));
    }
    // End of checking for variables in POST and assigning variables values //

    // SQL query to enter to the database //
    $query = "INSERT INTO ACCOUNTS (first_name, last_name, username, password, email, address, city, state, zip) VALUES ('$first_name', '$last_name', '$username', '$password', '$email', '$address', '$city', '$state', '$zip')";

    // Using cookies to track user information for 24 hours //
    setcookie("first_name", $first_name, time() + 3600 * 24);
    setcookie("last_name", $last_name, time() + 3600 * 24);
    setcookie("username", $username, time() + 3600 * 24);
    setcookie("email", $email, time() + 3600 * 24);
    setcookie("address", $address, time() + 3600 * 24);
    setcookie("address_two", $address_two, time() + 3600 * 24);
    setcookie("city", $city, time() + 3600 * 24);
    setcookie("state", $state, time() + 3600 * 24);
    setcookie("zip", $zip, time() + 3600 * 24);
    // End of using cookies to track user information for 24 hours //

    // If successful query to the database, go to library page; otherwise, throw an error //
    if (mysqli_query($connection, $query)) {
        header('location: library.php');
    } else {
        echo "Connection error: " . mysqli_connect_error();
    }
    // End of checking for SQL error //
}
// End of checking for POST data from the browser //

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
    <title>Sign Up</title>
</head>
<!--End of Head-->

<!--Body-->
<body class="bg-light">

<!--Create an account form-->
<form method="POST">
    <div class="album py-5 bg-light container emp-profile">
        <div class="py-5 text-center">

            <!--Header-->
            <h2>Create Account</h2>
            <p class="lead">Creating an account allows for us to better personalize an experience for you, the user.</p>
        </div>

        <div class="col-md-12 order-md-1">
            <h4 class="mb-3">Contact Info</h4>
            <form class="needs-validation" novalidate>

                <!--First Name-->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">First name</label>
                        <input type="text" class="form-control" name="first_name" required>
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>
                    <!--End of first name-->

                    <!--Last Name-->
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Last name</label>
                        <input type="text" class="form-control" name="last_name" required>
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>
                </div>
                <!--End of last name-->

                <!--Username-->
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
                <!--End of username-->

                <!--Password-->
                <div class="mb-3">
                    <label for="password">Password</label>
                    <div class="input-group">

                        <input type="password" class="form-control" name="password" placeholder="password" required>
                        <div class="invalid-feedback" style="width: 100%;">
                            Your password is required.
                        </div>
                    </div>
                </div>
                <!--End of password-->

                <!--Email-->
                <div class="mb-3">
                    <label for="email">Email <span class="text-muted"></span></label>
                    <input type="text" class="form-control" name="email" placeholder="you@example.com" required>
                    <div class="invalid-feedback">
                        Please enter a valid email address.
                    </div>
                </div>
                <!--End of email-->

                <!--Address-->
                <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" placeholder="1234 Main St" required>
                    <div class="invalid-feedback">
                        Please enter your shipping address.
                    </div>
                </div>

                <!--Address continued-->
                <div class="mb-3">
                    <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                    <input type="text" class="form-control" name="address_two" placeholder="Apartment or suite">
                </div>
                <!--End of address continued-->

                <!--City-->
                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="city">City</label>
                        <input type="text" class="form-control" name="city" required>
                        <div class="invalid-feedback">
                            Valid city is required.
                        </div>
                    </div>
                    <!--End of city-->

                    <!--State-->
                    <div class="col-md-4 mb-3">
                        <label for="state">State</label>
                        <select name="state" class="custom-select d-block w-100" required>
                            <option value="state">Choose...</option>
                            <option value="Alabama">Alabama</option>
                            <option value="Alaska">Alaska</option>
                            <option value="Arizona">Arizona</option>
                            <option value="Arkansas">Arkansas</option>
                            <option value="California">California</option>
                            <option value="Colorado">Colorado</option>
                            <option value="Connecticut">Connecticut</option>
                            <option value="Delaware">Delaware</option>
                            <option value="Florida">Florida</option>
                            <option value="Georgia">Georgia</option>
                            <option value="Hawaii">Hawaii</option>
                            <option value="Idaho">Idaho</option>
                            <option value="Illinois">Illinois</option>
                            <option value="Indiana">Indiana</option>
                            <option value="Iowa">Iowa</option>
                            <option value="Kansas">Kansas</option>
                            <option value="Kentucky">Kentucky</option>
                            <option value="Louisiana">Louisiana</option>
                            <option value="Maine">Maine</option>
                            <option value="Maryland">Maryland</option>
                            <option value="Massachusetts">Massachusetts</option>
                            <option value="Michigan">Michigan</option>
                            <option value="Minnesota">Minnesota</option>
                            <option value="Mississippi">Mississippi</option>
                            <option value="Missouri">Missouri</option>
                            <option value="Montana">Montana</option>
                            <option value="Nebraska">Nebraska</option>
                            <option value="Nevada">Nevada</option>
                            <option value="New Hampshire">New Hampshire</option>
                            <option value="New Jersey">New Jersey</option>
                            <option value="New Mexico">New Mexico</option>
                            <option value="New York">New York</option>
                            <option value="North Carolina">North Carolina</option>
                            <option value="North Dakota">North Dakota</option>
                            <option value="Ohio">Ohio</option>
                            <option value="Oklahoma">Oklahoma</option>
                            <option value="Oregon">Oregon</option>
                            <option value="Pennsylvania">Pennsylvania</option>
                            <option value="Rhode Island">Rhode Island</option>
                            <option value="South Carolina">South Carolina</option>
                            <option value="South Dakota">South Dakota</option>
                            <option value="Tennessee">Tennessee</option>
                            <option value="Texas">Texas</option>
                            <option value="Utah">Utah</option>
                            <option value="Vermont">Vermont</option>
                            <option value="Virginia">Virginia</option>
                            <option value="Washington">Washington</option>
                            <option value="West Virginia">West Virginia</option>
                            <option value="Wisconsin">Wisconsin</option>
                            <option value="Wyoming">Wyoming</option>
                        </select>
                        <div class="invalid-feedback">
                            Please provide a valid state.
                        </div>
                    </div>
                    <!--End of state-->

                    <!--Zip-->
                    <div class="col-md-3 mb-3">
                        <label for="zip">Zip</label>
                        <input type="text" class="form-control" name="zip" required>
                        <div class="invalid-feedback">
                            Zip code required.
                        </div>
                    </div>
                    <!--End of zip-->
                </div>
                <!--End of create an account-->

                <!--Checkboxes-->
                <hr class="mb-4">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="same-address" checked>
                    <label class="custom-control-label" for="same-address">Shipping address is the same as my billing
                        address</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="save-info" checked>
                    <label class="custom-control-label" for="save-info">Save this information for next time</label>
                </div>
                <hr class="mb-4">
                <!--End of checkboxes-->

                <!--Donate Section-->
                <h4 class="mb-3">Donate <span class="text-muted">(Optional)</span></h4>

                <!--Credit Card-->
                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked
                               required>
                        <label class="custom-control-label" for="credit">Credit card</label>
                    </div>
                    <!--End of credit card-->

                    <!--Debit Card-->
                    <div class="custom-control custom-radio">
                        <input id="debit" name="paymentMethod" type="radio" class="custom-control-input">
                        <label class="custom-control-label" for="debit">Debit card</label>
                    </div>
                </div>
                <!--End of debit card-->

                <!--Amount-->
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="cc-name">Amount</label>
                        <input type="text" class="form-control" id="cc-name" placeholder="">
                    </div>
                </div>
                <!--End of amount-->

                <!--Name-->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="cc-name">Name on card</label>
                        <input type="text" class="form-control" id="cc-name" placeholder="">
                        <small class="text-muted">Full name as displayed on card</small>
                        <div class="invalid-feedback">
                            Name on card is required
                        </div>
                    </div>
                    <!--End of name-->

                    <!--Credit Card Number-->
                    <div class="col-md-6 mb-3">
                        <label for="cc-number">Credit card number</label>
                        <input type="text" class="form-control" id="cc-number" placeholder="">
                        <div class="invalid-feedback">
                            Credit card number is required
                        </div>
                    </div>
                </div>
                <!--End of credit card number-->

                <!--Expiration-->
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="cc-expiration">Expiration</label>
                        <input type="text" class="form-control" id="cc-expiration" placeholder="">
                        <div class="invalid-feedback">
                            Expiration date required
                        </div>
                    </div>
                    <!--End of expiration-->

                    <!--CVV-->
                    <div class="col-md-3 mb-3">
                        <label for="cc-expiration">CVV</label>
                        <input type="text" class="form-control" id="cc-cvv" placeholder="">
                        <div class="invalid-feedback">
                            Security code required
                        </div>
                    </div>
                </div>
                <!--End of CVV-->

                <!--Continue button-->
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">Continue</button>
                <!--End of continue button-->
            </form>
        </div>
    </div>
</form>
<!--End of form-->

</body>
<!--End of body-->
</html>