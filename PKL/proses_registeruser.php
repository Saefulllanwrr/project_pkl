<?php
session_start();
// Koneksi ke database
include 'db.php';

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mengambil data dari form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password

    // Memeriksa apakah username atau email sudah ada
    $checkSql = "SELECT * FROM users WHERE username='$username' OR email='$email'";
    $checkResult = $conn->query($checkSql);

    if ($checkResult->num_rows > 0) {
        echo "<script>alert('Username atau email sudah terdaftar. Silakan gunakan yang lain.'); window.history.back();</script>";
    } else {
        // Menyiapkan dan mengeksekusi query
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
            
        if ($conn->query($sql) === TRUE) {
            header("Location: register.php?status=sukses");
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    }

    // Menutup statement dan koneksi
    // $stmt->close(); // This line is not needed as we are not using prepared statements
}

$conn->close();
?>