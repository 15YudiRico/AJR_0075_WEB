<?php
    include '../component/sidebarCustomer.php'
?>

<?php
    if(isset($_GET['id'])) {
        include '../db.php';

        $id_transaksi= $_GET['id'];
        $stats= $_GET['stats'];
        if($stats == 1){
            $id_driver= $_GET['id_driver'];
        }
        
    }
?>

    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #30475E; boxshadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <h4>TAMBAH PENILAIAN KINERJA & RATING</h4>
        <hr>
        <form action="../process/createRatingTransaksiProcess.php" method="post">
            <?php 
                if($stats == 0){
                    echo'
                        <input type="hidden" name="id_transaksi"  value="'.$id_transaksi.'">
                        <input type="hidden" name="stats"  value="'.$stats.'">
                        
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Rating Rental</label>
                            <select class="form-select" aria-label="Default select example" name="rating_driver" id="rating_driver" required placeholder="Beri Rating Driver">
                                <option value="" selected hidden>Beri Rating Driver</option>
                                <option value="1">★☆☆☆☆</option>
                                <option value="2">★★☆☆☆</option>
                                <option value="3">★★★☆☆</option>
                                <option value="4">★★★★☆</option>
                                <option value="5">★★★★★</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Komentar Rental</label>
                            <br>
                            <textarea id="komentar_untuk_rental" name="komentar_untuk_rental" cols="163" rows="6" placeholder="Beri Komentar Rental (Opsional)"></textarea>
                        </div>

                        <div class="mt-5 gap-2 text-center">
                            <button type="submit" class="btn btn-success" name="add">Posting</button>
                            <a href="./listRiwayatTransaksiCustomerPage.php" class="btn btn-danger" role="button" aria-disabled="true">Batal</a>
                        </div>
                        ';
                } else {
                    echo'
                        <input type="hidden" name="id_transaksi"  value="'.$id_transaksi.'">
                        <input type="hidden" name="id_driver"  value="'.$id_driver.'">
                        <input type="hidden" name="stats"  value="'.$stats.'">
                    
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Rating Driver</label>
                            <select class="form-select" aria-label="Default select example" name="rating_driver" id="rating_driver" required placeholder="Beri Rating Driver">
                                <option value="" selected hidden>Beri Rating Driver</option>
                                <option value="1">★☆☆☆☆</option>
                                <option value="2">★★☆☆☆</option>
                                <option value="3">★★★☆☆</option>
                                <option value="4">★★★★☆</option>
                                <option value="5">★★★★★</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Komentar Driver</label>
                            <br>
                            <textarea id="komentar_untuk_driver" name="komentar_untuk_driver" cols="163" rows="5" placeholder="Beri Komentar Driver (Opsional)"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Rating Rental</label>
                            <select class="form-select" aria-label="Default select example" name="rating_rental" id="rating_rental" required placeholder="Beri Rating Rental">
                                <option value="" selected hidden>Beri Rating Driver</option>
                                <option value="1">★☆☆☆☆</option>
                                <option value="2">★★☆☆☆</option>
                                <option value="3">★★★☆☆</option>
                                <option value="4">★★★★☆</option>
                                <option value="5">★★★★★</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Komentar Rental</label>
                            <br>
                            <textarea id="komentar_untuk_rental" name="komentar_untuk_rental" cols="163" rows="5" placeholder="Beri Komentar Rental (Opsional)"></textarea>
                        </div>

                        <div class="mt-5 gap-2 text-center">
                            <button type="submit" class="btn btn-success" name="add">Posting</button>
                            <a href="./listRiwayatTransaksiCustomerPage.php" class="btn btn-danger" role="button" aria-disabled="true">Batal</a>
                        </div>
                    ';
                }
            ?>    
        </form>
    </div>
    </aside>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>