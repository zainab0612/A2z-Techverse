<?php
include('./src/header.php');
include('./src/main-navbar.php');
include('../database/dbcon.php');

if (isset($_GET['by']) && isset($_GET['bid'])) {
    $job = $_GET['by'];
    $bid = $_GET['bid'];
} else {
    $job = $_POST['job_ids'];
    $bid = $_POST['bid_ids'];
}
?>

<div class='card my-5 pt-5 mx-5 shadow-lg border border-5 border-dark'>
    <div class='card-body'>
        <div class='text-center fw-bold'>
            <h1>Confirm Bid Acceptance</h1>
        </div>
        <div id='app' class='container py-2'>
            <div class='py-2 my-5'>
                <form action="../database/uploadData.php" method='post' enctype='multipart/form-data'>
                    <div class='modal-body'>
                        <input type='hidden' name='job_ids' value='<?php echo $job ?>'>
                        <input type='hidden' name='bid_ids' value='<?php echo $bid ?>'>
                        <div class='input-group my-3'>
                            <input type='file' name='project_video' class='form-control' id='inputGroupFile02' accept='video/mp4,video/x-m4v,video/*' required>
                            <label class='input-group-text' for='inputGroupFile02'>Upload Project Video</label>
                        </div>
                        <div class='input-group my-3'>
                            <input type='file' name='project' class='form-control' id='inputGroupFile02' accept='.zip,.rar,.7zip' required>
                            <label class='input-group-text' for='inputGroupFile02'>Upload Project</label>
                        </div>
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                        <button type='submit' name='complete_job' class='btn btn-danger mx-2'>Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include('./src/footer.php')
?>