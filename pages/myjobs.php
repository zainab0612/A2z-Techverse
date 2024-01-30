<?php
include('./src/header.php');
include('./src/main-navbar.php');
?>
<script src="https://js.stripe.com/v3/"></script>
<script src="../library/checkout.js" defer></script>

<div class="py-5 pt-5 bg-light" style="padding-bottom: 5% !important;">
    <ul class="nav nav-pills mb-3 my-5 py-5" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link fw-bold text-danger mx-5 text-uppercase display-5 active" id="pills-incomplete-jobs-tab" data-bs-toggle="pill" data-bs-target="#pills-incomplete-jobs" type="button" role="tab" aria-controls="pills-incomplete-jobs" aria-selected="true">Incomplete Jobs</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link fw-bold text-danger text-uppercase display-5" id="pills-completed-tab" data-bs-toggle="pill" data-bs-target="#pills-completed" type="button" role="tab" aria-controls="pills-completed" aria-selected="false">Completed Jobs</button>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-incomplete-jobs" role="tabpanel" aria-labelledby="pills-incomplete-jobs-tab" tabindex="0">
            <div class="text-center fw-bold">
                <h1>Incompleted Jobs</h1>
            </div>
            <div class="table-responsive">
                <table class="table table-hover mt-5 pt-5">
                    <thead class='border-bottom border-5 border-dark h3'>
                        <tr>
                            <th scope="col">Job Title</th>
                            <th scope="col">Job Description</th>
                            <th scope="col">Job Budget</th>
                            <th scope="col">Job Date</th>
                            <th scope="col">Job Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $con->next_result();
                        $query = mysqli_query($con, "CALL get_users_jobs('" . $session_id . "')");
                        while ($row = mysqli_fetch_array($query)) {
                            echo "
                    <tr>
                        <td class='px-5 text-uppercase fw-bold'>" . $row['job_title'] . "</td>
                        <td class='px-5 text-uppercase fw-bold'>" . $row['job_description'] . "</td>
                        <td class='px-5 text-uppercase fw-bold'>$ " . $row['job_budget'] . "</td>
                        <td class='px-5 text-uppercase fw-bold'>" . $row['job_date'] . "</td>
                        <td class='px-5 text-uppercase fw-bold'>" . $row['job_status'] . "</td>
                        <td class='px-5'><a href='../database/delete_job.php?job_id=$row[job_id]'><button type='button' class='btn btn-danger h5 text-decoration-none'><i class='bi bi-trash2-fill'></i></button></a></td>
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
                <h1>Completed Jobs</h1>
            </div>
            <div class="table-responsive">
                <table class="table table-hover mt-5 pt-5">
                    <thead class='border-bottom border-5 border-dark h3'>
                        <tr>
                            <th scope="col">Job Title</th>
                            <th scope="col">Job Description</th>
                            <th scope="col">Job Budget</th>
                            <th scope="col">Job Date</th>
                            <th scope="col">Job BY</th>
                            <th scope="col">Job Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $con->next_result();
                        $query = mysqli_query($con, "CALL get_users_jobs_completed('" . $session_id . "')");
                        while ($row = mysqli_fetch_array($query)) {
                            echo "
                    <tr>
                        <td class='px-5 text-uppercase fw-bold'>" . $row['job_title'] . "</td>
                        <td class='px-5 text-uppercase fw-bold'>" . $row['job_description'] . "</td>
                        <td class='px-5 text-uppercase fw-bold'>$ " . $row['bid_budget'] . "</td>
                        <td class='px-5 text-uppercase fw-bold'>" . $row['bid_timeline'] . "</td>
                        <td class='px-5 text-uppercase fw-bold'>" . $row['name'] . "</td>
                        <td class='px-5 text-uppercase fw-bold'>" . $row['job_status'] . "</td>
                        <td class='px-5'>
                        <button type='button' class='btn btn-danger h5 text-decoration-none' data-bs-toggle='modal' data-bs-target='#view'><i class='bi bi-eye-fill'></i></button>
                        ";
                            if ($row['job_status'] == 'paid' || $row['bid_status'] == 'paid') {
                                echo "
                            <a href='../library/assets/data/projects/$row[bid_job_file]' download><button type='button' class='btn btn-secondary h5 text-decoration-none' data-bs-toggle='modal' data-bs-target='#transaction'><i class='bi bi-cloud-download-fill'></i></button></a>
                            ";
                            } else {
                                echo "
                                    <a href='../database/transaction.php?job_id=$row[job_id]&bid_id=$row[bid_id]&bid_budget=$row[bid_budget]'><button type='button' class='btn btn-secondary h5 text-decoration-none'><i class='bi bi-credit-card-2-back-fill'></i></button></a>
                            ";
                            }
                            echo "
                        <a href='../database/delete_job.php?job_id=$row[job_id]'><button type='button' class='btn btn-danger h5 text-decoration-none'><i class='bi bi-trash2-fill'></i></button></a>
                        </td>
                    </tr>

                    <div class='modal fade' id='view' tabindex='-1' aria-labelledby='viewLabel'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                            <div class='modal-header'>
                                <h1 class='modal-title fs-5' id='viewLabel'>Project Demo</h1>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body'>
                                <video width='100%' height='100%' autoplay muted loop controls>
                                    <source src='../library/assets/data/project_video/$row[bid_job_video]' type='video/mp4'>
                                </video>
                            </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-danger' data-bs-dismiss='modal'>Close</button>
                            </div>
                            </div>
                        </div>
                    </div>";
                        }
                        $query->close();
                        $con->next_result();
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