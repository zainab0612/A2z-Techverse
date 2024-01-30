<?php
include('../database/dbcon.php');
?>

<header id="header" class="fixed-top d-flex align-items-center header-transparent">
  <div class="container-fluid">

    <div class="row justify-content-center align-items-center">
      <div class="col-xl-11 d-flex align-items-center justify-content-between">
        <h1 class="logo"><a href="./index.php">A2z Techverse</a></h1>

        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto px-2 active" href="./index.php#hero">Home</a></li>
            <li><a class="nav-link scrollto px-2" href="./index.php#about">About</a></li>
            <li><a class="nav-link scrollto px-2" href="./index.php#skills">SKills</a></li>
            <li><a class="nav-link scrollto px-2 " href="./index.php#portfolio">Portfolio</a></li>
            <li><a class="nav-link scrollto px-2" href="./index.php#team">Team</a></li>
            <li><a class="nav-link scrollto px-2" href="./index.php#contact">Contact</a></li>
            <li class="px-2">
              <form action="./posts.php" id="filter_form">
                <div id="language">
                  <select class="form-select center toCenter bg-danger text-white border-0" onchange="this.form.submit()" name="language" id="language">
                    <option value='' selected>Search for a Skill</option>
                    <?php
                    $q1 = mysqli_query($con, "CALL sp_filteration_all()");
                    while ($row = mysqli_fetch_array($q1)) {
                      if (@$dfk == $row["job_skills"]) {
                        echo "<option class='text-uppercase' value=" . urlencode($row["job_skills"]) . ">" . $row["job_skills"] . "</option>";
                      } else {
                        echo "<option class='text-uppercase' value=" . urlencode($row["job_skills"]) . ">" . $row["job_skills"] . "</option>";
                      }
                    }
                    ?>
                  </select>
                </div>
              </form>
            </li>
            <li class="px-2"><a class="nav-link btn btn-danger text-white text-center px-2 " href="./login.php">Login</a></li>
            <li class="px-2"><a class="nav-link btn btn-danger text-white text-center px-2 " href="./register.php">Register</a></li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
      </div>
    </div>

  </div>
</header><!-- End Header -->