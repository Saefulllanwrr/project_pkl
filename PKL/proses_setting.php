<?php
include 'db.php'; // Pastikan untuk menyertakan koneksi database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_GET['id_user'];
    $newName = $_POST['username'];
    $newEmail = $_POST['email'];
    $newPassword = $_POST['password'];

    // Prepare the update query
    $stmt = $conn->prepare("UPDATE userr SET name=?, email=?". (!empty($newPassword) ? ", password=?" : "") ." WHERE id_user=?");
    
    if (!empty($newPassword)) {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt->bind_param("sssi", $newName, $newEmail, $hashedPassword, $id);
    } else {
        $stmt->bind_param("ssi", $newName, $newEmail, $id);
    }

    if ($stmt->execute()) {
        // Redirect back to settings page or show success message
        header("Location: setting.php");
        exit();
    } else {
        echo "Error updating record: " . $stmt->error;
    }
    $stmt->close();
}