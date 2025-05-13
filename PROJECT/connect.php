<?php
// Database connection details
$servername = "localhost";  // Default WAMP host
$username = "root";         // Default MySQL username for WAMP
$password = "123";             // Default MySQL password for WAMP (empty by default)
$dbname = "22ubc548";   // Database name
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $user = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // SQL query to insert data into the bookings table
    $sql = "INSERT INTO bookings (username, email, phone)
            VALUES ('$user', '$email', '$phone')";

    if ($conn->query($sql) === TRUE) {
        echo "Booking Successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>














































































