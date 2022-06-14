<?php
    include '../component/sidebarCustomer.php'
?>

<?php
        include '../db.php';
        $id_transaksi = $_GET['id']; 
        $temp = mysqli_query($con, "SELECT * FROM transaksi_penyewaan_mobil WHERE id_transaksi ='$id_transaksi'") or die(mysqli_error($con));
        $user = mysqli_fetch_array($temp);
?>

<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #40A798; boxshadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
    <h4>SHOW TRANSAKSI PEMBAYARAN</h4>
            <div class="row mt-3 form-control">
                <div class="mb-3"><label class="labels">TGL Pengembalian</label>
                    <input class="form-control" disabled value="<?php echo $user[13]; ?>">
                </div>
                <div class="mb-3"><label class="labels">Sub Total</label>
                    <input class="form-control" disabled value="Rp<?php echo $user[18]; ?>,00">
                </div>
                <div class="mb-3"><label class="labels">Diskon</label>
                    <input class="form-control" disabled value="<?php if($user[21]!=0) {echo 'Rp',$user[21],',00';}else{echo 'Rp-';}?>">
                </div>
                <div class="mb-3"><label class="labels">Denda </label>
                    <input class="form-control" disabled value="<?php if($user[19]!=0) {echo 'Rp',$user[19],',00';}else{echo 'Rp-';}?>">
                </div>
                <div class="mb-3"><label class="labels">Total Pembayaran </label>
                    <input class="form-control" disabled value="Rp<?php echo $user[20]; ?>,00">
                </div>

                <form action="../process/editTransaksiPembayaranProcess.php" method="post">
                    <input type="hidden" name="id_transaksi" value="<?php echo $user[0]; ?>">

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Metode Pembayaran</label>
                            <div class="mb-3">
                                <input type="radio" id="metode_pembayaran" name="metode_pembayaran" value= "0" required <?php if($user[12]==0) { echo 'checked'; } ?> /> Tunai &emsp;
                                <input type="radio" id="metode_pembayaran" name="metode_pembayaran" value= "1" required <?php if($user[12]==1) { echo 'checked'; }?> /> Nontunai
                            </div>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Bukti Pembayaran</label>
                        <input class="form-control" type="url" id="bukti_pembayaran" required name="bukti_pembayaran" placeholder="Upload Link Bukti Pembayaran" aria-describedby="emailHelp">
                    </div>

                    <div class="mt-4 text-center">
                        <button type="submit" class="btn btn-success" name="edit">Checkout</button>
                        <a href="./showTransaksiBerjalanPage.php" class="btn btn-primary" role="button" aria-disabled="true">Back</a>
                    </div>
                </form>
            </div>
</div>
</aside>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>