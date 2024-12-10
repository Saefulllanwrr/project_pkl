<?php
include 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $room_type = $_POST['room_type'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    
    
    // Ensure the table 'recent_bookings' has the correct columns
    // Adjust the SQL query to match the actual column prices in the database
    $sql = "INSERT INTO rooms (room_type, price, status) VALUES ('$room_type', '$price', '$status')";
    if ($conn->query($sql) === TRUE) {
        header("Location: rooms.php?status=sukses");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
