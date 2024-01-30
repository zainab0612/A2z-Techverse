<?php session_start(); ?>
<?php
include('./dbcon.php');

if (isset($_POST['update_password'])) {
    $result = mysqli_query($con, "CALL sp_user_login('" . $_POST["forgot_email"] . "')");
    $row = mysqli_fetch_array($result);
    echo $row['cnic'];
    if ($row['cnic'] == $_POST['forgot_cnic'] || $row['phone'] == $_POST['forgot_cnic']) {
        $num_row = mysqli_num_rows($result);
        $result->close();
        $con->next_result();
        if ($num_row > 0) {
            $password = password_hash($_POST["forgot_password"], PASSWORD_DEFAULT);
            $sql = "CALL sp_update_userPassword('" . $_POST["forgot_email"] . "','" . $password . "')";
            if (mysqli_query($con, $sql)) {
                echo '<script>
            alert("Password Updated")
        window.location.href = `../pages/login.php`
        </script>
        ';
            } else {
                echo '<script>alert("Error, PLease Try Again")
            window.location.href = `../pages/login.php` 
            </script>';
            }
        } else {
            echo "<script>alert('User Not Found')
        window.location.href = `../pages/login.php`
        </script>";
        }
    }
}
