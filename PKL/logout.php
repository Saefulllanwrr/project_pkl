<?php
session_start();
session_destroy();
echo"<script>
alert('Logout Berhasil');
</script>";
header('Location: loginadmin.php? status=sukses');
?>