<?php
session_start();

if (isset($_SESSION['status']) === false) {
    header('Location: ../index.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bin/plugin/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../bin/css/bodyadmin.css">
    <link href="../bin/plugin/sidebar/css/simple-sidebar.css" rel="stylesheet">
    <script src="../bin/plugin/bootstrap/js/bootstrap.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <title>Dashboard || User</title>
</head>

<body>
    <div class="card content-wrap">
        <img src="../bin/image/samplephoto.jpg" class="card-img-top" alt="...">
        <div class="container-fluid bg-info">
            <div class=" d-flex flex-column bd-highlight">
                <div class="bd-highlight text-center"><b>SELAMAT DATANG DI BELANJA ONLINE</b></div>
                <div class="bd-highlight text-center"><b>
                        <?php
                        date_default_timezone_set("Asia/Jakarta");
                        echo "Tanggal : ", date('d/M/Y'), "  ||  ", "Jam : ", date('H:i');
                        ?>
                    </b></div>
                <div class="bd-highlight text-center"><b>
                        <?php
                        if (isset($_GET['page'])) {
                            $page = $_GET['page'];
                            if ($page == "beranda") {
                                echo "BERANDA";
                            } elseif ($page == "pemesanan") {
                                echo "INPUT PESANAN";
                            } elseif ($page == "riwayat-pesanan") {
                                echo "RIWAYAT PESANAN";
                            }
                        } else {
                            echo "BERANDA";
                        }
                        ?>
                    </b></div>
            </div>
        </div>
        <div class="card-body m-0 p-0">
            <div class="d-flex" id="wrapper">

                <div class="bg-success border-right" id="sidebar-wrapper">
                    <div class="sidebar-heading"></div>
                    <div class="list-group list-group-flush">
                        <a href="?page=beranda" class="list-group-item list-group-item-action bg-success">Beranda</a>
                        <a href="?page=pemesanan" class="list-group-item list-group-item-action bg-success">Input Pemesanan</a>
                        <a href="?page=riwayat-pesanan" class="list-group-item list-group-item-action bg-success">Riwayat Pemesanan</a>
                        <a href="../bin/php/logout.php" class="list-group-item list-group-item-action bg-success">LOGOUT</a>
                    </div>
                </div>

                <div id="page-content-wrapper">

                    <nav class="navbar navbar-expand-lg navbar-dark bg-success border-bottom px-2">
                        <button class="btn btn-primary" id="menu-toggle">Menu</button>
                    </nav>

                    <div class="container-fluid">
                        <?php
                        if (isset($_GET['page'])) {
                            $page = $_GET['page'];
                            if ($page == "beranda") {
                                include_once 'content/beranda.php';
                            } elseif ($page == "pemesanan") {
                                include_once 'content/pesanan.php';
                            } elseif ($page == "riwayat-pesanan") {
                                include_once 'content/riwayatpesanan.php';
                            }
                        } else {
                            include_once 'content/beranda.php';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-center bg-success">
            &copy; Copyright Reserved on 2021 || Created by Sontiana
        </div>

        <div class="modal fade" id="modalShowPesanan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Detail Pesanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-success table-striped">
                    <thead>
                        <tr>
                            <th>Kode Pupuk</th>
                            <th>Nama Pupuk</th>
                            <th>Harga Pupuk</th>
                            <th>Jumlah Pupuk</th>
                        </tr>
                    </thead>
                    <tbody id="showDataPesanan">
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="../bin/plugin/sidebar/vendor/jquery/jquery.min.js"></script>
    <script src="../bin/plugin/sidebar/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="../bin/js/pesanan.js"></script>
    <script src="../bin/js/showmodal.js"></script>

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>

</html>