<?php
include 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $room_type = $_POST['room_type'];
    $name = $_POST['name'];
    $check_in = $_POST['checkIn'];
    $check_out = $_POST['checkOut'];
    
    // Ensure the table 'recent_bookings' has the correct columns
    // Adjust the SQL query to match the actual column names in the database
    $sql = "INSERT INTO booking (room_type, name, check_in, check_out) VALUES ('$room_type', '$name', '$check_in', '$check_out')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?status=sukses");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
