<?php
include('./src/header.php');
include('./src/navbar.php');
include('../database/dbcon.php');
?>
<main id='main' class="py-5 pb-5 container-fluid bg-danger">
    <div class="row">
        <section class="col-sm-3 p-5">
            <div class="card bg-white border border-5 border-dark shadow-lg">
                <div class="card-body">
                    <form id="filter_form">
                        <h5 class="text-center">Filter</h5>
                        <?php
                        $res = mysqli_query($con, 'CALL sp_filteration_range');
                        $r = mysqli_fetch_array($res);
                        ?>
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <div id="from-range">
                                    <label for='fromRangeInputId' class='form-label fw-bold'>From Range</label>
                                    <input type='number' name='min_range' onchange="this.form.submit()" value='<?php echo $r['MIN'] ?>' min='<?php echo $r['MIN'] ?>' max='<?php echo $r['MAX'] ?>' oninput='fromRangeOutputId.value = fromRangeInputId.value' class='form-control integer' id='fromRangeInputId' onblur="this.form.submit()">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div id="to-range">
                                    <label for='toRangeInputId' class='form-label fw-bold'>To Range</label>
                                    <input type='number' name='max_range' onchange="this.form.submit()" value='<?php echo $r['MAX'] ?>' min='<?php echo $r['MIN'] ?>' max='<?php echo $r['MAX'] ?>' oninput='toRangeOutputId.value = toRangeInputId.value' class='form-control integer' id='toRangeInputId' onblur="this.form.submit()">
                                </div>
                            </div>
                        </div>
                        <?php
                        $res->close();
                        $con->next_result();
                        ?>
                        <div id="language">
                            <label for="language" class="fw-bold mb-2">Skill</label>
                            <select class="form-select h4 center toCenter rounded-pill" onchange="this.form.submit()" name="language" id="language">
                                <option value='' selected>Choose Skill</option>";
                                <?php
                                $q1 = mysqli_query($con, "CALL sp_filteration_all()");
                                while ($row = mysqli_fetch_array($q1)) {
                                    if (@$dfk == $row["job_skills"]) {
                                        echo "<option class='text-uppercase' value=" . urlencode($row["job_skills"]) . ">" . $row["job_skills"] . "</option>";
                                    } else {
                                        echo "<option class='text-uppercase' value=" . urlencode($row["job_skills"]) . ">" . $row["job_skills"] . "</option>";
                                    }
                                }
                                $q1->close();
                                $con->next_result();
                                ?>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <section id="contact" class="col-sm-9 p-5 pb-5">
            <?php
            if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
                $page_no = $_GET['page_no'];
            } else {
                $page_no = 1;
            }

            $total_records_per_page = 10;
            $offset = ($page_no - 1) * $total_records_per_page;
            $previous_page = $page_no - 1;
            $next_page = $page_no + 1;
            $adjacents = "2";

            $result_count = mysqli_query($con, "SELECT COUNT(*) As total_records FROM jobs");
            $total_records = mysqli_fetch_array($result_count);
            $total_records = $total_records['total_records'];
            $total_no_of_pages = ceil($total_records / $total_records_per_page);
            $second_last = $total_no_of_pages - 1; // total page minus 1

            if (isset($_GET["language"]) || isset($_GET["min_range"]) || isset($_GET["max_range"])) {
                if ($_GET["language"] != '' || $_GET["language"] != null) {
                    $new = urldecode($_GET['language']);
                    $result = mysqli_query($con, "SELECT * FROM jobs WHERE jobs.job_status = 'pending' AND job_skills = '$new'");
                } else {
                    $result = mysqli_query($con, "SELECT * FROM jobs WHERE jobs.job_status = 'pending' AND jobs.job_budget BETWEEN '$_GET[min_range]' AND '$_GET[max_range]'");
                }
            } else {
                $new = urldecode($_GET['language']);
                $result = mysqli_query($con, "SELECT * FROM jobs WHERE jobs.job_status = 'pending' AND jobs.job_skills = '$new'");
            }
            while ($row = mysqli_fetch_array($result)) {
                echo "
                <div class='card shadow-lg border border-5 border-dark mb-1'>
                    <div class='card-header fs-4 text-capitalize bg-white fw-bold'>
                        " . $row['job_title'] . "
                    </div>
                    <div class='card-body'>
                        <h5 class='card-text'>" . $row['job_description'] . "</h5>
                        <div class='row'>
                            <div class='col-3 text-center fw-bold fs-5'>
                                <p class='card-text text-uppercase border bg-light'>" . $row['job_skills'] . "</p>
                            </div>
                            <div class='col text-end'>";
                echo "<a href='./login.php' class='btn btn-danger fw-bold'>LOGIN for more details or bid</a>";
                echo "
                            </div>
                        </div>
                    </div>
                </div>
                ";
            }
            mysqli_close($con);
            ?>
            <div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC; color: #fff;'>
                <strong>Page <?php echo $page_no . " of " . $total_no_of_pages; ?></strong>
            </div>

            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                    <?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } 
                    ?>

                    <li class="page-item fw-bold text-danger" <?php if ($page_no <= 1) {
                                                                    echo "class='disabled'";
                                                                } ?>>
                        <a class='page-link fw-bold text-danger' <?php if ($page_no > 1) {
                                                                        echo "href='?page_no=$previous_page'";
                                                                    } ?>>Previous</a>
                    </li>


                    <li class="page-item fw-bold text-danger" <?php if ($page_no >= $total_no_of_pages) {
                                                                    echo "class='disabled'";
                                                                } ?>>
                        <a class="page-link fw-bold text-danger" <?php if ($page_no < $total_no_of_pages) {
                                                                        echo "href='?page_no=$next_page'";
                                                                    } ?>>Next</a>
                    </li class="page-item">
                    <?php if ($page_no < $total_no_of_pages) {
                        echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
                    } ?>
                </ul>
        </section>
    </div>
</main>
<?php
include('./src/footer.php')
?>