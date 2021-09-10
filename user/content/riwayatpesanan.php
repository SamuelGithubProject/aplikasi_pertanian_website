<div class="container-fluid">
    <div class="card mt-5" style="background-color: transparent; border: none;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <div class="row">
                    <div class="col">
                        Kode Transaksi
                    </div>
                    <div class="col">
                        Tanggal Transaksi
                    </div>
                    <div class="col text-center">
                        Keterangan
                    </div>
                    <div class="col text-center">
                    </div>
                </div>
            </li>
        </ul>
        <ul class="list-group list-group-flush my-3">
            <?php
            include_once "../bin/php/config.php";

            $sql = "SELECT a.Kd_pemesanan,a.Tgl_Transaksi,b.Status FROM `table_transaksi` as a
                    JOIN `table_validasipemesanan` as b
                    ON a.Kd_pemesanan = b.Kd_pemesanan
                    WHERE b.username = '$_SESSION[username]'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <li class='list-group-item'>
                        <div class='row'>
                            <div class='col'>
                                $row[Kd_pemesanan]
                            </div>
                            <div class='col'>
                                $row[Tgl_Transaksi]
                            </div>
                            <div class='col text-center'>
                                $row[Status]
                            </div>
                            <div class='col text-center'>
                                <button class='btn btn-primary' onClick='showDetailModal($row[Kd_pemesanan]);'>Show Data</button>
                            </div>
                        </div>
                    </li>
                    ";
                }
            }
            ?>

        </ul>
    </div>
</div>