<?php
    include '../component/sidebarCustomerService.php'
?>

    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #40A798; boxshadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <div class="title" style="justify-content: space-between; display: flex;">
            <h4 >VERIFIKASI TRANSAKSI PENYEWAAN MOBIL</h4>
        </div>
        <form action="./verifikasiTransaksiPenyewaanPage.php" method="post">
            <div class="form"><i class="fa fa-search">
                <input type="text" class="form-control" id="nama_customer" name="nama_customer" placeholder="Search Nama Customer..."></i>
                <button hidden type="submit" class="btn btn-success" name="search">Cari Customer</button>
            </div>   
        </form>

        <hr>
            <table class="table ">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nomor Transaksi</th>
                <th scope="col">Customer</th>
                <th scope="col">TGL Transaksi</th>
                <th scope="col">Mobil</th>
                <th scope="col">Driver</th>
                <th scope="col">Promo</th>
                <th scope="col">TGL Mulai Sewa</th>
                <th scope="col">TGL Selesai Sewa</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>

            <tbody>
            <?php
                if(isset($_POST['search'])){
                    include('../db.php');
                    $nama_customer = $_POST['nama_customer'];

                    $query = mysqli_query($con, "SELECT format_id_transaksi, id_transaksi, nama_customer,tgl_transaksi, nama_mobil, nama_driver, kode_promo, tgl_waktu_mulai_sewa, tgl_waktu_selesai_sewa FROM transaksi_penyewaan_mobil JOIN aset_mobil USING(id_mobil) LEFT JOIN driver USING(id_driver) JOIN customer USING(id_customer) LEFT JOIN promo USING (id_promo) WHERE nama_customer LIKE '%$nama_customer%' AND status_transaksi = 'Menunggu Verifikasi Dari Customer Service'") or die(mysqli_error($con));
                }else {
                    $query = mysqli_query($con, "SELECT format_id_transaksi, id_transaksi, nama_customer, tgl_transaksi, nama_mobil, nama_driver, kode_promo, tgl_waktu_mulai_sewa, tgl_waktu_selesai_sewa FROM transaksi_penyewaan_mobil JOIN aset_mobil USING(id_mobil) LEFT JOIN driver USING(id_driver) JOIN customer USING(id_customer) LEFT JOIN promo USING (id_promo) WHERE status_transaksi = 'Menunggu Verifikasi Dari Customer Service'") or die(mysqli_error($con));
                }

                if (mysqli_num_rows($query) == 0) {
                    echo '<tr> <td colspan="7"> Tidak Ada Transaksi Penywaan Yang Perlu Diverifikasi </td> </tr>';
                }else{
                    $no = 1;
                    while($data = mysqli_fetch_array($query)){
                    echo'
                        <tr>
                            <th scope="row">'.$no.'</th>
                            <th>'.$data[0].''.$data[1].'</th>
                            <td>'.$data[2].'</td>
                            <td>'.$data[3].'</td>
                            <td>'.$data[4].'</td>';
                            if($data[5] == NULL){
                                echo'<td>-</td>';
                            }else{
                                echo'<td>'.$data[5].'</td>';
                            }
                            if($data[6] == NULL){
                                echo'<td>-</td>';
                            }else{
                                echo'<td>'.$data[6].'</td>';
                            }
                        echo'
                            <td>'.$data[7].'</td>
                            <td>'.$data[8].'</td>
                            <td>
                                <a href="../process/verifikasiTransaksiPenyewaanProcess.php?id='.$data[1].'&stats=1"
                                    onClick="return confirm ( \'Apakah Anda Yakin Ingin Verifikasi Transaksi Penyewaan Ini?\')">
                                    <button type="button" class="btn btn-success">Verify</button>
                                </a>
                                <a href="../process/verifikasiTransaksiPenyewaanProcess.php?id='.$data[1].'&stats=0"
                                    onClick="return confirm ( \'Apakah Anda Yakin Ingin Menolak  Transaksi Penyewaan Ini?\')">
                                    <button type="button" class="btn btn-danger">Refuse</button>
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