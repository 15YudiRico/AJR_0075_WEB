<?php
    include '../component/sidebarCustomer.php'
?>

<?php
    include('../db.php');
    $user = $_SESSION['user']; 

    $id_customer = $user[0];
    $query = mysqli_query($con, "SELECT * FROM transaksi_penyewaan_mobil WHERE id_customer = '$id_customer' AND status_transaksi !='TRANSAKSI SELESAI' AND status_transaksi !='DITOLAK' ") or die(mysqli_error($con));

    if(mysqli_num_rows($query) !=0){
        echo'<script>alert("Masih Ada Transaksi Yang Sedang Berjalan!"); window.location = "./showTransaksiBerjalanPage.php"</script>';
    }else{ 
        if(isset($_POST['add'])){
            include('../db.php');

            $tgl_waktu_mulai_sewa = $_POST['tgl_waktu_mulai_sewa'];
            $tgl_waktu_selesai_sewa = $_POST['tgl_waktu_selesai_sewa'];
            
            $date1 = new DateTime($tgl_waktu_mulai_sewa);
            $date2 = new DateTime($tgl_waktu_selesai_sewa);
            $selisih_waktu_sewa = $date1->diff($date2);

            $date3 = new DateTime();
            
            if($date1<$date3){
                echo'<script>alert("Tanggal Waktu Mulai Sewa Lebih Kecil Dari Tanggal Waktu Sekarang!"); window.location = "./addTransaksiWithDriverPage.php"</script>';
            } else if($selisih_waktu_sewa->days<1){
                echo'<script>alert("Durasi Waktu Sewa Minimal Sehari!"); window.location = "./addTransaksiWithDriverPage.php"</script>';
            }else {
                $_SESSION['tgl_waktu_mulai_sewa'] = $tgl_waktu_mulai_sewa;
                $_SESSION['tgl_waktu_selesai_sewa'] = $tgl_waktu_selesai_sewa;

                echo'<script> window.location = "./listAsetMobilCustomerPage.php?stats=1&selisih_waktu_sewa='.$selisih_waktu_sewa->days.'"</script>';
            }
        }

        echo'
        <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #40A798; boxshadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <h4>PILIH WAKTU SEWA</h4>
        <hr>
            <form action="./addTransaksiWithDriverPage.php" method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tanggal Waktu Mulai Sewa</label>
                    <input class="form-control" id="tgl_waktu_mulai_sewa" name="tgl_waktu_mulai_sewa" type="datetime-local" required aria-describedby="emailHelp">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tanggal Waktu Selesai Sewa</label>
                    <input class="form-control" id="tgl_waktu_selesai_sewa" name="tgl_waktu_selesai_sewa" type="datetime-local" required aria-describedby="emailHelp">
                </div>

                <div class="mt-5 gap-2 text-center">
                    <button type="submit" class="btn btn-success" name="add">Lanjutkan Transaksi</button>
                </div>
            </form>
        </div>
        </aside>
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
    </html>';

    }
?>

