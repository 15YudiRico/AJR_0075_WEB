<?php
    include '../component/sidebarAdministrasi.php'
?>

    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #FEA82F; boxshadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <h4>TAMBAH PEMILIK ASET</h4>
        <hr>
        <form action="../process/createPemilikAsetProcess.php" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                <input class="form-control" id="nama_pemilk" name="nama_pemilik" placeholder="Nama Lengkap" required aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nomor KTP</label>
                <input class="form-control" id="no_ktp_pemilik" name="no_ktp_pemilik" placeholder="Nomor KTP" required aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Alamat Pemilik</label>
                <input class="form-control" id="alamat_pemilik" name="alamat_pemilik" placeholder="Alamat" required aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nomor Telepon</label>
                <input class="form-control" id="no_telepon_pemilk" name="no_telepon_pemilik" required placeholder="Nomor Telepon" type="tel" aria-describedby="emailHelp">
            </div>

            <div class="mt-5 gap-2 text-center">
                <button type="submit" class="btn btn-success" name="add">Tambah Pemilik Aset</button>
                <a href="./listPemilikAsetPage.php" class="btn btn-danger" role="button" aria-disabled="true">Batal Tambah Pemilik Aset</a>
            </div>
            </form>
    </div>
    </aside>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>