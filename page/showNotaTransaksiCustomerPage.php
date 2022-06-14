<?php
    include '../component/sidebarCustomer.php'
?>

<?php
        include '../db.php';
        $id_transaksi = $_GET['id']; 
        $temp = mysqli_query($con, "SELECT t.format_id_transaksi, t.id_transaksi, t.tgl_transaksi, c.nama_customer, p.nama_pegawai, d.nama_driver, pr.kode_promo, t.tgl_waktu_mulai_sewa, t.tgl_waktu_selesai_sewa, t.tgl_waktu_pengembalian_sewa, m.nama_mobil, m.harga_sewa_perhari, TIMESTAMPDIFF(DAY, tgl_waktu_mulai_sewa, tgl_waktu_selesai_sewa) AS durasi, m.harga_sewa_perhari*TIMESTAMPDIFF(DAY, tgl_waktu_mulai_sewa, tgl_waktu_selesai_sewa) AS sub_total1, d.harga_sewa_perhari*TIMESTAMPDIFF(DAY, tgl_waktu_mulai_sewa, tgl_waktu_selesai_sewa) AS sub_total2, d.harga_sewa_perhari, t.sub_total, t.total_promo, t.biaya_ekstensi, t.total_pembayaran FROM transaksi_penyewaan_mobil t LEFT JOIN customer c ON (t.id_customer = c.id_customer) LEFT JOIN pegawai p ON (t.id_pegawai = p.id_pegawai) LEFT JOIN driver d ON (t.id_driver = d.id_driver) LEFT JOIN promo pr ON (t.id_promo = pr.id_promo) LEFT JOIN aset_mobil m ON (t.id_mobil = m.id_mobil) WHERE id_transaksi ='$id_transaksi'") or die(mysqli_error($con));
        $user = mysqli_fetch_array($temp);
?>

    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #40A798; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >

        <div class="title" style="justify-content: space-between; text-align: right;">
            <a href="./listRiwayatTransaksiCustomerPage.php">
                <button type="button" class="btn btn-danger float-right">Back</button>
            </a>
            <a onclick="window.print();">
                <button type="button" class="btn btn-success float-right">Cetak</button>
            </a>
        </div>
        
        <div class="title" style="justify-content: space-between; text-align: center;">
            <h5><b>Nota Transaksi</b></h5>    
            <h5><b>Atma Jaya Rental</b></h5>
        </div>
        <hr>

        <p><b>Nota Transaksi Sewa Mobil</b></p>
        <div class="container" style="background-color: #FFFFFF; border: 2px solid" >
            <div class="title" style="justify-content: space-between; text-align: center;">
                <h6><b>Atma Rental</b></h6>
            </div>
            <?php 
                echo'
                <div class="title" style="justify-content: space-between; display: flex;">
                    <h6>'.$user[0].''.$user[1].'</h6>
                    <h6>'.$user[2].'</h6>
                </div>
                <hr>';
            ?>
            <div class="title" style="justify-content: space-between; display: flex;">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <?php 
                                echo'
                                <td>CUST</td>
                                <td>'.$user[3].'</td>
                                <td>PRO</td>';
                                if($user[6]==NULL){
                                    echo'<td>-</td>';
                                }else{
                                    echo'<td>'.$user[6].'</td>';
                                }
                            ?>
                        </tr>
                        <tr>
                            <?php 
                                echo'
                                <td>CS</td>
                                <td>'.$user[4].'</td>';
                            ?>
                        </tr>
                        <tr>
                            <?php 
                                echo'
                                <td>DRV</td>';
                                if($user[5]==NULL){
                                    echo'<td>-</td>';
                                }else{
                                    echo'<td>'.$user[5].'</td>';
                                }
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>
            <hr>
            <div class="title" style="justify-content: space-between; text-align: center;">
                <h6><b>Nota Transaksi</b></h6>
            </div>
            <div class="title" style="justify-content: space-between; display: flex;">
                <table class="table table">
                    <tbody>
                        <tr>
                            <?php 
                                echo'
                                <td>Tgl Mulai</td>
                                <td>'.$user[7].'</td>';
                            ?>
                        </tr>
                        <tr>
                            <?php 
                                echo'
                                <td>Tgl Selesai</td>
                                <td>'.$user[8].'</td>';
                            ?>
                        </tr>
                        <tr>
                            <?php 
                                echo'
                                <td>Tgl Pengembalian</td>
                                <td>'.$user[9].'</td>';
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>

            <table class="table table">
                <thead>
                    <tr>
                    <th scope="col">Item</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Durasi</th>
                    <th scope="col">Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php 
                            echo'
                            <th>'.$user[10].'</th>
                            <td>'.$user[11].'</td>
                            <td>'.$user[12].' Hari</td>
                            <td>'.$user[13].'</td>';
                        ?>
                    </tr>
                    <tr>
                        <?php 
                            if($user[5] != NULL) {
                                echo'
                                <th>Driver '.$user[5].'</th>
                                <td>'.$user[15].'</td>
                                <td>'.$user[12].' Hari</td>
                                <td>'.$user[14].'</td>';
                            }
                        ?>
                    </tr>
                    <tr>
                        <?php 
                            echo'
                            <td></td>
                            <td></td>
                            <td></td>
                            <th>'.$user[16].'</th>';
                        ?>
                    </tr>
                    <tr>
                        <?php 
                            echo'
                            <td></td>
                            <td></td>
                            <th>Diskon</th>
                            <td>'.$user[17].'</td>';
                        ?>
                    </tr>
                    <tr>
                        <?php 
                            echo'
                            <td></td>
                            <td></td>
                            <th>Denda</th>
                            <td>'.$user[18].'</td>';
                        ?>
                    </tr>
                    <tr>
                        <?php 
                            echo'
                            <td></td>
                            <td></td>
                            <th>Total</th>
                            <th>'.$user[19].'</th>';
                        ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    </aside>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>