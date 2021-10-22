<?php include("includes/head.php"); ?>
<link rel="stylesheet" href="css/jseeker.css">
<link rel="stylesheet" href="css/dashboard.css">
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
                    <a href="#" class="active"><span><i class="fas fa-briefcase"></i></span>
                        <span>Curriculum Vitae</span></a>
                </li>
                <li>
                    <a href="jseeker_dashboard_fav_c.php" class="active"><span><i class="fas fa-building"></i></span>
                        <span>Favourite Companies</span></a>
                </li>
                <li>
                    <a href="jseeker_dashboard_fav_j.php" class="active"><span><i class="fas fa-user-tie"></i></span>
                        <span>Favourite Jobs</span></a>
                </li>
                <li>
                    <a href="logout.php" class="active"><span><i class="fas fa-sign-out-alt"></i></span>
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
                <div class="customers">
                    <div class="card">
                        <div class="profile-header">
                            <h3>Profile</h3>
                        </div>
                        <div class="profile-body">
                            <div class="profile-img">
                                <div class="info">
                                    <img src="images/null_following.png" width="300px" height="300px " alt="">
                                    <a href="" style="margin-top: 20px;"><i class="fas fa-plus"></i> Upload Picture</a>
                                    <a href=""><i class="fas fa-times"></i> Clear Picture</a>
                                </div>
                            </div>
                            <div class="text-box">
                                <h1>VO THUY KHANG</h1>
                                <h4 style="margin-bottom: 20px;">Not updated</h4>
                                <p><i class="fas fa-star"></i> No experience</p>
                                <p><i class="fas fa-user"></i> No desired rank</p>
                                <p><i class="fas fa-dollar-sign"></i> No desired salary</p>
                                <button type="submit" class="edit-btn">Edit Profile</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- ==================================================================================================== -->



            <div class="recent-grid">
                <div class="customers">
                    <div class="card">
                        <div class="profile-header">
                            <h3><i class="fas fa-user-circle" style="width: 50px;"></i>Profile Title*</h3>
                            <button type="submit" class="edit-btn"
                                style="padding: 0px 30px; margin: 0px 0px 0px auto;">Edit</button>
                        </div>
                        <div class="profile-body">
                            <div class="pdesc-box">
                                <p>no profile description :(</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- ==================================================================================================== -->



            <div class="recent-grid">
                <div class="customers">
                    <div class="card">
                        <div class="profile-header">
                            <h3><i class="fas fa-id-badge" style="width: 50px;"></i>Personal Info</h3>
                            <button type="submit" class="edit-btn"
                                style="padding: 0px 30px; margin: 0px 0px 0px auto;">Edit</button>
                        </div>
                        <div class="profile-body">
                            <div class="neatly-constructed-grid-rows">
                                <div class="neatly-put-grid-columns">
                                    <h2>Surname</h2>
                                    <p>C</p>
                                </div>
                                <div class="neatly-put-grid-columns">
                                    <h2>Name</h2>
                                    <p>J</p>
                                </div>
                                <div class="neatly-put-grid-columns">
                                    <h2>Email</h2>
                                    <p>2number9s@cjmail.com</p>
                                </div>
                                <div class="neatly-put-grid-columns">
                                    <h2>Nationality</h2>
                                    <p>Me, Myself & I</p>
                                </div>
                                <div class="neatly-put-grid-columns">
                                    <h2>Martial Status</h2>
                                    <label id="img_category_label" class="field" for="img_category" data-value="">
                                        <span></span>
                                        <div id="img_category" class="psuedo_select" name="img_category">
                                            <span class="selected"></span>
                                            <ul id="img_category_options" class="options">
                                                <li class="option" data-value="opt_1">Single</li>
                                                <li class="option" data-value="opt_2">Married</li>
                                            </ul>
                                        </div>
                                    </label>
                                </div>
                                <div class="neatly-put-grid-columns">
                                    <h2>Current Country</h2>
                                    <p>Country Road</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- ==================================================================================================== -->



            <div class="recent-grid">
                <div class="customers">
                    <div class="card">
                        <div class="profile-header">
                            <h3><i class="fas fa-bullseye" style="width: 50px;"></i>Professional Goals</h3>
                            <button type="submit" class="edit-btn"
                                style="padding: 0px 30px; margin: 0px 0px 0px auto;">Edit</button>
                        </div>
                        <div class="profile-body">
                            <div class="pdesc-box">
                                <p>no goals :((</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- ==================================================================================================== -->



            <div class="recent-grid">
                <div class="customers">
                    <div class="card">
                        <div class="profile-header">
                            <h3><i class="fas fa-briefcase" style="width: 50px;"></i>Current Job</h3>
                            <button type="submit" class="edit-btn"
                                style="padding: 0px 30px; margin: 0px 0px 0px auto;">Edit</button>
                        </div>
                        <div class="profile-body">
                            <div class="neatly-constructed-grid-rows">
                                <div class="neatly-put-grid-columns">
                                    <h2>Salary</h2>
                                    <label id="img_category_label" class="field" for="img_category" data-value="">
                                        <span></span>
                                        <div id="img_category" class="psuedo_select" name="img_category">
                                            <span class="selected"></span>
                                            <ul id="img_category_options" class="options">
                                                <li class="option" data-value="opt_1">Still Broke</li>
                                                <li class="option" data-value="opt_2">Enough to eat chicken noodle</li>
                                                <li class="option" data-value="opt_2">Mother*ucking Jeff Bezo</li>
                                            </ul>
                                        </div>
                                    </label>
                                </div>
                                <div class="neatly-put-grid-columns">
                                    <h2>Employment Type</h2>
                                    <label id="img_category_label" class="field" for="img_category" data-value="">
                                        <span></span>
                                        <div id="img_category" class="psuedo_select" name="img_category">
                                            <span class="selected"></span>
                                            <ul id="img_category_options" class="options">
                                                <li class="option" data-value="opt_1">Part-time</li>
                                                <li class="option" data-value="opt_2">Full-time</li>
                                            </ul>
                                        </div>
                                    </label>
                                </div>
                                <div class="neatly-put-grid-columns">
                                    <h2>Job</h2>
                                    <label id="img_category_label" class="field" for="img_category" data-value="">
                                        <span></span>
                                        <div id="img_category" class="psuedo_select" name="img_category">
                                            <span class="selected"></span>
                                            <ul id="img_category_options" class="options">
                                                <li class="option" data-value="opt_1">Dying</li>
                                                <li class="option" data-value="opt_2">Dieing</li>
                                            </ul>
                                        </div>
                                    </label>
                                </div>
                                <div class="neatly-put-grid-columns">
                                    <h2>Job Enviroment</h2>
                                    <label id="img_category_label" class="field" for="img_category" data-value="">
                                        <span></span>
                                        <div id="img_category" class="psuedo_select" name="img_category">
                                            <span class="selected"></span>
                                            <ul id="img_category_options" class="options">
                                                <li class="option" data-value="opt_1">Office</li>
                                                <li class="option" data-value="opt_2">Like a hobo</li>
                                            </ul>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- ==================================================================================================== -->



            <div class="recent-grid">
                <div class="customers">
                    <div class="card">
                        <div class="profile-header">
                            <h3><i class="fas fa-star" style="width: 50px;"></i>Work Experience</h3>
                            <button type="submit" class="edit-btn"
                                style="padding: 0px 30px; margin: 0px 0px 0px auto;">Edit</button>
                        </div>
                        <div class="profile-body" id="special-body-uwu">
                            <div class="pdesc-box">
                                <p>no experience :(((</p>
                            </div>
                            <hr class="center-diamond">
                            <div class="neatly-constructed-grid-rows">
                                <div class="neatly-put-grid-columns">
                                    <h2>Years Of Experience</h2>
                                    <label id="img_category_label" class="field" for="img_category" data-value="">
                                        <span></span>
                                        <div id="img_category" class="psuedo_select" name="img_category">
                                            <span class="selected"></span>
                                            <ul id="img_category_options" class="options">
                                                <li class="option" data-value="opt_1">0-5</li>
                                                <li class="option" data-value="opt_2">5-10</li>
                                                <li class="option" data-value="opt_3">69+</li>
                                            </ul>
                                        </div>
                                    </label>
                                </div>
                                <div class="neatly-put-grid-columns">
                                    <h2>Current Diploma</h2>
                                    <label id="img_category_label" class="field" for="img_category" data-value="">
                                        <span></span>
                                        <div id="img_category" class="psuedo_select" name="img_category">
                                            <span class="selected"></span>
                                            <ul id="img_category_options" class="options">
                                                <li class="option" data-value="opt_1">Elementary, my dear Watson</li>
                                                <li class="option" data-value="opt_2">2</li>
                                                <li class="option" data-value="opt_3">Dropped out</li>
                                            </ul>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- ==================================================================================================== -->



            <div class="recent-grid">
                <div class="customers">
                    <div class="card">
                        <div class="profile-header">
                            <h3><i class="fas fa-graduation-cap" style="width: 50px;"></i>Education</h3>
                            <button type="submit" class="edit-btn"
                                style="padding: 0px 30px; margin: 0px 0px 0px auto;">Edit</button>
                        </div>
                        <div class="profile-body" id="special-body-uwu">
                            <div class="pdesc-box">
                                <p>illiteracy is a running problem :((((</p>
                            </div>
                            <hr class="center-diamond">
                            <div class="neatly-constructed-grid-rows">
                                <div class="neatly-put-grid-columns">
                                    <h2>School</h2>
                                    <p>Hogwarts School of Witchcraft and Wizardry</p>
                                </div>
                                <div class="neatly-put-grid-columns">
                                    <h2>Start Of Academic Year</h2>
                                    <p>0000</p>
                                </div>
                                <div class="neatly-put-grid-columns">
                                    <h2>End Of Academic Year</h2>
                                    <p>0006</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- ==================================================================================================== -->



            <div class="recent-grid">
                <div class="customers">
                    <div class="card">
                        <div class="profile-header">
                            <h3><i class="fas fa-graduation-cap" style="width: 50px;"></i>Other Diplomas</h3>
                            <button type="submit" class="edit-btn"
                                style="padding: 0px 30px; margin: 0px 0px 0px auto;">Edit</button>
                        </div>
                        <div class="profile-body">
                            <div class="neatly-constructed-grid-rows">
                                <div class="neatly-put-grid-columns">
                                    <h2>Degree</h2>
                                    <p>Bachelor Degree Of Fine Arts >:(</p>
                                </div>
                                <div class="neatly-put-grid-columns">
                                    <h2>Description</h2>
                                    <p>I should have been aiming for this</p>
                                </div>
                                <hr class="center-diamond">
                                <!-- cái hr là trong trường hợp còn thêm chứng chỉ -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- ==================================================================================================== -->



            <div class="recent-grid">
                <div class="customers">
                    <div class="card">
                        <div class="profile-header">
                            <h3><i class="fas fa-trophy" style="width: 50px;"></i>Achievements</h3>
                            <button type="submit" class="edit-btn"
                                style="padding: 0px 30px; margin: 0px 0px 0px auto;">Edit</button>
                        </div>
                        <div class="profile-body">
                            <div class="neatly-constructed-grid-rows">
                                <div class="neatly-put-grid-columns">
                                    <h2>Achievement</h2>
                                    <p>5 millions words read</p>
                                </div>
                                <div class="neatly-put-grid-columns">
                                    <h2>Description</h2>
                                    <p>AO3 isn't good for my health</p>
                                </div>
                                <hr class="center-diamond">
                                <!-- cái hr là trong trường hợp còn thêm achievements -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- ==================================================================================================== -->



            <div class="recent-grid">
                <div class="customers">
                    <div class="card">
                        <div class="profile-header">
                            <h3><i class="fas fa-air-freshener" style="width: 50px;"></i>Activities</h3>
                            <button type="submit" class="edit-btn"
                                style="padding: 0px 30px; margin: 0px 0px 0px auto;">Edit</button>
                        </div>
                        <div class="profile-body">
                            <div class="neatly-constructed-grid-rows">
                                <div class="neatly-put-grid-columns">
                                    <h2>Activity</h2>
                                    <p>Doodling</p>
                                </div>
                                <div class="neatly-put-grid-columns">
                                    <h2>Description</h2>
                                    <p>I should have been working on this</p>
                                </div>
                                <hr class="center-diamond">
                                <!-- cái hr là trong trường hợp còn thêm activities -->
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="js/bad_decisions.js"></script>
</body>

</html>