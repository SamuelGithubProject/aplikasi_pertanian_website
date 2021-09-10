<div class="container-fluid">
    <button class="btn btn-primary me-md-2 btn-print" style="float: right;" type="button" id="btnPrintlaporan" onclick="window.print();">Print</button>
    <h1 class="text-center mt-3" id="titleShown">Laporan Data Transaksi</h1>
    <div class="mt-5">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Tanggal Transaksi</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Alamat</th>
                    <th>Pesanan</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once "../bin/php/config.php";

                $sql = "SELECT a.Kd_pemesanan,a.Tgl_Transaksi,a.Nama,a.Alamat,a.Pesanan,b.username FROM `table_transaksi` as a
                        JOIN `table_validasipemesanan` as b
                        ON a.Kd_pemesanan = b.Kd_pemesanan";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $nomor = 1;
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        if ($row['Pesanan']) {
                            $buttonAction = "
                            <div class='text-center'>
                                <button class='btn btn-danger' onClick='deletingReports($row[Kd_pemesanan]);'><i class='fas fa-trash-alt'></i></button>
                            </div>
                            ";
                            $status = "<button class='btn btn-primary' onClick='showDetailModal($row[Kd_pemesanan]);'>Show Data</button>";
                        }
                        echo "
                                <tr class='bg-light text-center'>
                                    <td>$nomor</td>
                                    <td>" . $row['Tgl_Transaksi'] . "</td>
                                    <td>" . $row['Nama'] . "</td>
                                    <td>" . $row['username'] . "</td>
                                    <td>" . $row['Alamat'] . "</td>
                                    <td>
                                        $status
                                    </td>
                                    <td>
                                    $buttonAction
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
                    </tr>
                        ";
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Nomor</th>
                    <th>Tanggal Transaksi</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Alamat</th>
                    <th>Pesanan</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>

</div>