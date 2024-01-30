<?php
include('./dbcon.php');
include('./session.php');

if (isset($_POST['update'])) {
    $sql = "CALL sp_update_user('" . $session_id . "','" . $_POST["name"] . "','" . $_POST["email"] . "','" . $_POST["phone_number"] . "','" . $_POST["cnic"] . "','" . $_POST["country"] . "')";

    if (mysqli_query($con, $sql)) {
        echo '<script>
        alert("User information update")
    window.location.href = `../pages/profile.php`
    </script>
    ';
    } else {
        echo '<script>alert("Error, PLease Try Again")
        window.location.href = `../pages/profile.php` 
        </script>';
    }
}
