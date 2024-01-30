<?php

include('./dbcon.php');

if (isset($_POST['admin-save'])) {

    $password = password_hash($_POST["admin-password"], PASSWORD_DEFAULT);

    $sql = "CALL sp_create_user('" . $_POST["admin-name"] . "','" . $_POST["admin-email"] . "','" . $_POST["admin-phone"] . "','','" . $_POST['admin-country'] . "','" . $password . "','" . $_POST["admin-role"] . "')";

    if (mysqli_query($con, $sql)) {
        echo '<script>alert("User Created")
        window.location.href = `../pages/admin.php`
        </script>
        ';
    } else {
        echo '<script>alert("Error, PLease Try Again")
        window.location.href = `../pages/admin.php`
        </script>';
    }
}

?>