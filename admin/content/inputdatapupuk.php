<?php
include_once '../bin/php/config.php';

if (isset($_GET['task'])) {
    $tugasmentah = $_GET['task'];
    $tugas = explode(',', $tugasmentah);
    if ($tugas[0] == "edit") {
        $sql = "SELECT * FROM table_pupuk WHERE Kd_pupuk = '$tugas[1]'";
        $result = $conn->query($sql);
        $data = [];
        if ($result->num_rows > 0) {
            $nomor = 1;
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $data = $row;
            }
        } else {
            $data = "";
        }
    } elseif ($tugas[0] == "hapus") {
        $sql = "DELETE FROM `table_pupuk` WHERE `table_pupuk`.`Kd_pupuk` = '$tugas[1]'";
        $conn->query($sql);
    }
}
?>
<div class="container-fluid">
    <form method="POST" class="mt-3" style="width: 300px;" action="../bin/php/inputdatapupuk.php" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Kode Pupuk</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="kodepupuk" value="<?= isset($data['Kd_pupuk']) == true ? $data['Kd_pupuk'] : ""; ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="namapupuk" value="<?= isset($data['Nm_pupuk']) == true ? $data['Nm_pupuk'] : ""; ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Harga</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="hargapupuk" value="<?= isset($data['Harga']) == true ? $data['Harga'] : ""; ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Stok Pupuk</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="stokpupuk" value="<?= isset($data['Stok']) == true ? $data['Stok'] : ""; ?>">
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Foto</label>
            <input class="form-control" type="file" id="formFile" name="fotopupuk">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Save</button>
        <button class="btn btn-primary" name="update">Update</button>
    </form>
    <div class="mt-5">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Kode Pupuk</th>
                    <th>Nama Pupuk</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Foto</th>
                    <th>Action</th>
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
                        echo "
                                <tr class='bg-light text-center'>
                                    <td>$nomor</td>
                                    <td>" . $row['Kd_pupuk'] . "</td>
                                    <td>" . $row['Nm_pupuk'] . "</td>
                                    <td>" . $row['Harga'] . "</td>
                                    <td>" . $row['Stok'] . "</td>
                                    <td><img src='../bin/php/upload/$row[Gambar]' alt='' style='width: 100px; height:100px;'></td>
                                    <td>
                                        <center>
                                            <div class='btn-group' role='group' aria-label='Basic example'>
                                                <a role='button' class='btn btn-warning' href='?page=input-data&task=edit,$row[Kd_pupuk]'>Edit</a>
                                            </div>
                                        </center>
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
                    <th>No.</th>
                    <th>Kode Pupuk</th>
                    <th>Nama Pupuk</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Foto</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>

</div>