  <?php
session_start();


// Database connection details
$servername = "localhost";  // Default WAMP host
$username = "root";         // Default MySQL username for WAMP
$password = "123";          // Default MySQL password for WAMP (empty by default)
$dbname = "22ubc548";       // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all booking data
$sql = "SELECT * FROM bookings";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Booking List</h2>";
    echo "<table border='1'><tr><th>ID</th><th>Username</th><th>Email</th><th>Phone</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["username"] . "</td><td>" . $row["email"] . "</td><td>" . $row["phone"] . "</td></tr>";
    }

    echo "</table>";
} else {
    echo "No bookings found.";
}

$conn->close();
?>
