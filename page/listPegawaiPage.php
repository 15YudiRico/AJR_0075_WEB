<?php
    include '../component/sidebarAdministrasi.php'
?>

<?php
    include '../db.php';
    $user= $_SESSION['user'];
?>

    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #FEA82F; boxshadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <div class="title" style="justify-content: space-between; display: flex;">
            <h4 >DAFTAR PEGAWAI</h4>
            <a href="./addPegawaiPage.php">
            <button type="button" class="btn btn-danger">Add</button>
            </a>
        </div>

        <form action="./listPegawaiPage.php" method="post">
            <div class="form"><i class="fa fa-search">
                <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" placeholder="Search Nama Pegawai..."></i>
                <button hidden type="submit" class="btn btn-success" name="search">Cari Pegawai</button>
            </div>   
        </form>
        <hr>
            <table class="table ">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Pegawai</th>
                <th scope="col">Jabatan Pegawai</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                if(isset($_POST['search'])){
                    include('../db.php');
                    $nama_pegawai = $_POST['nama_pegawai'];

                    $query = mysqli_query($con, "SELECT id_pegawai, nama_pegawai, nama_jabatan FROM pegawai JOIN jabatan USING (id_jabatan) WHERE nama_pegawai LIKE '%$nama_pegawai%' AND status_pegawai=1 AND id_pegawai>0 ") or die(mysqli_error($con));
                }else{
                    $query = mysqli_query($con, "SELECT id_pegawai, nama_pegawai, nama_jabatan FROM pegawai JOIN jabatan USING (id_jabatan) WHERE status_pegawai=1 AND id_pegawai>0 ORDER BY nama_jabatan desc, nama_pegawai asc") or die(mysqli_error($con));
                }

                if (mysqli_num_rows($query) == 0) {
                    echo '<tr> <td colspan="7"> Tidak Ada Data Promo </td> </tr>';
                }else{
                    $no = 1;
                    while($data = mysqli_fetch_array($query)){
                    echo'
                        <tr>
                            <th scope="row">'.$no.'</th>
                            <td>'.$data[1].'</td>
                            <td>'.$data[2].'</td>
                            <td>
                                <a href="./showPegawaiPage.php?id='.$data[0].'">
                                <button type="button" class="btn btn-primary">Show</button>
                                </a>
                                <a href="./editPegawaiPage.php?id='.$data[0].'&id_login='.$user[0].'">
                                    <button type="button" class="btn btn-warning">Edit</button>
                                </a>
                                <a href="../process/deletePegawaiProcess.php?id='.$data[0].'&id_login='.$user[0].'"
                                    onClick="return confirm ( \'Apakah Anda Yakin Ingin Menghapus Data Pegawai Ini?\')">
                                    <button type="button" class="btn btn-secondary">Delete</button>
                                </a>
                            </td>
                        </tr>';
                    $no++;
                    }
                }
            ?>
            </tbody>
            </table>
    </div>
    </aside>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>