<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="../style.css" rel="stylesheet">
        <link rel="icon" href="../resource/A.png" type="image/ico">
        <title>Atma Jogja Rental</title>
    </head>

    <body style="overflow-y: hidden;">
        <nav class="navbar navbar-dark bg-white fixed-top">
            <div class="container">
                <a href="../index.php">
                    <img src="../resource/Logo.png" alt="Atma Jaya Rental" style="width: 150px;">
                </a>
                <img src="../resource/Slogan.png" alt="AJR BISA!" style="width: 225px;">
            </div>
        </nav>

        <div class="bg bg-light text-dark">
            <div class="container min-vh-100 mt-5 d-flex align-items-center justify-content-center">
                <div class="card text-dark bg-light ma-5 shadow " style="min-width: 40rem;">
                    <div class="card-header fw-bold">Register</div>
                    <div class="card-body">
                        <form action="../process/registerCustomerProcess.php" method="post">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                                <input class="form-control" required id="nama_customer" name="nama_customer" placeholder="Nama Lengkap" aria-describedby="emailHelp">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Alamat</label>
                                <input class="form-control" required id="alamat_customer" name="alamat_customer" placeholder="Alamat Lengkap" aria-describedby="emailHelp">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tanggal Lahir</label>
                                <input class="form-control" type="date" required id="tanggal_lahir_customer" name="tanggal_lahir_customer" placeholder="Tanggal Lahir" aria-describedby="emailHelp">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                                <div class="mb-3">
                                    <input type="radio" required name="jenis_kelamin_customer" value= "1" /> Pria &nbsp;
                                    <input type="radio" required name="jenis_kelamin_customer" value= "0" /> Wanita
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input class="form-control" required type="email" id="email_customer" name="email_customer" placeholder="example@gmail.com" aria-describedby="emailHelp">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nomor Telepon</label>
                                <input class="form-control" type="tel" required id="no_telepon_customer" name="no_telepon_customer" placeholder="Nomor Telepon" aria-describedby="emailHelp">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tanda Pengenal</label>
                                <input class="form-control" required id="tanda_pengenal" name="tanda_pengenal" placeholder="KTP or Kartu Pelajar" aria-describedby="emailHelp">
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary" name="register">Register</button>
                            </div>

                        </form>
                        <p class="mt-2 mb-0">Sudah punya akun? <a href="./loginPage.php" class="text-primary">Login Disini!</a></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>