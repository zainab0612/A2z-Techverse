<?php
include('./src/header.php');
include('./src/main-navbar.php');
include('../database/dbcon.php');

$to = 0;
if (isset($_GET['to'])) {
    $to = $_GET['to'];
}

?>
<div class="main py-5 container-fluid bg-light" style="padding-bottom: 6.38% !important;">
    <div class="row my-5 py-5 mx-5">
        <div class="col-sm-3">
            <?php
            if (!$to) {
                echo  "
                <form>
                <div class='form-floating mb-3'>
                    <select class='form-select form-control' name='to' id='Freelancer' onchange='this.form.submit()' aria-label='Floating label select example'>
                        <option value='0' selected>Choose Freelancer</option>";
                if ($mainrow['role'] == 'developer') {
                    $q1 = mysqli_query($con, 'CALL get_specific_users("client")');
                } else {
                    $q1 = mysqli_query($con, 'CALL get_specific_users("developer")');
                }
                while ($row = mysqli_fetch_array($q1)) {
                    if (@$dfk == $row['id']) {
                        echo '<option value=' . $row['id'] . '>' . $row['name'] . '</option>';
                    } else {
                        echo '<option value=' . $row['id'] . '>' . $row['name'] . '</option>';
                    }
                }
                $q1->close();
                $con->next_result();
                echo "
                    </select>
                    <label for='Freelancer'>Freelancer</label>
                </div>
            </form>
                ";

                $id = 0;
                if (isset($_GET["to"])) {
                    $id = $_GET["to"];
                }
            }
            ?>
        </div>
        <div class="col-sm-6">
            <div class="container">
                <div class="card">
                    <div class="card-header text-center fw-bold h2 bg-white">
                        <div class="d-flex">
                            <div class="text-start fs-4"><a href="./home.php" class="text-dark text-decoration-none"><i class="bi bi-skip-backward-fill"></i> Back</a></div>
                            <div class="flex-fill text-dark text-center">Message</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div name="messages" class="messages">
                            <div class="row">
                                <?php
                                if ($mainrow['role'] == 'developer') {
                                    if (isset($_GET['role']) == 'developer') {
                                        $result = mysqli_query($con, "CALL sp_developers_messages($session_id,$to)");
                                    } else {
                                        $result = mysqli_query($con, "CALL sp_get_messages($to,$session_id)");
                                    }
                                } else {
                                    $result = mysqli_query($con, "CALL sp_get_messages($session_id,$to)");
                                }
                                while ($row = mysqli_fetch_array($result)) {
                                    if ($row['message']) {
                                        echo "
                            <div class='col-6 mb-2'>
                                 <div class='card bg-danger text-white fw-bold'>
                                    <div class='card-body'>
                                        " . $row['message'] . "
                                    </div>
                                </div>
                            </div>
                            <div class='col-6'></div>
                            ";
                                    } else {
                                        echo "<div class='col-6'></div>";
                                    }
                                }
                                $result->close();
                                $con->next_result();
                                if ($mainrow['role'] == 'developer') {
                                    $result2 = mysqli_query($con, "CALL sp_get_reply($to,$session_id)");
                                } else {
                                    $result2 = mysqli_query($con, "CALL sp_get_reply($session_id,$to)");
                                }
                                while ($row2 = mysqli_fetch_array($result2)) {
                                    if ($row2['Reply']) {
                                        echo "
                            <div class='col-6'></div>
                            <div class='col-6 mb-2'>
                                <div class='card bg-danger text-white fw-bold'>
                                    <div class='card-body'>
                                        " . $row2['Reply'] . "
                                    </div>
                                </div>
                            </div>";
                                    } else {
                                        echo "<div class='col-12'></div>";
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-white border-0">
                        <?php
                        if ($mainrow['role'] == 'developer') {
                            echo "
                            <form action='../database/message_reply.php' method='post'>
                                <input type='hidden' name='user_id' value=$session_id />
                                <input type='hidden' name='customer_id' value=$to />
                                <input type='hidden' name='role' value='" . isset($_GET['role']) . "' />
                                <div class='input-group mb-3'>
                                    <input type='text' class='form-control' onkeypress=\"return /[0-9a-zA-Z ,'-.:/?!$@()]/i.test(event.key)\" name='message' placeholder='Message' aria-label='Recipient's username' aria-describedby='button-addon2'>
                                    <input type='submit' class='btn btn-outline-dark fw-bold w-25' name='send_message' value='Send'>
                                </div>
                            </form>
                          ";
                        } else {
                            echo "
                            <form action='../database/send_message.php' method='post'>
                                <input type='hidden' name='user_id' value=$session_id />
                                <input type='hidden' name='customer_id' value=$to />
                                <div class='input-group mb-3'>
                                    <input type='text' class='form-control' onkeypress=\"return /[0-9a-zA-Z ,'-.:/?!$@()]/i.test(event.key)\" name='message' placeholder='Message' aria-label='Recipient's username' aria-describedby='button-addon2'>
                                    <input type='submit' class='btn btn-outline-dark fw-bold w-25' name='send_message' value='Send'>
                                </div>
                            </form>
                          ";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>
<?php
include('./src/footer.php')
?>