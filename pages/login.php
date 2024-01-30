<?php
include('./src/header.php');
include('./src/navbar.php');
?>
<main id="main">
    <!-- ======= hero Section ======= -->
    <div class="modal fade" id="updatePasswordModal" tabindex="-1" aria-labelledby="updatePasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center border-0">
                    <h1 class="modal-title fs-5" id="updatePasswordModalLabel">Update Password</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="../database/updateForgottenPassword.php" method="post">
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input type="email" name="forgot_email" class="form-control" id="userEmail" placeholder="name@example.com" required>
                            <label for="userEmail">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="forgot_cnic" class="form-control" id="cnic" placeholder="name@example.com" required>
                            <label for="cnic">CNIC OR Phone #</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="forgot_password" class="form-control" id="floatingPassword" placeholder="Password" required>
                            <label for="floatingPassword">New Password</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" name="update_password" value="Save changes" class="btn btn-danger" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <section id="hero">
        <div class="hero-container">
            <div id="heroCarousel" class="carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

                <div class="carousel-item active" style="background-image: url(../library/assets/img/hero-carousel/4.jpg)">
                    <div class="carousel-container">
                        <div class="w-50">
                            <h1 class="display-2 text-danger fw-bold text-center">LOGIN</h1>
                            <form action="../database/login.php" method="post">
                                <div class="form-floating mb-3">
                                    <input type="text" name="email" class="form-control rounded" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Email address</label>
                                </div>
                                <div class="form-floating">
                                    <input type="password" name="password" class="form-control rounded" id="floatingPassword" placeholder="Password">
                                    <label for="floatingPassword">Password</label>
                                </div>
                                <input type="submit" name="login" class="btn btn-lg btn-danger btn-block mt-3 fw-bold form-control" value="LOGIN">
                                <div class="text-center mt-4">
                                    <p class="text-white h4" data-bs-toggle="modal" data-bs-target="#updatePasswordModal">Forget Password?</p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section><!-- End Hero Section -->
</main><!-- End #main -->
<?php
include('./src/footer.php')
?>