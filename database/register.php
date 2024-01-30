<?php session_start(); ?>
<?php
include('./dbcon.php');

if (isset($_POST['Client-Register'])) {

    $password = password_hash($_POST["client-password"], PASSWORD_DEFAULT);

    $sql = "CALL sp_create_user('" . $_POST["client-name"] . "','" . $_POST["client-email"] . "','" . $_POST["client-phone"] . "','','" . $_POST['client-country'] . "','" . $password . "','" . $_POST["client-role"] . "')";

    if (mysqli_query($con, $sql)) {
        echo '<script>alert("User Created")
        window.location.href = `../pages/login.php`
        </script>
        ';
    } else {
        echo '<script>alert("Error, PLease Try Again")
        window.location.href = `../pages/signup.php`
        </script>';
    }
}
if (isset($_POST['Developer-Register'])) {

    $password = password_hash($_POST["developer-password"], PASSWORD_DEFAULT);

    $sql = "CALL sp_create_user('" . $_POST["developer-name"] . "','" . $_POST["developer-email"] . "','','" . $_POST["developer-cnic"] . "','" . $_POST['developer-country'] . "','" . $password . "','" . $_POST["developer-role"] . "')";

    if (mysqli_query($con, $sql)) {
        echo '<script>alert("User Created")
        window.location.href = `../pages/login.php`
        </script>
        ';
    } else {
        echo '<script>alert("Error, PLease Try Again")
        window.location.href = `../pages/signup.php`
        </script>';
    }
}

?>