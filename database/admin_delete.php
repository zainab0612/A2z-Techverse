<?php
include('./session.php');
include('./dbcon.php');

if (isset($_GET['job_id'])) {
    $sql = "DELETE FROM jobs WHERE job_id = '" . $_GET["job_id"] . "'";
    if (mysqli_query($con, $sql)) {
        echo '<script>
            alert("Job deleted Successfully")
            window.location.href = `../Pages/admin.php`
        </script>
        ';
    } else {
        echo '<script>alert("Error, PLease Try Again")
        window.location.href = `../Pages/admin.php`
        </script>';
    }
} else if (isset($_GET['user_id'])) {
    $sql = "DELETE FROM users WHERE id = '" . $_GET["user_id"] . "'";
    if (mysqli_query($con, $sql)) {
        echo '<script>
            alert("User deleted Successfully")
            window.location.href = `../Pages/admin.php`
        </script>
        ';
    } else {
        echo '<script>alert("Error, PLease Try Again")
        window.location.href = `../Pages/admin.php`
        </script>';
    }
} else if (isset($_GET['bid_id'])) {
    $sql = "DELETE FROM bid WHERE bid_id = '" . $_GET["bid_id"] . "'";
    if (mysqli_query($con, $sql)) {
        echo '<script>
            alert("Bid deleted Successfully")
            window.location.href = `../Pages/admin.php`
        </script>
        ';
    } else {
        echo '<script>alert("Error, PLease Try Again")
        window.location.href = `../Pages/admin.php`
        </script>';
    }
} else if (isset($_GET['admin_id'])) {
    $sql = "DELETE FROM users WHERE id = '" . $_GET["admin_id"] . "'";
    if (mysqli_query($con, $sql)) {
        echo '<script>
            alert("Admin deleted Successfully")
            window.location.href = `../Pages/admin.php`
        </script>
        ';
    } else {
        echo '<script>alert("Error, PLease Try Again")
        window.location.href = `../Pages/admin.php`
        </script>';
    }
}
