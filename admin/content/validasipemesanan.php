<?php
include_once '../bin/php/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $perintah = explode(",", $id);
    $kode_pemesanan = $perintah[0];
    $value = $perintah[1];

    $sql = "UPDATE table_validasipemesanan SET Status='$value' WHERE Kd_pemesanan=$kode_pemesanan";
    $conn->query($sql);
}

?>
<div class="container-fluid">
    <div class="mt-5">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Tanggal Transaksi</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Alamat</th>
                    <th>Pesanan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once "../bin/php/config.php";

                $sql = "SELECT a.Kd_pemesanan,a.Tgl_Transaksi,a.Nama,a.Alamat,a.Pesanan,b.username,b.Status FROM `table_transaksi` as a
                        JOIN `table_validasipemesanan` as b
                        ON a.Kd_pemesanan = b.Kd_pemesanan";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $nomor = 1;
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        if ($row['Status'] == "Belum Divalidasi") {
                            $status = "
                            <center>
                                <div class='btn-group' role='group' aria-label='Basic example'>
                                    <a class='btn btn-success' href='?page=validasi&id=$row[Kd_pemesanan],Valid' role='button'>Valid</a>
                                    <a class='btn btn-danger' href='?page=validasi&id=$row[Kd_pemesanan],Invalid' role='button'>Invalid</a>
                                </div>
                            </center>
                            ";
                        } else {
                            $status = "Valid";
                        }

                        if ($row['Pesanan']) {
                            $buttonData = "<button class='btn btn-primary' onClick='showDetailModal($row[Kd_pemesanan]);'>Show Data</button>";
                        }
                        echo "
                                <tr class='bg-light text-center'>
                                    <td>$nomor</td>
                                    <td>" . $row['Tgl_Transaksi'] . "</td>
                                    <td>" . $row['Nama'] . "</td>
                                    <td>" . $row['username'] . "</td>
                                    <td>" . $row['Alamat'] . "</td>
                                    <td>$buttonData</td>
                                    <td>
                                        $status
                                    </td>
                                </tr>
                            ";

                        $nomor++;
                    }
                } else {
                    echo "
                    <tr class='bg-light text-center'>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                        ";
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>No.</th>
                    <th>Tanggal Transaksi</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Alamat</th>
                    <th>Pesanan</th>
                    <th>Status</th>
                </tr>
            </tfoot>
        </table>
    </div>

</div>