<?php
// Database configuration
$host = 'localhost';
$db = 'simple_form';
$user = 'root';
$pass = '';

// Connect to the database
try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    http_response_code(500); // Internal server error
    exit("Connection failed: " . $e->getMessage());
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Insert data into the database
    $sql = "INSERT INTO personal_info (name, email, phone) VALUES (:name, :email, :phone)";
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);

    if ($stmt->execute()) {
        http_response_code(200); // OK
        echo "Data inserted successfully!";
    } else {
        http_response_code(500); // Internal server error
        echo "Failed to insert data.";
    }
}
?>
