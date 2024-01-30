<?php
include('./dbcon.php');
include('./session.php');

if (isset($_POST['send_message'])) {

    $sql = "CALL sp_send_message(\"$_POST[message]\",'" . $_POST["user_id"] . "','" . $_POST["customer_id"] . "')";


    if (mysqli_query($con, $sql)) {
        echo '<script>
            window.location.href = `../pages/chat.php?to=' . $_POST['customer_id'] . '`
        </script>
        ';
    } else {
        echo '<script>alert("Error, PLease Try Again")
        window.location.href = `../pages/chat.php?to=' . $_POST['customer_id'] . '`
        </script>';
    }
}
