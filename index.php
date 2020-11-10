<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <link rel="stylesheet" href="./core.css">
    <title>Welcome</title>
</head>

<body class="bg-light">


<div class="container">
    <div class="py-5 text-center">
        <form action="library.php" method="POST">
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
                <input type="text" class="form-control" name="password" placeholder="password" required>
                <div class="invalid-feedback">
                    Valid password is required.
                </div>
            </div>
    </div>

    <hr class="mb-4">
    <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">Sign In</button>
    <form>
        <hr class="mb-4">
        <p class="lead" style="text-align: center">Haven't signed up yet? Hit sign up now to create and account</p>
        <button class="btn btn-lg btn-block" name="signUp" onclick="location='./sign_up.php'">Sign up</button>
    </form?>
</div>

<footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2020 - PDF Library</p>
</footer>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>

