<link rel="icon" href="../resource/A.png" type="image/ico">
<title>Atma Jogja Rental</title>
<?php
    ob_start();
    session_start();
    session_destroy();
    header("location: ../page/loginPage.php");
?>