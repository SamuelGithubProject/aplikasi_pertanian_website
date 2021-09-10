<?php
require_once 'config.php';

$kodepesan = $_POST['kode_pesan'];
$task = $_POST['task'];

if ($task == "selectingData") {
    $sql = "SELECT (Pesanan) FROM table_transaksi WHERE Kd_pemesanan='$kodepesan'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo json_encode($row);
        }
    }
} elseif ($task == "deletingData") {
    $sql = "DELETE FROM table_transaksi WHERE Kd_pemesanan='$kodepesan'";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} elseif ($task == "deletingDataPupuk") {
    $kodepupuk = $_POST['kodepupuk'];

    $sql = "DELETE FROM `table_pupuk` WHERE Kd_pupuk='$kodepupuk'";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}