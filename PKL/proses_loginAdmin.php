<?php
session_start();
include 'db.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM userr WHERE username = ?");
    if ($stmt) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $data = $result->fetch_array();
            // Verify the password
            if (password_verify($password, $data['password'])) {
                $_SESSION['username'] = $username;
                $_SESSION['userid'] = $data['id_user']; // Changed from 'userid' to 'id' to match the new table structure
                $_SESSION['status'] = 'login';
                echo "<script>
                alert('Login berhasil');
                </script>";
                header('Location: admin.php?status=sukses');
                exit();
            } else {
                echo "<script>
                alert('Login gagal: Password salah');
                </script>";
                header('Location: loginadmin.php?status=gagal');
                exit();
            }
        } else {
            echo "<script>
            alert('Login gagal: Username tidak ditemukan');
            </script>";
            header('Location: loginadmin.php?status=gagal');
            exit();
        }
    } else {
        echo "<script>
        alert('Database error: Unable to prepare statement');
        </script>";
        header('Location: loginadmin.php?status=gagal');
        exit();
    }
} else {
    echo "<script>
    alert('Username and password are required');
    </script>";
    header('Location: loginadmin.php?status=gagal');
    exit();
}
?>
