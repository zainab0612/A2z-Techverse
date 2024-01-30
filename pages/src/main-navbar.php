<?php
include('../database/dbcon.php');
include('../database/session.php');

$result = mysqli_query($con, "CALL sp_get_specific_user('" . $session_id . "')");
$mainrow = mysqli_fetch_array($result);
?>
<header id="header" class="fixed-top d-flex align-items-center header-transparent">
  <div class="container-fluid">

    <div class="row justify-content-center align-items-center main_navbar">
      <div class="col-xl-11 d-flex align-items-center justify-content-between">
        <h1 class="logo"><a href="../index.php">A2z Techverse</a></h1>
        <span class="h5 mt-3"><?php if ($mainrow['role'] == 'developer') {
                                echo "(Freelancer)";
                              } else {
                                echo "(Clients)";
                              }
                              ?></span>
        

        <nav id="navbar" class="navbar">
          <input type="hidden" id="current_page" value='<?php echo substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1); ?>'>
          <ul>
            <li>
              <?php if ($mainrow['role'] == 'client') {
                echo "<a class='nav-link tab scrollto px-3 mx-4 active bg-danger text-white' href='home.php'>Hello! $mainrow[name]</a>";
              } else {
                echo "<a class='nav-link tab scrollto px-3 mx-4 active border border-5 border-danger bg-danger text-white' href='home.php'>Hello! $mainrow[name]</a>";
              } ?>
            </li>
            <li><a id="home.php" class="nav-link tab scrollto px-5 mx-2 active btn btn-outline-light" href="home.php">Home</a></li>
            <li class="nav-item dropdown"><a id="profile.php" class="nav-link dropdown-toggle scrollto px-5 mx-2 btn btn-outline-light">My Profile</a>
              <ul class="dropdown-menu">
                    <li><a id="profile.php" class="nav-link tab scrollto mx-2 btn btn-outline-light" href="profile.php">My Info & Stats</a></li>
                    <li><a id="chat.php" class="nav-link tab scrollto mx-2 btn btn-outline-light" href="chat.php">My Chats</a></li>
                    <?php
                    if ($mainrow['role'] == 'client') {
                      echo "<li><a id='myjobs.php' class='nav-link tab scrollto mx-2 btn btn-outline-light' href='myjobs.php'>My Projects</a></li>";
                    } else if ($mainrow['role'] == 'developer') {
                      echo "
                        <li><a id='mybids.php' class='nav-link tab scrollto mx-2 btn btn-outline-light' href='mybids.php'>My Bids</a></li>
                        ";
                    }
                    ?>
              </ul>
            </li>
            <li><a class="nav-link tab scrollto px-5 mx-2 btn btn-outline-danger text-white" href="logout.php">Logout</a></li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
      </div>
    </div>

  </div>
</header><!-- End Header -->
<script>
  const tabs = ['home.php', 'profile.php', 'chat.php', 'myjobs.php', 'mybids.php','mygroups.php']

  const currentPage = document.getElementById('current_page').value

  for (let i = 0; i < tabs.length; i++) {
    document.getElementById(`${tabs[i]}`).classList.remove('active')
    if (tabs[i] == currentPage) {
      document.getElementById(`${tabs[i]}`).classList.add('active')
    }
  }
</script>