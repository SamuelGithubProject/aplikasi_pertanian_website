<?php
include_once 'config.php';

$username = $_POST['username'];
$password = md5($_POST['password']);
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$notelepon1 = $_POST['notelepon1'];
$notelepon2 = $_POST['notelepon2'];

$sql = "INSERT INTO `table_customer` (username,psw_user,NoTelepon_1,Nama,Alamat,NoTelepon_2)
VALUES ('$username', '$password', '$notelepon1', '$nama', '$alamat', '$notelepon2')";

if ($conn->query($sql) == TRUE){
    header('Location: ../../index.php?page=beranda');
} else {
    $message = "Error: " . $sql . "<br>" . $conn->error;
    echo $message;
};

