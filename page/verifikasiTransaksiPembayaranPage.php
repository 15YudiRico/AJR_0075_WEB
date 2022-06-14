<?php
    include '../component/sidebarCustomerService.php'
?>

    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #40A798; boxshadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <div class="title" style="justify-content: space-between; display: flex;">
            <h4 >VERIFIKASI TRANSAKSI PEMBAYARAN MOBIL</h4>
        </div>

        <hr>
            <table class="table ">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nomor Transaksi</th>
                <th scope="col">Tgl Pengembalian</th>
                <th scope="col">Sub Total</th>
                <th scope="col">Diskon</th>
                <th scope="col">Denda</th>
                <th scope="col">Total Bayar</th>
                <th scope="col">Metode Pembayaran</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>

            <tbody>
            <?php
                    $query = mysqli_query($con, "SELECT format_id_transaksi, id_transaksi, tgl_waktu_pengembalian_sewa, sub_total, total_promo, biaya_ekstensi, total_pembayaran, metode_pembayaran, bukti_pembayaran FROM transaksi_penyewaan_mobil WHERE status_transaksi = 'Menunggu Verifikasi Pembayaran Dari Customer Service'") or die(mysqli_error($con));

                if (mysqli_num_rows($query) == 0) {
                    echo '<tr> <td colspan="7"> Tidak Ada Transaksi Pembayaran Yang Perlu Diverifikasi </td> </tr>';
                }else{
                    $no = 1;
                    while($data = mysqli_fetch_array($query)){
                    echo'
                        <tr>
                            <th scope="row">'.$no.'</th>
                            <th>'.$data[0].''.$data[1].'</th>
                            <td>'.$data[2].'</td>
                            <td>'.$data[3].'</td>';
                            if($data[4] == 0){
                                echo'<td>Rp-</td>';
                            }else{
                                echo'<td>Rp'.$data[4].',00</td>';
                            }
                            if($data[5] == 0){
                                echo'<td>Rp-</td>';
                            }else{
                                echo'<td>Rp'.$data[6].',00</td>';
                            } 
                        echo'
                            <td>'.$data[6].'</td>';
                            if($data[7]==0){
                                echo '<td>Tunai</td>';
                            }else{
                                echo '<td>Nontunai</td>';
                            }
                        echo'
                            <td>
                                <a href="'.$data[8].'" target="_blank">
                                    <button type="button" class="btn btn-warning">Check</button>
                                </a>

                                <a href="../process/verifikasiTransaksiPembayaranProcess.php?id='.$data[1].'"
                                    onClick="return confirm ( \'Apakah Anda Yakin Ingin Verifikasi Transaksi Pembayaran Ini?\')">
                                    <button type="button" class="btn btn-success">Verify</button>
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