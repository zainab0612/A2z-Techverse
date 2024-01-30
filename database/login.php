<?php session_start(); ?>
<?php
include('./dbcon.php');

if (isset($_POST['login'])) {
    $result = mysqli_query($con, "CALL sp_user_login('" . $_POST["email"] . "')");

    $row = mysqli_fetch_array($result);

    $hash = $row["password"];
    $pass = $_POST["password"];

    if (password_verify($_POST["password"], $hash)) {
        $num_row = mysqli_num_rows($result);

        if ($num_row > 0) {
            if ($row['role'] == 'client') {
                $_SESSION['user_id'] = $row['id'];
                header('location:../pages/home.php');
            } else if ($row['role'] == 'developer') {
                $_SESSION['user_id'] = $row['id'];
                header('location:../pages/profile.php');
            } else if ($row['role'] == 'admin') {
                $_SESSION['user_id'] = $row['id'];
                header('location:../pages/admin.php');
            }
        } else {
            echo "<script>alert('User not found!!')
            window.location.href = `../pages/login.php`
            </script>";
        }
    } else {
        echo "<script>alert('Invalid Username or Password')
        window.location.href = `../pages/login.php`
        </script>";
    }
}
?>
