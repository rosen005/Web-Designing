<?php
$servername = "localhost";  // The host, typically "localhost" when using WAMP server
$username = "root";         // The username for MySQL (default is "root")
$password = "";             // The password for MySQL (default is an empty string)
$dbname = "booking_system"; // The name of the database where you want to store the booking data

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data using POST method
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];

    // Prepare the SQL query to insert data into the 'bookings' table
    $sql = "INSERT INTO bookings (username, email, phone_number) VALUES (?, ?, ?)";

    // Prepare and bind the SQL query to prevent SQL injection
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sss", $username, $email, $phone_number);

        // Execute the query
        if ($stmt->execute()) {
            echo "Booking successfully made!";  // Success message
        } else {
            echo "Error: " . $stmt->error;    // Error message
        }

        // Close the statement after executing the query
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;  // Error in preparing the statement
    }

    // Close the connection after finishing
    $conn->close();
}
?>