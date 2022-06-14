<?php
    include '../component/sidebarManager.php'
?>

    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #30475E; boxshadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <h4>TAMBAH JADWAL PEGAWAI</h4>
        <hr>
        <form action="../process/createJadwalPegawaiProcess.php" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Pegawai</label>
                <select class="form-select" aria-label="Default select example" name="id_pegawai" id="id_pegawai" requied>
                    <?php
                        include('../db.php');
                        $query = mysqli_query($con, "SELECT id_pegawai, nama_pegawai, nama_jabatan FROM pegawai JOIN jabatan USING(id_jabatan) WHERE id_pegawai>0 ORDER BY id_pegawai asc") or die(mysqli_error($con));
                        echo'<option value="" selected hidden>Pilih Pegawai</option>';
                        while($query2 = mysqli_fetch_array($query)){
                            echo"<option value=".$query2[0].">".$query2[0].". ".$query2[1]." - ".$query2[2]."</option>";
                        }
                    ?>
                </select>
            </div>
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jadwal Pegawai</label>
                <select class="form-select" aria-label="Default select example" name="id_jadwal" id="id_jadwal" requied>
                    <?php
                        include('../db.php');
                        $query3 = mysqli_query($con, "SELECT * FROM shift_pegawai") or die(mysqli_error($con));
                        echo'<option value="" selected hidden>Pilih Jadwal</option>';
                        while($query4 = mysqli_fetch_array($query3)){
                            echo"<option value=".$query4[0].">".$query4[0].". ".$query4[1]." - Shift ".$query4[2]."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="mt-5 gap-2 text-center">
                <button type="submit" class="btn btn-success" name="add">Tambah Jadwal</button>
                <a href="./listJadwalPegawaiPage.php" class="btn btn-danger" role="button" aria-disabled="true">Batal Tambah Jadwal</a>
            </div>
        </form>
    </div>
    </aside>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>