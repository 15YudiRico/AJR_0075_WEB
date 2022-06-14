<?php
    include '../component/sidebarCustomer.php'
?>

    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #40A798; boxshadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <div class="title" style="justify-content: space-between; display: flex;">
            <h4 >RIWAYAT TRANSAKSI</h4>
        </div>

        <hr>
            <table class="table ">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nomor Transaksi</th>
                <th scope="col">TGL Transaksi</th>
                <th scope="col">TGL Mulai Sewa</th>
                <th scope="col">TGL Selesai Sewa</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    include('../db.php');

                    $user = $_SESSION['user']; 
                    $id_customer = $user[0];

                    $query = mysqli_query($con, "SELECT format_id_transaksi, id_transaksi, tgl_transaksi,tgl_waktu_mulai_sewa, tgl_waktu_selesai_sewa, status_transaksi, rating_driver, rating_rental, id_driver FROM transaksi_penyewaan_mobil WHERE id_customer = '$id_customer' AND (status_transaksi = 'TRANSAKSI SELESAI' OR status_transaksi = 'DITOLAK')") or die(mysqli_error($con));

                if (mysqli_num_rows($query) == 0) {
                    echo '<tr> <td colspan="7"> Tidak Ada Riwayat Transaksi </td> </tr>';
                }else{
                    $no = 1;
                    while($data = mysqli_fetch_array($query)){
                    echo'
                        <tr>
                            <th scope="row">'.$no.'</th>
                            <th scope="row">'.$data[0].''.$data[1].'</th>
                            <td>'.$data[2].'</td>
                            <td>'.$data[3].'</td>
                            <td>'.$data[4].'</td>
                            <td>'.$data[5].'</td>
                            <td>';
                                if($data[5] == 'TRANSAKSI SELESAI') {
                                    echo '
                                    <a href="./showNotaTransaksiCustomerPage.php?id='.$data[1].'">
                                        <button type="button" class="btn btn-success">Nota</button>
                                    </a>';
                                }

                                if($data[5] == 'TRANSAKSI SELESAI' && $data[8] == NULL){
                                    if($data[7] == NULL){
                                        echo '
                                        <a href="./addRatingTransaksiPage.php?id='.$data[1].'&stats=0">
                                            <button type="button" class="btn btn-warning">Rate</button>
                                        </a>';
                                    }
                                }else if($data[5] == 'TRANSAKSI SELESAI' && $data[8] != NULL){
                                    if($data[6] == NULL && $data[7] == NULL){
                                        echo '
                                        <a href="./addRatingTransaksiPage.php?id='.$data[1].'&id_driver='.$data[8].'&stats=1">
                                            <button type="button" class="btn btn-warning">Rate</button>
                                        </a>';
                                    }
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