<?php
include('./dbcon.php');
include('./session.php');
include('../pages/src/header.php');
include('../pages/src/main-navbar.php');

$con->next_result();
$id = $_GET['bid'];
$by = $_GET['by'];
$q1 = mysqli_query($con, "CALL sp_get_acceptance_bid($id,$by)");
$row2 = mysqli_fetch_array($q1);

echo "
<div class='card my-5 pt-5 mx-5 shadow-lg border border-5 border-dark'>
<div class='card-body'>
<div class='text-center fw-bold'><h1>Confirm Bid Acceptance</h1></div>
<div id='app' class='container py-2'>
    <div class='py-2 my-5'>
                <form method='post' action='#'>
                    <div class='modal-body'>
                    <input type='hidden' name='job_id' value='$row2[job_id]' />
                    <input type='hidden' name='bid_by' value='$row2[bid_by]' />
                    <input type='hidden' name='bid_id' value='$_GET[by]'/>
                    <div class='form-floating mb-3'>
                        <input type='number' class='form-control integer' value='$row2[bid_budget]' name='updated_budget' id='name' placeholder='name@example.com'>
                        <label for='name'>Bid Budget</label>
                    </div>
                    <div class='form-floating mb-3'>
                        <input type='date' class='form-control' value='$row2[bid_timeline]' name='updated_time' id='name' placeholder='name@example.com'>
                        <label for='name'>Bid Date</label>
                    </div>
                    </div>
                    <div class='modal-footer'>
                    <a href='../pages/bid.php?id=$id' class='btn btn-danger mx-2'>Go Back</a>
                    <button type='submit' name='accept_offer' class='btn btn-danger'>Confirm</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
";
if (isset($_POST['accept_offer'])) {
    $con->next_result();    
    $result = mysqli_query($con, "CALL sp_update_bid('" . $_POST["bid_id"] . "','" . $_POST["updated_budget"] . "','" . $_POST["updated_time"] . "')");
    if ($result) {
        $con->next_result();
        $r = mysqli_query($con, "CALL sp_workforce_update('" . $_POST["job_id"] . "')");
        if ($r) {
            $con->next_result();
            $rr = mysqli_query($con, "CALL sp_remaining_job('" . $_POST["job_id"] . "')");
            $row = mysqli_fetch_array($rr);
            echo $row['workforce'], $row['remaining_workforce'] - ($row['workforce'] <= 0);
            if ($row['workforce'] != 1 && ($row['remaining_workforce'] - $row['workforce']) < 0) {
                if ($row['remaining_workforce'] == $row['workforce'] - 1) {
                    $con->next_result();
                    $r1 = mysqli_query($con, "CALL sp_add_group_chat('" . $_POST["job_id"] . "','" . $row2["job_by"] . "','" . $_POST["bid_by"] . "')");
                } else if ($row['remaining_workforce'] == $row['workforce'] - 2) {
                    $con->next_result();
                    $r1 = mysqli_query($con, "UPDATE group_chat SET group_member2 = $_POST[bid_by] WHERE group_job = $_POST[job_id]");
                } else if ($row['remaining_workforce'] == $row['workforce'] - 3) {
                    $con->next_result();
                    $r1 = mysqli_query($con, "UPDATE group_chat SET group_member3 = $_POST[bid_by] WHERE group_job = $_POST[job_id]");
                } else if ($row['remaining_workforce'] == $row['workforce'] - 4) {
                    $con->next_result();
                    $r1 = mysqli_query($con, "UPDATE group_chat SET group_member4 = $_POST[bid_by] WHERE group_job = $_POST[job_id]");
                } else if ($row['remaining_workforce'] == $row['workforce'] - 5) {
                    $con->next_result();
                    $r1 = mysqli_query($con, "UPDATE group_chat SET group_member5 = $_POST[bid_by] WHERE group_job = $_POST[job_id]");
                }
            }
            if ($row['remaining_workforce'] == 0) {
                $con->next_result();
                $res = mysqli_query($con, "CALL sp_job_status_update('" . $_POST["job_id"] . "')");
                if ($res) {
                    echo '<script> alert("Bid accepted")
                        window.location.href = "../pages/home.php"
                        </script>
                        ';
                } else {
                    echo '<script>alert("Error, PLease Try Again")
                    window.location.href = "../pages/bid.php?id=' . $_POST["job_id"] . '" 
                    </script>';
                }
            } else {
                echo '<script>
                alert("Bid accepted, Workforce Remaining!!")
                window.location.href = "../pages/bid.php?id=' . $_POST["job_id"] . '"
                </script>
                ';
            }
        }
    } else {
        echo '<script>alert("Error, PLease Try Again")
        window.location.href = `../pages/home.php` 
        </script>';
    }
}

include('../pages/src/footer.php');
