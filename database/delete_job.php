<?php
include('./session.php');
include('./dbcon.php');

$job = $_GET['job_id'];

$sql = "DELETE FROM jobs WHERE jobs.job_id = $job";

if (mysqli_query($con, $sql)) {
    echo '<script>
    alert("Job Deleted")
window.location.href = `../pages/myjobs.php`
</script>
';
} else {
    echo '<script>alert("Error, PLease Try Again")
    window.location.href = `../pages/myjobs.php` 
    </script>';
}