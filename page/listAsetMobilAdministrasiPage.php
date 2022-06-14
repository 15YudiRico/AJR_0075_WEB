<?php
    include '../component/sidebarAdministrasi.php'
?>

    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #FEA82F; boxshadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <div class="title" style="justify-content: space-between; display: flex;">
            <h4 >DAFTAR ASET MOBIL</h4>
            <a href="./addAsetMobilPage.php">
            <button type="button" class="btn btn-danger">Add</button>
            </a>
        </div>

        <form action="./listAsetMobilAdministrasiPage.php" method="post">
            <div class="form"><i class="fa fa-search">
                <input type="text" class="form-control" id="nama_mobil" name="nama_mobil" placeholder="Search Nama Mobil..."></i>
                <button hidden type="submit" class="btn btn-success" name="search">Cari Mobil</button>
            </div>   
        </form>
        <hr>
            <table class="table ">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Mobil</th>
                <th scope="col">Nomor Plat</th>
                <th scope="col">Tipe</th>
                <th scope="col">Warna</th>
                <th scope="col">Harga Sewa</th>
                <th scope="col">Kategori Aset</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                if(isset($_POST['search'])){
                    include('../db.php');
                    $nama_mobil = $_POST['nama_mobil'];

                    $query = mysqli_query($con, "SELECT id_mobil, nama_mobil, no_plat_mobil, tipe_mobil, warna_mobil, harga_sewa_perhari, kategori_aset, DATEDIFF(periode_kontrak_selesai, CURRENT_DATE) AS periode_kontrak_mobil, status_ketersediaan_mobil FROM aset_mobil WHERE nama_mobil LIKE '%$nama_mobil%' AND status_mobil=1") or die(mysqli_error($con));
                }else{
                    $query = mysqli_query($con, "SELECT id_mobil, nama_mobil, no_plat_mobil, tipe_mobil, warna_mobil, harga_sewa_perhari, kategori_aset, DATEDIFF(periode_kontrak_selesai, CURRENT_DATE) AS periode_kontrak_mobil, status_ketersediaan_mobil FROM aset_mobil") or die(mysqli_error($con));
                }

                if (mysqli_num_rows($query) == 0) {
                    echo '<tr> <td colspan="7"> Tidak Ada Data Mobil </td> </tr>';
                }else{
                    $no = 1;
                    while($data = mysqli_fetch_array($query)){
                    echo'
                        <tr>
                            <th scope="row">'.$no.'</th>
                            <td>'.$data[1].'</td>
                            <td>'.$data[2].'</td>
                            <td>'.$data[3].'</td>
                            <td>'.$data[4].'</td>
                            <td>Rp'.$data[5].',00/Hari</td>';
                            
                            if($data[6] == 0) {
                                echo '<td>Aset Perusahaan</td>';
                            } else {
                                echo'<td>Aset Pemilik Mitra</td>';
                            }
                            echo'
                            <td>
                                <a href="./showAsetMobilAdministrasiPage.php?id='.$data[0].'">
                                    <button type="button" class="btn btn-info">Show</button>
                                </a>
                                <a href="./editAsetMobilPage.php?id='.$data[0].'">
                                    <button type="button" class="btn btn-warning">Edit</button>
                                </a>
                                <a href="../process/deleteAsetMobilProcess.php?id='.$data[0].'"
                                    onClick="return confirm ( \'Apakah Anda Yakin Ingin Menghapus Data Aset Mobil Ini?\')">
                                    <button type="button" class="btn btn-secondary">Delete</button>
                                </a>';
                                // 1 bulan diset dalam 30 hari 
                                if(($data[7] >= 1 && $data[7] <= 30) && $data[6] == 1){
                                    echo'
                                        <button type="button" disabled class="btn btn-outline-danger">Masa Kontrak Akan Habis</button>';
                                } else if ($data[7] <= 0 && $data[6] == 1 ) {
                                    
                                    if($data[8]!=0){
                                        $id_mobil= $data[0];

                                        $query2 = mysqli_query($con, "UPDATE aset_mobil SET status_ketersediaan_mobil= 0 WHERE id_mobil='$id_mobil'") or die(mysqli_error($con));
                                    }

                                    echo'
                                        <button type="button" disabled class="btn btn-outline-danger">Masa Kontrak Telah Habis</button>';
                                }
                            echo'
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