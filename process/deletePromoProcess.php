<link rel="icon" href="../resource/A.png" type="image/ico">
<title>Atma Jogja Rental</title>
<?php
    if(isset($_GET['id'])){
        include ('../db.php');
        $id_promo= $_GET['id'];
        $query = mysqli_query($con, "SELECT * FROM transaksi_penyewaan_mobil WHERE id_promo='$id_promo'") or die(mysqli_error($con));
        if(mysqli_num_rows($query) != 0){
            $queryUpdate = mysqli_query($con, "UPDATE promo SET status_promo = 0 WHERE id_promo='$id_promo'") or die(mysqli_error($con));
            
            if($queryUpdate){
                echo
                '<script>
                alert("Success Disabled Promo"); window.location = "../page/listPromoManagerPage.php"
                </script>';
    
            }else{
                echo
                '<script>
                alert("Failed Disabled Promo"); window.location = "../page/listPromoManagerPage.php"
                </script>';
            }
        }else{
            $queryDelete = mysqli_query($con, "DELETE FROM promo WHERE id_promo='$id_promo'") or die(mysqli_error($con));
            
            if($queryDelete){
                echo
                '<script>
                alert("Delete Promo Success"); window.location = "../page/listPromoManagerPage.php"
                </script>';
    
            }else{
                echo
                '<script>
                alert("Delete Promo Failed"); window.location = "../page/listPromoManagerPage.php"
                </script>';
            }
        }
    }else {
        echo
        '<script>
        window.history.back()
        </script>';
    }
?>