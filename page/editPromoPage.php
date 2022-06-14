<?php
    include '../component/sidebarManager.php'
    
?>

<?php
    if(isset($_GET['id'])) {
        include '../db.php';
        
        $id_promo=$_GET['id'];

        $query = mysqli_query($con, "SELECT * FROM promo WHERE id_promo=$id_promo") or die(mysqli_error($con));
        $data = mysqli_fetch_array($query); 
    }
?>


    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #30475E; boxshadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <h4 >EDIT PROMO</h4>
        <hr>
        <form action="../process/editPromoProcess.php" method="post">
            <input type="hidden" name="id_promo" value="<?php echo $data[0]; ?>">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kode Promo</label>
                <input class="form-control" id="kode_promo" name="kode_promo" placeholder="Kode Promo" required aria-describedby="emailHelp" value="<?php echo $data[1]; ?>">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jenis Promo</label>
                <input class="form-control" id="jenis_promo" name="jenis_promo" placeholder="Jenis Promo" required aria-describedby="emailHelp" value="<?php echo $data[2]; ?>">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Persenan Promo</label>
                <input class="form-control" id="persenan_promo" type="number" name="persenan_promo" min="0" max="100" placeholder="Persenan Promo" required aria-describedby="emailHelp" value="<?php echo $data[4]; ?>">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Keterangan Promo</label>
                <input class="form-control" id="keterangan_promo" name="keterangan_promo" required placeholder="Keterangan Promo" aria-describedby="emailHelp" value="<?php echo $data[3]; ?>">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Status Promo</label>
                    <div class="mb-3">
                        <input type="radio" id="status_promo" name="status_promo" value= "1" required 
                            <?php if($data[5] == 1){echo 'checked';}?>/> Aktif &emsp;
                        <input type="radio" id="status_promo" name="status_promo" value= "0" required
                            <?php if($data[5] == 0){echo 'checked';}?>/> Tidak Aktif
                    </div>
            </div>

            <div class="mt-5 gap-2 text-center">
                <button type="submit" class="btn btn-success" name="edit" onclick="return confirm('Apakah Anda Yakin Ingin Mengubah Data Promo Ini?')">Edit Promo</button>
                <a href="./listPromoManagerPage.php" class="btn btn-danger" role="button" aria-disabled="true">Batal Edit Promo</a>
            </div>
            </form>
    </div>
    </aside>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>