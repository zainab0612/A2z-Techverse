<?php
include('./session.php');
include('./dbcon.php');

$bid = $_GET['bid_id'];

$sql = "DELETE FROM bid WHERE bid.bid_id = $bid";

if (mysqli_query($con, $sql)) {
    echo '<script>
    alert("Job Deleted")
window.location.href = `../pages/mybids.php`
</script>
';
} else {
    echo '<script>alert("Error, PLease Try Again")
    window.location.href = `../pages/mybids.php` 
    </script>';
}