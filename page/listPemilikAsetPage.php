<?php
    include '../component/sidebarAdministrasi.php'
?>

    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #FEA82F; boxshadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <div class="title" style="justify-content: space-between; display: flex;">
            <h4 >DAFTAR PEMILIK ASET </h4>
            <a href="./addPemilikAsetPage.php">
            <button type="button" class="btn btn-danger">Add</button>
            </a>
        </div>

        <form action="./listPemilikAsetPage.php" method="post">
            <div class="form"><i class="fa fa-search">
                <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik" placeholder="Search Nama Pemilik Aset..."></i>
                <button hidden type="submit" class="btn btn-success" name="search">Cari Pemilik Aset</button>
            </div>   
        </form>
        <hr>
            <table class="table ">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Pemilik Aset Mobil</th>
                <th scope="col">Nomor KTP</th>
                <th scope="col">Alamat</th>
                <th scope="col">Nomor Telepon</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                if(isset($_POST['search'])){
                    include('../db.php');
                    $nama_pemilik = $_POST['nama_pemilik'];

                    $query = mysqli_query($con, "SELECT * FROM data_pemilik WHERE nama_pemilik LIKE '%$nama_pemilik%' ") or die(mysqli_error($con));
                }else{
                    $query = mysqli_query($con, "SELECT * FROM data_pemilik ORDER BY nama_pemilik asc") or die(mysqli_error($con));
                }

                if (mysqli_num_rows($query) == 0) {
                    echo '<tr> <td colspan="7"> Tidak Ada  Data Pemilik Aset </td> </tr>';
                }else{
                    $no = 1;
                    while($data = mysqli_fetch_array($query)){
                    echo'
                        <tr>
                            <th scope="row">'.$no.'</th>
                            <td>'.$data[2].'</td>
                            <td>'.$data[1].'</td>
                            <td>'.$data[3].'</td>
                            <td>'.$data[4].'</td>

                            <td>
                                <a href="./editPemilikAsetPage.php?id='.$data[0].'">
                                    <button type="button" class="btn btn-warning">Edit</button>
                                </a>
                                <a href="../process/deletePemilikAsetProcess.php?id='.$data[0].'"
                                    onClick="return confirm ( \'Apakah Anda Yakin Ingin Menghapus Data Pemilik Aset Ini?\')">
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