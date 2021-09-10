<?php
include 'config.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$sql = "SELECT * FROM table_customer WHERE username = '$username' AND psw_user ='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header("location: ../../user/index.php");
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
