<div class="container-fluid">
    <div class="d-flex align-items-center justify-content-center">
        <div class="p-2 bd-highlight col-example">
            <h4 class="text-center"><b>INPUT DATA PESANAN</b></h4>
            <form class="mt-3 mb-3" id="formPesanan">
            <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">
            <?php
                include_once '../bin/php/config.php';

                $sqlProduk = "SELECT * FROM `table_pupuk`";
                $result = $conn->query($sqlProduk);
                if ($result->num_rows > 0) {
                // output data of each row
                    $number = 1;
                    while($row = $result->fetch_assoc()) {
                        echo "
                        <div class='col'>
                            <div class='card'>
                                <img src='../bin/php/upload/$row[Gambar]' class='card-img-top' alt=''>
                                <div class='card-body'>
                                    <h5 class='card-title nama-pupuk$number'><b>$row[Nm_pupuk]</b></h5>
                                    <p class='card-text'>Harga : Rp. $row[Harga]</p>
                                </div>
                                <div class='card-footer text-center'>
                                    <div class='input-group'>
                                        <span class='input-group-btn'>
                                            <button type='button' class='btn btn-danger btn-number' data-field='quant[2]' id='btnminus$number'>-</button>
                                        </span>
                                        <input type='text' name='quant[2]' class='form-control input-number text-center' value='0' min='1' max='100' id='fieldNumber$number'>
                                        <span class='input-group-btn'>
                                            <button type='button' class='btn btn-success btn-number' data-field='quant[2]' id='btnplus$number'>+</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        ";
                        $number++;
                    }
                } else {
                echo "
                    <div class='d-flex flex-column min-vh-100 justify-content-center align-items-center'>
                        <h3>Data Produk Kosong</h3>
                    </div>";
                }
            ?>
            </div>
                <button type="submit" class="btn btn-primary mt-3" name="submit">Proses</button>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Detail Transaksi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="text-center mb-4">
            <h3>Total Pesanan :</h3>
            <h5 id="totalBayar">Rp. <b></b>,-</h5>
        </div>
        <p>Dengan detail pesanan, sebagai berikut :</p>
        <table class="table table-success table-striped mb-3">
            <thead>
                <tr>
                    <th>Nama Pupuk</th>
                    <th>Harga</th>
                    <th>Jumlah Pesanan (Pcs/Kg)</th>
                <tr>
            </thead>
            <tbody id="isiDataPesanan"></tbody>
        </table>
        <p class="text-center">Silahkan melakukan pembayaran ke rekening berikut ini, agar kami dapat memproses pesanan anda.</p>
        <p class="text-center">
            <b>Rekening BRI Cabang Kota Medan</b>
            </br>
            <b>No.Rekening : 1334-1555-1667-06-8</b>
            </br>
            <b>A.n Harapan Seni Tani</b>
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onClick="ProsesPesanan();">Proses Pesanan</button>
      </div>
    </div>
  </div>
</div>
