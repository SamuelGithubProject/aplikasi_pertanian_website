<div class="container-fluid">
    <button class="btn btn-primary me-md-2 btn-print" style="float: right;" type="button" id="btnPrintlaporan" onclick="window.print();">Print</button>
    <h1 class="text-center mt-3" id="titleShown">Laporan Data Pupuk</h1>
    <div class="mt-5">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Pupuk</th>
                    <th>Nama Pupuk</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Gambar</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once "../bin/php/config.php";

                $sql = "SELECT * FROM table_pupuk";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $nomor = 1;
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        $buttonDel = "
                        <div class='text-center'>
                            <button class='btn btn-danger' id='btnDeletePupuk$nomor' onClick='deletingDataPupuk($nomor);' data-pupuk='$row[Kd_pupuk]'><i class='fas fa-trash-alt'></i></button>
                        </div>
                        ";
                        echo "
                                <tr class='bg-light text-center'>
                                    <td>$nomor</td>
                                    <td>" . $row['Kd_pupuk'] . "</td>
                                    <td>" . $row['Nm_pupuk'] . "</td>
                                    <td>" . $row['Harga'] . "</td>
                                    <td>" . $row['Stok'] . "</td>
                                    <td><img src='../bin/php/upload/$row[Gambar]' alt='' style='width: 100px; height:100px;'></td>
                                    <td>
                                        $buttonDel
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
                    </tr>
                        ";
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Kode Pupuk</th>
                    <th>Nama Pupuk</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Gambar</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>

</div>