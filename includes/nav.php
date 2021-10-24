<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand ml-5" href="../index.php">
        <img src="../images/LOGO.png" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse ml-5" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
                <a class="nav-link" href="../joblist.php">Search Jobs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../careerblog.php">Career Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Company Review</a>
            </li>
        </ul>
        <ul class="navbar-nav">
            <!--admin-->
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 1): ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    For Employers
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Log In</a>
                    <a class="dropdown-item" href="#">Post Jobs</a>
                    <a class="dropdown-item" href="#">Search Resumes</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../admin_dashboard_add.php">
                    <i class="fa fa-user" aria-hidden="true"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../logout.php">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </li>
            <!--job seeker-->
            <?php elseif (isset($_SESSION['role']) && $_SESSION['role'] == 2): ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    For Employers
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Sign In</a>
                    <a class="dropdown-item" href="#">Post Jobs</a>
                    <a class="dropdown-item" href="#">Search Resumes</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../jseeker_dashboard.php">
                    <i class="fa fa-user" aria-hidden="true"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../logout.php">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </li>
            <!--employer-->
            <?php elseif (isset($_SESSION['role']) && $_SESSION['role'] == 3): ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    For Employers
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="../employer_PJ.php">Post Jobs</a>
                    <a class="dropdown-item" href="#">Search Resumes</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../employer_OV.php">
                    <i class="fa fa-user" aria-hidden="true"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../logout.php">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </li>
            <!--guest-->
            <?php else : ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    For Employers
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="../login_employer.php">Log In</a>
                    <a class="dropdown-item" href="#">Post Jobs</a>
                    <a class="dropdown-item" href="#">Search Resumes</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../login.php">
                    <i class="fa fa-user" aria-hidden="true"></i> Sign In
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../register.php">
                    <i class="fa fa-lock" aria-hidden="true"></i> Sign Up
                </a>
            </li>
            <?php endif ; ?>
        </ul>
    </div>
</nav>