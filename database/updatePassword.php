<?php
include('./dbcon.php');
include('./session.php');

if (isset($_POST['update_password'])) {
    $result = mysqli_query($con, "CALL sp_user_login('" . $_POST["passwordemail"] . "')");
    $num_row = mysqli_num_rows($result);
    $result->close();
    $con->next_result();
    if ($num_row > 0) {
        $password = password_hash($_POST["new_password"], PASSWORD_DEFAULT);
        $sql = "CALL sp_update_userPassword('" . $_POST["passwordemail"] . "','" . $password . "')";
        if (mysqli_query($con, $sql)) {
            echo '<script>
            alert("Password Updated")
        window.location.href = `../pages/profile.php`
        </script>
        ';
        } else {
            echo '<script>alert("Error, PLease Try Again")
            window.location.href = `../pages/profile.php` 
            </script>';
        }
    } else {
        echo "<script>alert('User Not Found')
        window.location.href = `../pages/profile.php`
        </script>";
    }
}
