<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Pertanian</title>
    <link rel="stylesheet" href="bin/plugin/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bin/css/bodyhome.css">
    <link rel="stylesheet" href="bin/plugin/datepicker/dist/mc-calendar.min.css" />
    <script src="/dist/mc-calendar.min.js"></script>
    <script src="bin/plugin/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="bin/plugin/datepicker/dist/mc-calendar.min.js"></script>
    <script src="bin/js/custom.js"></script>
</head>

<body onload="onload();">
    <div class="card content-wrap">
        <img src="bin/image/samplephoto.jpg" class="card-img-top" alt="...">
        <nav class="navbar navbar-expand-lg navbar-dark bg-success">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav w-100 nav-justified me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="?page=beranda">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="?page=profile">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="?page=visimisi">Visi Misi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="?page=kategori">Kategori</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="card-body">
            <?php
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                if ($page == "beranda") {
                    include_once 'content/beranda.php';
                    include_once 'content/logincustomer.php';
                    include_once 'content/registrasi.php';
                    include_once 'content/loginadmin.php';
                } else if ($page == "profile") {
                    include_once 'content/profile.php';
                } else if ($page == "visimisi") {
                    include_once 'content/visimisi.php';
                } else if ($page == "kategori") {
                    include_once 'content/kategori.php';
                }
            } else {
                include_once 'content/beranda.php';
                include_once 'content/logincustomer.php';
                include_once 'content/registrasi.php';
                include_once 'content/loginadmin.php';
            }
            ?>
            <br><br><br><br><br>
            <br><br><br><br><br>
        </div>
        <div class="card-footer text-center bg-success">
            &copy; Copyright Reserved on 2021 || Created by Sontiana
        </div>
    </div>

    <script>
        const myDatePicker = MCDatepicker.create({
            el: '#exampleDatepicker',
            bodyType: 'inline',
        })
    </script>
</body>

</html>