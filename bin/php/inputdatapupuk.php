<?php
include_once 'config.php';

$kodepupuk = $_POST['kodepupuk'];
$namapupuk = $_POST['namapupuk'];
$hargapupuk = $_POST['hargapupuk'];
$stokpupuk = $_POST['stokpupuk'];
$filename = basename($_FILES["fotopupuk"]["name"]);

if (isset($_POST["submit"])) {
    $sql = "INSERT INTO `table_pupuk` VALUES ('$kodepupuk', '$namapupuk', '$hargapupuk', '$stokpupuk', '$filename')";

    if ($conn->query($sql) === TRUE) {
        $target_dir = "upload/";
        $target_file = $target_dir . $filename;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (file_exists($target_file)) {
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
        } else {
            move_uploaded_file($_FILES["fotopupuk"]["tmp_name"], $target_file);
        }
        header('Location: ../../admin/index.php?page=input-data');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_POST['update'])) {
    $sql = "UPDATE table_pupuk
            SET Kd_pupuk='$kodepupuk', Nm_pupuk='$namapupuk', Harga='$hargapupuk', Stok='$stokpupuk', Gambar='$filename'
            WHERE Kd_pupuk='$kodepupuk'";

    if ($conn->query($sql) === TRUE) {
        $target_dir = "upload/";
        $target_file = $target_dir . $filename;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (file_exists($target_file)) {
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
        } else {
            move_uploaded_file($_FILES["fotopupuk"]["tmp_name"], $target_file);
        }
        header('Location: ../../admin/index.php?page=input-data');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
