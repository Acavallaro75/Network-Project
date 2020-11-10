<?PHP

// Connect to database //
$connection = mysqli_connect('localhost', 'andrew', 'networkproject', 'users');

// Check connection //
if (!$connection) {
    echo "Connection error: " . mysqli_connect_error();
}