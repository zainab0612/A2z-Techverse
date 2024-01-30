<?php
include('./src/header.php');
include('./src/main-navbar.php');
?>
<div class="py-5 pt-5 bg-light" style="padding-bottom: 5% !important;">
    <ul class="nav nav-pills mb-3 my-5 py-5" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link fw-bold text-danger mx-5 text-uppercase display-5 active" id="pills-incomplete-jobs-tab" data-bs-toggle="pill" data-bs-target="#pills-incomplete-jobs" type="button" role="tab" aria-controls="pills-incomplete-jobs" aria-selected="true">Completed Jobs</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link fw-bold text-danger text-uppercase display-5" id="pills-completed-tab" data-bs-toggle="pill" data-bs-target="#pills-completed" type="button" role="tab" aria-controls="pills-completed" aria-selected="false">Pending Jobs</button>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-incomplete-jobs" role="tabpanel" aria-labelledby="pills-incomplete-jobs-tab" tabindex="0">
            <div class="text-center fw-bold">
                <h1>Completed Jobs</h1>
            </div>
            <div class="table-responsive">
                <table class="table table-hover mt-5 pt-5">
                    <thead class='border-bottom border-5 border-dark h3'>
                        <tr>
                            <th scope="col" class="px-5">Job Title</th>
                            <th scope="col">Job Description</th>
                            <th scope="col">Bid Budget</th>
                            <th scope="col">Bid Date</th>
                            <th scope="col">Job Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $con->next_result();
                        $query = mysqli_query($con, "CALL get_users_completed_jobs_bid('" . $session_id . "')");
                        while ($row = mysqli_fetch_array($query)) {
                            echo "
                    <tr>
                        <td class='px-5 text-uppercase fw-bold'>" . $row['job_title'] . "</td>
                        <td class='px-5 text-uppercase fw-bold'>" . $row['job_description'] . "</td>
                        <td class='px-5 text-uppercase fw-bold'>$ " . $row['bid_budget'] . "</td>
                        <td class='px-5 text-uppercase fw-bold'>" . $row['bid_timeline'] . "</td>
                        <td class='px-5 text-uppercase fw-bold'>" . $row['job_status'] . "</td>
                    </tr>";
                        }
                        $query->close();
                        $con->next_result();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-completed" role="tabpanel" aria-labelledby="pills-completed-tab" tabindex="0">
            <div class="text-center fw-bold">
                <h1>Pending Jobs</h1>
            </div>
            <div class="table-responsive">
                <table class="table table-hover mt-5 pt-5">
                    <thead class='border-bottom border-5 border-dark h3'>
                        <tr>
                            <th scope="col" class="px-5">Job Title</th>
                            <th scope="col">Job Description</th>
                            <th scope="col">Bid Budget</th>
                            <th scope="col">Bid Date</th>
                            <th scope="col">Job Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $con->next_result();
                        $query = mysqli_query($con, "CALL get_users_bids('" . $session_id . "')");
                        while ($row = mysqli_fetch_array($query)) {
                            if ($row['bid_status'] == 'accepted') {
                                echo "
                    <tr>
                        <td class='px-5 text-uppercase fw-bold'>" . $row['job_title'] . "</td>
                        <td class='px-5 text-uppercase fw-bold'>" . $row['job_description'] . "</td>
                        <td class='px-5 text-uppercase fw-bold'>$ " . $row['bid_budget'] . "</td>
                        <td class='px-5 text-uppercase fw-bold'>" . $row['bid_timeline'] . "</td>
                        <td class='px-5 text-uppercase fw-bold'>" . $row['job_status'] . "</td>
                        <td class='px-5 text-uppercase fw-bold'>" . $row['bid_status'] . "</td>
                        <td class='px-5'>";
                                if ($row['job_status'] == 'active' && $row['bid_job_file'] == '' && $row['bid_job_video'] == '') {
                                    echo "<a href='./bidComplete.php?bid=$row[bid_id]&by=$row[job_id]' class='mx-1'><button type='button' class='btn btn-info h5 text-decoration-none' data-bs-toggle='modal' data-bs-target='#fileUploader'><i class='bi bi-send-check-fill'></i></button></a>";
                                }
                                echo "
                            <a href='../database/delete_bid.php?bid_id=$row[bid_id]'><button type='button' class='btn btn-danger h5 text-decoration-none'><i class='bi bi-trash2-fill'></i></button></a>
                        </td>
                    </tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
include('./src/footer.php')
?>