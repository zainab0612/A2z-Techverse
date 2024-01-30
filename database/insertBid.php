<?php
include('./dbcon.php');

if (isset($_POST['bid'])) {
    $sql = "CALL sp_create_bid('" . $_POST["job_id"] . "','" . $_POST["user_id"] . "','" . $_POST["budget"] . "','" . $_POST["timeline"] . "',\" $_POST[working]  \")";

    if (mysqli_query($con, $sql)) {
        echo '<script>
        alert("Bid Proposed")
    window.location.href = `../pages/home.php`
    </script>
    ';
    } else {
        echo '<script>alert("Error, PLease Try Again")
        window.location.href = `../pages/home.php` 
        </script>';
    }
}
