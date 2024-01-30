<?php
include('./src/header.php');
include('./src/main-navbar.php');
include('../database/dbcon.php');
include('../database/session.php');

$id = $_GET['id'];
$result = mysqli_query($con, "CALL sp_get_specific_job('" . $id . "')") or die('Error In Session');
$row = mysqli_fetch_array($result);
?>

<div class="main py-5 container-fluid" >
    <div class="row">
        <div class="col-sm-12 p-5">
            <div class='card shadow-lg border border-5 border-dark mb-1'>
                <div class='card-header text-capitalize fw-bolder display-5'><?php echo $row['job_title'] ?>
                </div>
                <div class='card-body'>
                    <h5 class='card-text display-5 mb-5'><?php echo $row['job_description'] ?></h5>
                    <div class='row px-5'>
                        <div class='col-2 px-3 text-center fw-bold fs-5'>
                            <p class='card-text text-uppercase border bg-light'><?php echo $row['job_skills'] ?></p>
                        </div>
                        <div class="col-10 text-end">
                            <div class="row">
                                <div class="col-8 px-5 fw-bold fs-5 text-center">
                                    <p class='card-text text-uppercase'>Deadline: <?php echo $row['job_date'] ?></p>
                                </div>
                                <div class='col-4 px-5 fw-bold fs-5 text-center'>
                                    <p class='card-text text-uppercase'>Budget: $ <?php echo $row['job_budget'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <h3 class="text-center">Most Recent Bids</h3>
                    <div class='row border-bottom border-5 mb-4'>
                        <div class='col-2 fs-5'>Bidder Name</div>
                        <div class='col-4 fs-5'>Bid Description</div>
                        <div class='col-2 fs-5'>Proposed Budget</div>
                        <div class='col-2 fs-5'>Proposed Timeline</div>
                    </div>
                    <?php
                    $result->close();
                    $con->next_result();
                    $q1 = mysqli_query($con, "CALL sp_get_job_specific_bid($id)");
                    while ($row2 = mysqli_fetch_array($q1)) {
                        if ($row2['job_by'] == $session_id) {
                        echo "
                        <div class='row border-bottom border-5 mb-4'>
                        <div class='col-2 fs-3'>" . $row2['name'] . "</div>
                        <div class='col-4 fs-3'>" . $row2['bid_message'] . "</div>
                        <div class='col-2 fs-3'>$ " . $row2['bid_budget'] . "</div>
                        <div class='col-2 fs-3'>" . $row2['bid_timeline'] . "</div>
                            <div class='col-2'>
                                <div class='d-flex'>
                                    <a href='./chat.php?to=$row2[bid_by]' class='form-control mx-1 btn btn-outline-danger'>Chat</a>
                                    ";
                            if ($row2['remaining_workforce'] != 0) {
                                echo "
                                    <a href='../database/acceptOffer.php?bid=$id&by=$row2[bid_id]' class='mx-1'><Button class='form-control btn btn-danger' data-bs-toggle='modal' data-bs-target='#accept_offer'>Accept</Button></a>
                                        ";
                            }
                            echo "
                                </div>
                                </div>
                            </div>";
                        };
                    }
                    $q1->close();
                    $con->next_result();
                    ?>
                </div>
            </div>
        </div>
        <?php
        if ($mainrow['role'] == 'developer') {
            echo "
        <div class='col-sm-4 p-5'>
            <div class='card shadow-lg border border-5 border-dark'>
                <div class='card-body'>
                    <h1 class='text-center text-uppercase'>Propose your bid</h1>
                    <form action='../database/insertBid.php' method='post'>
                        <input type='hidden' name='user_id' value='$session_id'>
                        <input type='hidden' name='job_id' value='$id'>
                        <div class='input-group mb-3'>
                            <span class='input-group-text border-end-0 bg-white'><i class='bi bi-cash-coin'></i></span>
                            <div class='form-floating border-0'>
                                <input type='number' max='" . $row['job_budget'] . "' name='budget' class='form-control integer border-start-0 shadow-none' id='budget' placeholder='Username' required>
                                <label for='budget'>Proposed Budget</label>
                            </div>
                        </div>
                        <div class='input-group mb-3'>
                            <span class='input-group-text border-end-0 bg-white'><i class='bi bi-calendar-event'></i></span>
                            <div class='form-floating border-0'>
                                <input type='date' min='" . date('Y-m-d') . "' max='" . $row['job_date'] . "' name='timeline' class='form-control border-start-0 shadow-none' id='timeline' placeholder='Username' required>
                                <label for='timeline'>Proposed Time</label>
                            </div>
                        </div>
                        <div class='input-group mb-3'>
                            <span class='input-group-text border-end-0 bg-white'><i class='bi bi-pencil'></i></span>
                            <div class='form-floating border-0'>
                                <textarea class='form-control border-start-0 shadow-none' onkeypress=\"return /[0-9a-zA-Z ,'-.:/?!$@()]/i.test(event.key)\" placeholder='Leave a comment here' name='working' id='working' style='height: 100px' required></textarea>
                                <label for='working'>Short Description</label>
                            </div>
                        </div>
                        <input type='submit' name='bid' class='form-control btn btn-outline-danger fw-bold fs-5' value='Bid'>
                    </form>
                </div>
            </div>
        </div>
        ";
        }
        ?>
    </div>
</div>
<?php
include('./src/footer.php')
?>