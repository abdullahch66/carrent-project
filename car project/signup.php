<?php
// Database configuration
$servername = "localhost"; // Change if your server is different
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "car"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $username = $conn->real_escape_string($_POST['username']);
    // $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
    $password = $conn->real_escape_string($_POST['password']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $dob = $conn->real_escape_string($_POST['dob']);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO users (name, username, password, gender, dob) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $username, $password, $gender, $dob);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
