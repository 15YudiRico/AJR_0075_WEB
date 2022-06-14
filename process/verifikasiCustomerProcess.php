<link rel="icon" href="../resource/A.png" type="image/ico">
<title>Atma Jogja Rental</title>
<?php
    if(isset($_GET['id'])){
        include ('../db.php');
        $id_customer= $_GET['id'];
        $verifikasiCustomer = mysqli_query($con, "UPDATE customer SET verif_customer=1 WHERE id_customer='$id_customer'") or die(mysqli_error($con));
        if($verifikasiCustomer){
            echo
            '<script>
            alert("Verify Customer Success"); window.location = "../page/verifikasiCustomerPage.php"
            </script>';

        }else{
            echo
            '<script>
            alert("Verify Customer Failed"); window.location = "../page/verifikasiCustomerPage.php"
            </script>';
        }
    }else {
        echo
        '<script>
        window.history.back()
        </script>';
    }
?>