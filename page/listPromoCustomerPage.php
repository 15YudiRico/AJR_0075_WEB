<?php
    include '../component/sidebarCustomer.php'
?>

<?php 
    include '../db.php';
    $id_mobil = $_GET['id_mobil'];
    $id_driver = $_GET['id_driver'];
?>

    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #30475E; boxshadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <div class="title" style="justify-content: space-between; display: flex;">
            <h4 >PILIH PROMO</h4>
            <div>
                <a href="./getStartedTransaksiPage.php">
                    <button type="button" class="btn btn-danger">Back to Rental Options</button>
                </a>
                <a href="../process/createTransaksiProcess.php?id_mobil=<?php echo $id_mobil; ?>&id_driver=<?php echo $id_driver; ?>&id_promo=<?php echo NULL; ?>"
                    onClick="return confirm ( \'Apakah Anda Yakin Tidak Ingin Memakai Promo?\')">
                    <button type="button" class="btn btn-danger">Tanpa Promo</button>
                </a>
            </div>
        </div>

        <form action="./listPromoCustomerPage.php?id_mobil=<?php echo $id_mobil?>&id_driver=<?php echo $id_driver?>" method="post">
            <div class="form"><i class="fa fa-search">
                <input type="text" class="form-control" id="kode_promo" name="kode_promo" placeholder="Search Kode Promo..."></i>
                <button hidden type="submit" class="btn btn-success" name="search">Cari Promo</button>
            </div>   
        </form>
        <hr>
            <table class="table ">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Kode Promo</th>
                <th scope="col">Jenis Promo</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Persenan Promo</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                if(isset($_POST['search'])){
                    include('../db.php');
                    $kode_promo = $_POST['kode_promo'];

                    $query = mysqli_query($con, "SELECT * FROM promo WHERE kode_promo LIKE '%$kode_promo%' AND status_promo = 1 ") or die(mysqli_error($con));
                }else{
                    $query = mysqli_query($con, "SELECT * FROM promo WHERE status_promo = 1 ") or die(mysqli_error($con));
                }

                if (mysqli_num_rows($query) == 0) {
                    echo '<tr> <td colspan="7"> Tidak Ada Data Promo Yang Tersedia </td> </tr>';
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
                            
                            <td>
                                <a href="../process/createTransaksiProcess.php?id_mobil='.$id_mobil.'&id_driver='.$id_driver.'&id_promo='.$data[0].'"
                                    onClick="return confirm ( \'Apakah Anda Yakin Ingin Memakai Promo Ini?\')">
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