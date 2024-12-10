<?php
include 'db.php'; // Ensure to include the database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Corrected to check the request method
    $id = $_POST['id_room']; // Get the room ID from the form
    $room_type = $_POST['room_type'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    // Update query
    $sql = "UPDATE rooms SET room_type='$room_type', price='$price', status='$status' WHERE id_room='$id'"; // Fixed variable name

    if (mysqli_query($conn, $sql)) {
        // Redirect back to rooms page or show success message
        header("Location: rooms.php?status=success");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>