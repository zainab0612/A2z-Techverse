<?php
include('./dbcon.php');
include('../pages/src/header.php');
include('../pages/src/main-navbar.php');

$amount = round($_GET['bid_budget'] - ($_GET['bid_budget'] * 3 / 100));
?>


<br /><br />
<div class='card mt-5 pt-5 mx-5 shadow-lg border border-5 border-dark' id='transaction'>
    <div class='card-body'>
        <div class='text-center fw-bold'>
            <h1>Transaction</h1>
        </div>
        <div id='app' class='container py-2'>
            <div class='py- my-5'>
                <div class='container'>
                    <h1>Online Transaction</h1>
                    <form action='./stripeTransaction.php' method='POST' id="payment-form">
                        <input type='hidden' name='job_id' value='<?php echo $_GET['job_id'] ?>' />
                        <input type='hidden' name='bid_id' value='<?php echo $_GET['bid_id'] ?>' />
                        <div class='mb-3'>
                            <label for='card-number' class='form-label'>Amount</label>
                            <input type='text' class='form-control' id='card-number' name='payment' value="<?php echo $amount ?>" required readonly>
                        </div>
                        
                        <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="pk_test_51NDC1eEMromoE4IrVVUmCvLEWyNCtIgrKk8Sc0x9iSwlVjdgGBnOdCOkzEANQdcKehXKvJNZ5fUL95iegnoGgl7y003J8Bluxw" data-amount="<?php echo $amount * 100 ?>" data-currency="pkr" data-locale="auto"></script>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

