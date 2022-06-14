<?php
    include '../component/sidebarCustomer.php'
?>

<?php 
    include '../db.php';
    $id_mobil = $_GET['id_mobil'];
    $id=$_GET['id'];
?>
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #FEA82F; boxshadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <div class="title" style="justify-content: space-between; display: flex;">
            <h4 >PILIH DRIVER</h4>
            
            <div class="title" style="justify-content: space-between; text-align: right;">
                <a href="./updateGetStartedPage.php?id=<?php echo $id; ?>">
                    <button type="button" class="btn btn-danger">Back to Rental Options</button>
                </a>
            </div>
        </div>

        <hr>
            <table class="table ">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Driver</th>
                <th scope="col">Nomor Telepon</th>
                <th scope="col">Bahasa</th>
                <th scope="col">Harga Sewa</th>
                <th scope="col">Rating Driver</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $query = mysqli_query($con, "SELECT id_driver, nama_driver, no_telp_driver, bahasa, harga_sewa_perhari, rerata_rating_driver FROM driver WHERE status_ketersediaan_driver=1 AND status_driver=1  AND sim_driver !='' AND surat_bebas_napza !='' AND surat_kesehatan_jiwa !='' AND surat_kesehatan_jasmani !='' AND skck !=''") or die(mysqli_error($con));

                if (mysqli_num_rows($query) == 0) {
                    echo '<tr> <td colspan="7"> Tidak Driver Yang Tersedia</td> </tr>';
                }else{
                    $no = 1;
                    while($data = mysqli_fetch_array($query)){
                    echo'
                        <tr>
                            <th scope="row">'.$no.'</th>
                            <td>'.$data[1].'</td>
                            <td>'.$data[2].'</td>';
                            if($data[3]==0){
                                echo '<td>Bahasa Indonesia</td>';
                            }else{
                                echo '<td>Bahasa Indonesia + Bahasa Inggris</td>';
                            }

                            if($data[4]==0){
                                echo '<td>Rp-</td>';
                            }else{
                                echo '<td>Rp'.$data[4].',00</td>';
                            }

                            if($data[5]==NULL){
                                echo '<td>Belum Ada Rating</td>';
                            }else{
                                echo '<td>'.$data[5].'</td>';
                            }
                        
                        echo'
                            <td>
                                <a href="./updateListPromoCustomerPage.php?id_mobil='.$id_mobil.'&id_driver='.$data[0].'$id='.$id.'"
                                    onClick="return confirm ( \'Apakah Anda Yakin Ingin Memilih Driver Ini?\')">
                                    <button type="button" class="btn btn-success">Pilih</button>
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