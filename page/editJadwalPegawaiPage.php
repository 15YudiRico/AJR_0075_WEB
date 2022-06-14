<?php
    include '../component/sidebarManager.php'
?>

    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #30475E; boxshadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <h4>EDIT JADWAL PEGAWAI</h4>
        <hr>
        <form action="../process/editJadwalPegawaiProcess.php" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Pegawai</label>
                <select class="form-select" aria-label="Default select example" name="id_pegawai" id="id_pegawai" requied>
                    <?php
                        include('../db.php');
                        $id_pegawai = $_GET['id_pegawai'];
                        //menampilkan data pegawai
                        //$query = mysqli_query($con, "SELECT id_pegawai, nama_pegawai, nama_jabatan FROM pegawai JOIN jabatan USING(id_jabatan) ORDER BY id_pegawai asc") or die(mysqli_error($con));
                        
                        //untuk mendapatkan data pegawai yg hendak di update 
                        $temp = mysqli_query($con, "SELECT id_pegawai, nama_pegawai, nama_jabatan FROM pegawai JOIN jabatan USING(id_jabatan) WHERE id_pegawai=$id_pegawai ORDER BY id_pegawai asc") or die(mysqli_error($con));
                        $fetchTemp = mysqli_fetch_array($temp);
                        echo'<option value="'.$fetchTemp[0].'" selected >'.$fetchTemp[0].". ".$fetchTemp[1]." - ".$fetchTemp[2].'</option>';
                        
                    ?>
                </select>
            </div>

            
            <?php 
                // line 31-35 adalah line code mendapatkan data id jadwal untuk dikeep sebagai old id_jadwal ketika akan mengupdate jadwal 
                $old_idJadwal = $_GET['id_jadwal'];
            ?>
            <input type="hidden" name="old_idJadwal" value="<?php echo $old_idJadwal; ?>">
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jadwal Pegawai</label>
                <select class="form-select" aria-label="Default select example" name="id_jadwal" id="id_jadwal" requied>
                    <?php
                        include('../db.php');
                        $id_jadwal = $_GET['id_jadwal'];
                        //menampilkan data pegawai
                        $query3 = mysqli_query($con, "SELECT * FROM shift_pegawai") or die(mysqli_error($con));

                        //untuk mendapatkan data pegawai yg hendak di update 
                        $tempJadwal = mysqli_query($con, "SELECT * FROM shift_pegawai WHERE id_jadwal = $id_jadwal") or die(mysqli_error($con));
                        $fetchTempJadwal = mysqli_fetch_array($tempJadwal);
                        echo'<option value="'.$fetchTempJadwal[0].'" selected hidden>'.$fetchTempJadwal[0].". ".$fetchTempJadwal[1]." - Shift ".$fetchTempJadwal[2].'</option>';
                        
                        while($query4 = mysqli_fetch_array($query3)){
                            echo"<option value=".$query4[0].">".$query4[0].". ".$query4[1]." - Shift ".$query4[2]."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="mt-5 gap-2 text-center">
                <button type="submit" class="btn btn-success" name="edit" onclick="return confirm('Apakah Anda Yakin Ingin Mengubah Data Jadwal Pegawai Ini?')">Edit Jadwal</button>
                <a href="./listJadwalPegawaiPage.php" class="btn btn-danger" role="button" aria-disabled="true">Batal Tambah Jadwal</a>
            </div>
        </form>
    </div>
    </aside>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>