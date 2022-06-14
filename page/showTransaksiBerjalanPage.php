<?php
    include '../component/sidebarCustomer.php'
?>

    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #40A798; boxshadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <div class="title" style="justify-content: space-between; display: flex;">
            <h4 >TRANSAKSI YANG SEDANG BERJALAN</h4>
            <a href="./getStartedTransaksiPage.php">
                <button type="button" class="btn btn-danger">Back</button>
            </a>
        </div>

        <hr>
            <table class="table ">
            <thead>
                <tr>
                <th scope="col">Nomor Transaksi</th>
                <th scope="col">TGL Transaksi</th>
                <th scope="col">Mobil</th>
                <th scope="col">Driver</th>
                <th scope="col">Promo</th>
                <th scope="col">TGL Mulai Sewa</th>
                <th scope="col">TGL Selesai Sewa</th>
                <th scope="col">Status</th>
                <th scope="col">CS</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    include('../db.php');

                    $user = $_SESSION['user']; 
                    $id_customer = $user[0];

                    $query = mysqli_query($con, "SELECT format_id_transaksi, id_transaksi, tgl_transaksi, nama_mobil, nama_driver, nama_pegawai, kode_promo, tgl_waktu_mulai_sewa, tgl_waktu_selesai_sewa, status_transaksi FROM transaksi_penyewaan_mobil JOIN aset_mobil USING(id_mobil) LEFT JOIN driver USING(id_driver) JOIN pegawai USING(id_pegawai) LEFT JOIN promo USING (id_promo) WHERE id_customer = '$id_customer' AND status_transaksi != 'TRANSAKSI SELESAI' AND status_transaksi != 'DITOLAK'") or die(mysqli_error($con));

                if (mysqli_num_rows($query) == 0) {
                    echo '<tr> <td colspan="7"> Tidak Ada Transaksi Yang Sedang Berjalan </td> </tr>';
                }else{
                    while($data = mysqli_fetch_array($query)){
                    echo'
                        <tr>
                            <th scope="row">'.$data[0].''.$data[1].'</th>
                            <td>'.$data[2].'</td>
                            <td>'.$data[3].'</td>';
                            if($data[4] == NULL){
                                echo'<td>-</td>';
                            }else{
                                echo'<td>'.$data[4].'</td>';
                            }
                            if($data[6] == NULL){
                                echo'<td>-</td>';
                            }else{
                                echo'<td>'.$data[6].'</td>';
                            }
                        echo'
                            <td>'.$data[7].'</td>
                            <td>'.$data[8].'</td>
                            <td>'.$data[9].'</td>
                            <td>'.$data[5].'</td>
                            <td>';
                                $query2 = mysqli_query($con, "SELECT now()") or die(mysqli_error($con));
                                $data2 = mysqli_fetch_array($query2);
                                if($data[9] != 'Menunggu Verifikasi Dari Customer Service' && $data[8] <= $data2[0]) {
                                    echo '
                                    <a href="../process/showTransaksiPembayaranProcess.php?id='.$data[1].'"
                                        onClick="return confirm ( \'Apakah Anda Yakin Ingin Mengembalikan Mobil Dan Melakukan Pembayaran?\')">
                                        <button type="button" class="btn btn-success">Bayar</button>
                                    </a>';
                                }else if($data[9]=='Menunggu Verifikasi Dari Customer Service'){
                                    echo'
                                    <a href="./updateGetStartedPage.php?id='.$data[1].'"
                                        onClick="return confirm ( \'Apakah Anda Yakin Ingin Meng-update Transaksi Penyewaan Mobil?\')">
                                        <button type="button" class="btn btn-warning">Edit</button>
                                    </a>';
                                }else {
                                    echo'-';
                                }
                                echo'
                            </td>
                        </tr>';
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