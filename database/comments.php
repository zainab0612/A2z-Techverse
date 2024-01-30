<?php

include('./dbcon.php');

    $sql = "CALL sp_insert_comment('" . $_POST["name"] . "','" . $_POST["email"] . "','" . $_POST["subject"] . "',\" $_POST[message]  \")";

    if (mysqli_query($con, $sql)) {
        echo '<script>alert("Comment Sent")
        window.location.href = `../pages/admin.php`
        </script>
        ';
    } else {
        echo '<script>alert("Error, PLease Try Again")
        window.location.href = `../pages/admin.php`
        </script>';
    }
?>