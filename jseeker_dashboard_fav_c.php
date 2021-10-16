<?php include("includes/head.php"); ?>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/jseeker.css">
</head>
<body>
      
    <input type="checkbox" id="nav-toggle">
    <!-- Sidebar -->
      <div class="sidebar">
         <div class="sidebar-brand">
            <h2><span><img src="images/LOGO.png" alt=""></span></h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="jseeker_dashboard.php" class="active"><span><i class="fas fa-user"></i></span>
                    <span>Personal Information</span></a>
                </li>
                <li>
                    <a href="jseeker_dashboard_cv.php" class="active"><span><i class="fas fa-briefcase"></i></span>
                    <span>Curriculum Vitae</span></a>
                </li>
                <li>
                    <a href="#" class="active"><span><i class="fas fa-building"></i></span>
                    <span>Favourite Companies</span></a>
                </li>
                <li>
                    <a href="jseeker_dashboard_fav_j.php" class="active"><span><i class="fas fa-user-tie"></i></span>
                    <span>Favourite Jobs</span></a>
                </li>
                <li>
                    <a href="" class="active"><span><i class="fas fa-sign-out-alt"></i></span>
                    <span>Logout</span></a>
                </li>
            </ul>
        </div>
        </div>
    <!-- Sidebar -->

    <div class="main-content">
        <!-- Header -->
        <header>
            <h2>
                <label for="nav-toggle">
                    <span><i class="fas fa-bars text-white"></i></span>
                </label> 
            </h2>
            <div class="user-wrapper">
                <img src="images/Avatar.png" width="40px" height="40px" alt="">
                <div>
                    <h6 class="text-white">Administrador</h6>
                </div>
            </div>
        </header>
        <!-- Header -->

        <main>
            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h2>Favourite Companies</h2>
                        </div>
                        <div class="card-body">
                            <div class="c-list">
                                <div class="c-box">
                                    <a href="#">
                                        <img src="images/null_following.png" alt="">
                                        <h3>Null</h3>
                                    </a>
                                </div>
                                <div class="c-box">
                                    <a href="#">
                                        <img src="images/null_following.png" alt="">
                                        <h3>Null</h3>
                                    </a>
                                </div>
                                <div class="c-box">
                                    <a href="#">
                                        <img src="images/null_following.png" alt="">
                                        <h3>Null</h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>
         <footer>
            <p class="text-center pt-2">© 2021 WORKr. All rights reserved.</p>
        </footer>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>