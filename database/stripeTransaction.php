<?php
include('./dbcon.php');
require_once "../library/stripe-php-master/init.php";

$stripedetails = array(
    "publishableKey" => "pk_test_51NDC1eEMromoE4IrVVUmCvLEWyNCtIgrKk8Sc0x9iSwlVjdgGBnOdCOkzEANQdcKehXKvJNZ5fUL95iegnoGgl7y003J8Bluxw",
    "secretKey" => "sk_test_51NDC1eEMromoE4IrDLJSks75aO1mSGEVf0VptwgMGxmGx3VaUXfc6BtjtrBwdDjQfpEwmDPyJ7Xc2EoSkYkGSkSJ0026ncYdQa"
);

\Stripe\Stripe::setApiKey($stripedetails['secretKey']);

$job = $_POST["job_id"];
$bid = $_POST["bid_id"];
$token = $_POST["stripeToken"];
$amount = $_POST["payment"];

$charge = \Stripe\Charge::create([
    'amount' => $amount * 100,
    'description' => '',
    'currency' => 'pkr',
    'source' => $token,
]);

if ($charge) {
    $query = "UPDATE bid SET bid.bid_status = 'paid' WHERE bid.bid_id = $bid";
    if (mysqli_query($con, $query)) {
        $con->next_result();
        $r = mysqli_query($con, "CALL sp_workforce_update('" . $job . "')");
        if ($r) {
            $con->next_result();
            $rr = mysqli_query($con, "CALL sp_remaining_job('" . $job . "')");
            $row = mysqli_fetch_array($rr);
            echo "GG", $row['remaining_workforce'];
            if ($row['remaining_workforce'] == 0) {
                $con->next_result();
                $sql = "UPDATE jobs SET jobs.job_status = 'paid' WHERE jobs.job_id = $job";
                if (mysqli_query($con, $sql)) {
                    echo '<script>
                                alert("Job transaction Completed")
                                window.location.href = `../pages/myjobs.php`
                            </script>
                        ';
                }
            } else {
                echo '<script>
                            alert("transaction Completed")
                            window.location.href = `../pages/myjobs.php`
                        </script>
                    ';
            }
        }
    }
}
