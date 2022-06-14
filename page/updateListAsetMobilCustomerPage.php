<?php
    include '../component/sidebarCustomer.php'
?>

<?php 
    $stats= $_GET['stats'];
    $tanggal_waktu_sewa= $_GET['tanggal_waktu_sewa'];
    $id=$_GET['id'];
?>

    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #40A798; boxshadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <div class="title" style="justify-content: space-between; display: flex;">
            <h4 >PILIHAN MOBIL</h4>
            <a href="./updateGetStartedPage.php?id=<?php echo $id; ?>">
                <button type="button" class="btn btn-danger">Back to Rental Options</button>
            </a>
        </div>

        <hr>
            <table class="table ">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Mobil</th>
                <th scope="col">Tipe</th>
                <th scope="col">Warna</th>
                <th scope="col">Harga Sewa</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $query = mysqli_query($con, "SELECT id_mobil, nama_mobil, tipe_mobil, warna_mobil, harga_sewa_perhari FROM aset_mobil WHERE status_ketersediaan_mobil=1 and status_mobil=1 AND DATEDIFF(periode_kontrak_selesai, CURRENT_DATE) >= $tanggal_waktu_sewa") or die(mysqli_error($con));

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
                            <td>Rp'.$data[4].',00/Hari</td>
                            <td>';

                                if($stats == 1) {
                                    echo '<a href="./updateListDriverCustomerPage.php?id_mobil='.$data[0].'&id='.$id.'"
                                    onClick="return confirm ( \'Apakah Anda Yakin Ingin Memilih Mobil Ini?\')">
                                    <button type="button" class="btn btn-success">Pilih</button>
                                    </a>';
                                }else {
                                    echo'<a href="./updateListPromoCustomerPage.php?id_mobil='.$data[0].'&id_driver='.NULL.'&id='.$id.'"
                                    onClick="return confirm ( \'Apakah Anda Yakin Ingin Memilih Mobil Ini?\')">
                                    <button type="button" class="btn btn-success">Pilih</button>
                                    </a>';
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