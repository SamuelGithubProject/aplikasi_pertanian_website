<?php
include 'config.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$sql = "SELECT * FROM table_admin WHERE UserName = '$username' AND psw_admin='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header("location: ../../admin/index.php");
} else {
    echo "<script>if (window.confirm('Username atau Password salah'))
{
    window.location.href = '../../index.php';
}
else
{
    window.location.href = '../../index.php';
}</script>";
}
