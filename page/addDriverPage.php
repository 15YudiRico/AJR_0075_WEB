<?php
    include '../component/sidebarAdministrasi.php'
?>

    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #FEA82F; boxshadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <h4>TAMBAH DRIVER</h4>
        <hr>
        <form action="../process/createDriverProcess.php" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                <input class="form-control" id="nama_driver" name="nama_driver" placeholder="Nama Lengkap" required aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Alamat Lengkap</label>
                <input class="form-control" id="alamat_driver" name="alamat_driver" placeholder="Alamat" required aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tanggal Lahir</label>
                <input class="form-control" id="tanggal_lahir_driver" type="date" name="tanggal_lahir_driver" required aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                    <div class="mb-3">
                        <input type="radio" id="jenis_kelamin_driver" name="jenis_kelamin_driver" value= "1" required/> Pria &emsp;
                        <input type="radio" id="jenis_kelamin_driver" name="jenis_kelamin_driver" value= "0" required/> Wanita
                    </div>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input class="form-control" id="email_driver" name="email_driver" required placeholder="Email" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nomor Telepon</label>
                <input class="form-control" id="no_telp_driver" name="no_telp_driver" required placeholder="Nomor Telepon" type="tel" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Bahasa</label>
                    <div class="mb-3">
                        <input type="radio" id="bahasa" name="bahasa" value= "1" required/> Bahasa Indonesia & Bahasa Inggris &emsp;
                        <input type="radio" id="bahasa" name="bahasa" value= "0" required/> Bahasa Indonesia
                    </div>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Harga Sewa</label>
                <input class="form-control" id="harga_sewa_perhari" name="harga_sewa_perhari" placeholder="Harga Sewa Perhari" required type="number" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Link Foto Pegawai</label>
                <input class="form-control" id="foto_driver" name="foto_driver" placeholder="Link Foto" type="url" aria-describedby="emailHelp">
            </div>

            <div class="mt-5 gap-2 text-center">
                <button type="submit" class="btn btn-success" name="add">Tambah Driver</button>
                <a href="./listDriverAdministrasiPage.php" class="btn btn-danger" role="button" aria-disabled="true">Batal Tambah Driver</a>
            </div>
            </form>
    </div>
    </aside>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>