<?php
session_start();

date_default_timezone_set("Asia/Jakarta");
$currentdate = date("Y-m-d H:i:s");

$user_name = $_SESSION['username'];
$task = $_POST['task'];

require_once 'config.php';

$namapupuk = $_POST['namapupuk'];
$jumlahpesanan = $_POST['jumlahpesanan'];

if ($task == "getspecificdata") {

  $sqlcari = "SELECT Kd_pupuk,Nm_pupuk,Harga FROM `table_pupuk` WHERE Nm_pupuk = '$namapupuk'";
  $resultcari = $conn->query($sqlcari);
  $dataarray = array();

  if ($resultcari->num_rows > 0) {
    // output data of each row
    while($rowcari = $resultcari->fetch_assoc()) {
          $dataarray[] = $rowcari;
          array_push($dataarray, $jumlahpesanan);
      }
      echo json_encode($dataarray);
  } else {
    echo "0 results";
  }

} else if ($task == "insertData"){
  $jsonData = $_POST['data'];

  $sqlinsert = "SELECT Nama,Alamat FROM `table_customer` WHERE username = '$user_name'";
  $resultinsert = $conn->query($sqlinsert);

  if ($resultinsert->num_rows > 0) {
    // output data of each row
    while($rowinsert = $resultinsert->fetch_assoc()) {
      $sqlDataInsert = "INSERT INTO `table_transaksi` (Tgl_Transaksi,Nama,Alamat,Pesanan)
                        VALUES ('$currentdate','$rowinsert[Nama]','$rowinsert[Alamat]','$jsonData')";
      if ($conn->query($sqlDataInsert) == TRUE) {
        $sqltahap = "INSERT INTO `table_validasipemesanan` (username,Status)
                    VALUES ('$user_name','Belum Divalidasi')";
        if ($conn->query($sqltahap) == TRUE) {
          echo "Berhasil";
        }
      }
    }
  }
}

