<?php
require_once 'config.php';

$sqlHitungProduk = "SELECT COUNT(*) as 'jumlah_data' FROM `table_pupuk`";
$result = $conn->query($sqlHitungProduk);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row['jumlah_data'];
    }
}

?>