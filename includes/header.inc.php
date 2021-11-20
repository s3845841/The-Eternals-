<?php require_once('functions.inc.php'); ?>
<?php
  $prefix = "";
  if (file_exists('../includes/sqlConnection.inc.php')) {
    $prefix = "../";
  }

  $currentUser = getLoggedInUser();

?>

  <header>
    <nav class="navbar navbar-expand-lg navbar-dark edupal-nav mb-2">
        <div class="container-fluid">
            <button
                    class="navbar-toggler"
                    type="button"
                    data-mdb-toggle="collapse"
                    data-mdb-target="#navbarExample01"
                    aria-controls="navbarExample01"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
            >
                <i class="fas fa-bars"></i>
            </button>
        
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link edupal-logo" aria-current="page" href="<?php echo $prefix; ?>" style="color: black;">
                    <img class="home-page-image" src="<?php echo $prefix; ?>images/logo.png" alt="" width="15%">    
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
              <?php if (isset($currentUser)){ ?>
                <?php if ($currentUser->getMemberType() == "mentor"){ ?>
                  <li class="nav-item">
                    <a class="nav-link edupal-links" href="">
                    Hi Mentor
                    </a>
                  </li>
                <?php } else { ?>
                  <li class="nav-item">
                    <a class="nav-link edupal-links" href="">
                    Hi Mentee
                    </a>
                  </li>
                <?php } ?>
                <li class="nav-item">
                  <a class="nav-link edupal-links" href="<?php echo $prefix; ?>posts/">
                  Posts
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link edupal-links" href="<?php echo $prefix; ?>chats/">
                  Chats
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link edupal-links" href="<?php echo $prefix; ?>about/">
                  About Us
                  </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link edupal-links" href="<?php echo $prefix; ?>logout.php">
                    Log Out
                    </a>
                </li>
              <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link edupal-links" href="<?php echo $prefix; ?>about/">
                    About Us
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link edupal-links" href="<?php echo $prefix; ?>login/">
                    Log In
                    </a>
                </li>
              <?php } ?>
            </ul>
        </div>
    </nav>
</header>
