
<?php
// Database connection settings
$servername = "localhost"; // Change if your server is different
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "rent"; // Your database name
 // replace with your database password

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $car_model = $_POST['car-model'];
    $pickup_date = $_POST['pickup-date'];
    $dropoff_date = $_POST['dropoff-date'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO rentals (name, email, phone, car_model, pickup_date, dropoff_date) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $name, $email, $phone, $car_model, $pickup_date, $dropoff_date);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>
