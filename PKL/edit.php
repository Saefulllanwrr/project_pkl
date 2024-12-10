<?php
include 'db.php'; // Pastikan untuk menyertakan koneksi database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $room_type = $_POST['room_type'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $status = $_POST['status'];

    // Update query
    $sql = "UPDATE booking SET name='$name', room_type='$room_type', check_in='$check_in', check_out='$check_out', status='$status' WHERE id_booking='$id'";

    if (mysqli_query($conn, $sql)) {
        // Redirect back to admin page or show success message
        header("Location: admin.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>