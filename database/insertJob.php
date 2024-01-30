<?php
include('./session.php');
include('./dbcon.php');

if (isset($_POST['job-post'])) {
    $sql = "CALL sp_create_job('" . $session_id . "','" . $_POST["job-title"] . "','" . $_POST["job-description"] . "','" . $_POST["job-skills"] . "','" . $_POST["job-date"] . "','" . $_POST["job-budget"] . "','" . $_POST["job-workforce"] . "')";

    if (mysqli_query($con, $sql)) {
        echo '<script>
        alert("Job Posted")
    window.location.href = `../pages/home.php`
    </script>
    ';
    } else {
        echo '<script>alert("Error, PLease Try Again")
        window.location.href = `../pages/home.php` 
        </script>';
    }
}
