<?php 

    include './func/cre.php';
    include './func/render.php';

    $model = new Model;

    if (isset($_SESSION['role']) && $_SESSION['role'] == 2) {
            
        $role = $_SESSION['role']; 
        $userid = $_SESSION['userid'];
        $employer = new stdClass();

        $jobseeker = $model->getJobSeeker($userid);
        // End header

        
    }else{

        echo "<script>window.location.href = 'index.php';</script>";

    }
?>

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
                    <a href="jseeker_dashboard_cv.php" class="active"><span><i class="fas fa-briefcase"></i></span>
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
                    <a href="jseeker_dashboard_review.php" class="active"><span><i class="fas fa-pen"></i></span>
                        <span>Company Reviews</span></a>
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

        <?php renderHeader($role, $jobseeker, $employer); ?>

        <!-- Header -->

        <main>
            <div class="recent-grid">
                <div class="customers">
                    <div class="card">
                        <div class="profile-header">
                            <h3>WORKr Profile</h3>
                        </div>
                        <div class="profile-body">
                            <div class="profile-img">
                                <div class="info">
                                    <img src="images/null_following.png" width="300px" height="300px " alt="">
                                    <a data-toggle='modal' data-target='#imagePopUp' data-whatever='@getbootstrap'
                                        href="" style="margin-top: 20px;"><i class="fas fa-plus"></i> Upload Picture</a>
                                    <a href=""><i class="fas fa-times"></i> Clear Picture</a>
                                </div>
                            </div>
                            <div class="text-box">
                                <h1>VO THUY KHANG</h1>
                                <h4 style="margin-bottom: 20px;">Not updated</h4>
                                <p><i class="fas fa-star"></i> No experience</p>
                                <p><i class="fas fa-user"></i> No desired rank</p>
                                <p><i class="fas fa-dollar-sign"></i> No desired salary</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- image form -->
            <div class='modal fade' id='imagePopUp' tabindex='-1' role='dialog' aria-labelledby='imagePopUpForm'
                aria-hidden='true'>
                <div class='modal-dialog' role='document'>
                    <form action='' method='post'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='imagePopUpForm'>New Image</h5>
                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                            <div class='modal-body'>
                                <form>
                                    <label for="img">Select image:</label>
                                    <input type="file" id="img" name="img" accept="image/*">
                                    <input type="submit">
                                </form>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- ==================================================================================================== -->
            <div class="recent-grid">
                <div class="customers">
                    <div class="card">
                        <div class="profile-header">
                            <h3><i class="fas fa-id-badge" style="width: 50px;"></i>Personal Information</h3>
                            <button data-toggle='modal' data-target='#personalInfoPopUp' data-whatever='@getbootstrap'
                                type="submit" class="edit-btn"
                                style="padding: 0px 30px; margin: 0px 0px 0px auto;">Edit</button>
                        </div>
                        <div class="profile-body" id="special-body-uwu">
                            <div class="neatly-constructed-grid-rows">
                                <div class="neatly-put-grid-columns">
                                    <h2>First Name</h2>
                                    <p>C</p>
                                </div>
                                <div class="neatly-put-grid-columns">
                                    <h2>Last Name</h2>
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
                                    <p>Married</p>
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

            <!-- personal info form -->
            <div class='modal fade' id='personalInfoPopUp' tabindex='-1' role='dialog'
                aria-labelledby='personalInfoPopUpForm' aria-hidden='true'>
                <div class='modal-dialog modal-dialog-centered' role='document'>
                    <form action='' method='post' style="width: 100%;">
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='personalInfoPopUpForm'>Personal Information</h5>
                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                            <div class='modal-body'>
                                <form>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">First Name:</label>
                                        <input style="margin-left: 0;" type="text" class="form-control"
                                            id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Last Name:</label>
                                        <input style="margin-left: 0;" type="text" class="form-control"
                                            id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Email:</label>
                                        <input style="margin-left: 0;" type="text" class="form-control"
                                            id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Nationality:</label>
                                        <input style="margin-left: 0;" type="text" class="form-control"
                                            id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Current Address:</label>
                                        <input style="margin-left: 0;" type="text" class="form-control"
                                            id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Marital Status:</label>
                                        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                            <option selected>Choose...</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </form>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                    <button type='submit' class='btn btn-success' name='title'>Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- ==================================================================================================== -->

            <div class="recent-grid">
                <div class="customers">
                    <div class="card">
                        <div class="profile-header">
                            <h3><i class="fas fa-user-circle" style="width: 50px;"></i>Resume Title*</h3>
                            <button data-toggle='modal' data-target='#titlePopUp' data-whatever='@getbootstrap'
                                type="submit" class="edit-btn"
                                style="padding: 0px 30px; margin: 0px 0px 0px auto;">Edit</button>
                        </div>
                        <div class="profile-body">
                            <div class="pdesc-box">
                                <p>no title :(</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- title form -->
            <div class='modal fade' id='titlePopUp' tabindex='-1' role='dialog' aria-labelledby='titlePopUpForm'
                aria-hidden='true'>
                <div class='modal-dialog' role='document'>
                    <form action='' method='post'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='titlePopUpForm'>Resume Title</h5>
                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                            <div class='modal-body'>
                                <form>
                                    <div class='form-group'>
                                        <textarea class='form-control' id='title-text' name='title-content'></textarea>
                                    </div>
                                </form>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                    <button type='submit' class='btn btn-success' name='title'>Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- ==================================================================================================== -->

            <div class="recent-grid">
                <div class="customers">
                    <div class="card">
                        <div class="profile-header">
                            <h3><i class="fas fa-bullseye" style="width: 50px;"></i>Career Objective</h3>
                            <button data-toggle='modal' data-target='#goalsPopUp' data-whatever='@getbootstrap'
                                type="submit" class="edit-btn"
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

            <!-- goals form -->
            <div class='modal fade' id='goalsPopUp' tabindex='-1' role='dialog' aria-labelledby='goalsPopUpForm'
                aria-hidden='true'>
                <div class='modal-dialog' role='document'>
                    <form action='' method='post'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='goalsPopUpForm'>Career Objective</h5>
                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                            <div class='modal-body'>
                                <form>
                                    <div class='form-group'>
                                        <textarea class='form-control' id='title-text' name='title-content'></textarea>
                                    </div>
                                </form>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                    <button type='submit' class='btn btn-success' name='title'>Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- ==================================================================================================== -->

            <div class="recent-grid">
                <div class="customers">
                    <div class="card">
                        <div class="profile-header">
                            <h3><i class="fas fa-briefcase" style="width: 50px;"></i>Career Information</h3>
                            <button data-toggle='modal' data-target='#careerInfoPopUp' data-whatever='@getbootstrap'
                                type="submit" class="edit-btn"
                                style="padding: 0px 30px; margin: 0px 0px 0px auto;">Edit</button>
                        </div>
                        <div class="profile-body" id="special-body-uwu">
                            <div class="neatly-constructed-grid-rows">
                                <div class="neatly-put-grid-columns">
                                    <h2>Salary</h2>
                                    <p>5.000.000</p>
                                </div>
                                <div class="neatly-put-grid-columns">
                                    <h2>Job Type</h2>
                                    <p>Full time</p>
                                </div>
                                <div class="neatly-put-grid-columns">
                                    <h2>Industry</h2>
                                    <p>IT Software</p>
                                </div>
                                <div class="neatly-put-grid-columns">
                                    <h2>Work Location</h2>
                                    <p>Ho Chi Minh City</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- career info form -->
            <div class='modal fade' id='careerInfoPopUp' tabindex='-1' role='dialog'
                aria-labelledby='careerInfoPopUpForm' aria-hidden='true'>
                <div class='modal-dialog modal-dialog-centered' role='document'>
                    <form action='' method='post' style="width: 100%;">
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='careerInfoPopUpForm'>Career Info</h5>
                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                            <div class='modal-body'>
                                <form>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Salary:</label>
                                        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                            <option selected>Choose...</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Job Type:</label>
                                        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                            <option selected>Choose...</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Industry:</label>
                                        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                            <option selected>Choose...</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Work Location:</label>
                                        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                            <option selected>Choose...</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </form>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                    <button type='submit' class='btn btn-success' name='title'>Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- ==================================================================================================== -->


            <div class="recent-grid">
                <div class="customers">
                    <div class="card">
                        <div class="profile-header">
                            <h3><i class="fas fa-star" style="width: 50px;"></i>Work Experience</h3>
                            <button data-toggle='modal' data-target='#workExpPopUp' data-whatever='@getbootstrap'
                                type="submit" class="edit-btn"
                                style="padding: 0px 30px; margin: 0px 0px 0px auto;">Edit</button>
                        </div>
                        <div class="profile-body" id="special-body-uwu">
                            <div class="neatly-constructed-grid-rows">
                                <div class="neatly-put-grid-columns">
                                    <h2>Job Title/Position: </h2>
                                    <p>Developer</p>
                                </div>
                                <div class="neatly-put-grid-columns">
                                    <h2>Company: </h2>
                                    <p>ABC</p>
                                </div>
                                <div class="neatly-put-grid-columns">
                                    <h2>Years Of Experience</h2>
                                    <p>3 years</p>
                                </div>
                                <div class="neatly-put-grid-columns">
                                    <h2>Current Level</h2>
                                    <p>Staff</p>
                                </div>
                            </div>
                            <hr class="center-diamond">
                        </div>
                    </div>
                </div>
            </div>

            <!-- work experience form -->
            <div class='modal fade' id='workExpPopUp' tabindex='-1' role='dialog' aria-labelledby='workExpPopUpForm'
                aria-hidden='true'>
                <div class='modal-dialog modal-dialog-centered' role='document'>
                    <form action='' method='post' style="width: 100%;">
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='workExpPopUpForm'>Work Experience</h5>
                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                            <div class='modal-body'>
                                <form>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Job Title/Position:</label>
                                        <input style="margin-left: 0;" type="text" class="form-control"
                                            id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Company:</label>
                                        <input style="margin-left: 0;" type="text" class="form-control"
                                            id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Years of Experience:</label>
                                        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                            <option selected>Choose...</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Current Level:</label>
                                        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                            <option selected>Choose...</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </form>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                    <button type='submit' class='btn btn-success' name='title'>Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- ==================================================================================================== -->


            <div class="recent-grid">
                <div class="customers">
                    <div class="card">
                        <div class="profile-header">
                            <h3><i class="fas fa-graduation-cap" style="width: 50px;"></i>Education</h3>
                            <button data-toggle='modal' data-target='#eduPopUp' data-whatever='@getbootstrap'
                                type="submit" class="edit-btn"
                                style="padding: 0px 30px; margin: 0px 0px 0px auto;">Edit</button>
                        </div>
                        <div class="profile-body" id="special-body-uwu">
                            <div class="neatly-constructed-grid-rows">
                                <div class="neatly-put-grid-columns">
                                    <h2>School</h2>
                                    <p>Hogwarts School of Witchcraft and Wizardr</p>
                                </div>
                                <div class="neatly-put-grid-columns">
                                    <h2>Academic Year</h2>
                                    <p>2019-2023</p>
                                </div>
                                <hr class="center-diamond">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- education form -->
            <div class='modal fade' id='eduPopUp' tabindex='-1' role='dialog' aria-labelledby='eduPopUpForm'
                aria-hidden='true'>
                <div class='modal-dialog modal-dialog-centered' role='document'>
                    <form action='' method='post' style="width: 100%;">
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='eduPopUpForm'>Education</h5>
                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                            <div class='modal-body'>
                                <form>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">School:</label>
                                        <input style="margin-left: 0;" type="text" class="form-control"
                                            id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Academic Year (yyyy -
                                            yyyy):</label>
                                        <input style="margin-left: 0;" type="text" class="form-control"
                                            id="recipient-name">
                                    </div>
                                </form>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                    <button type='submit' class='btn btn-success' name='title'>Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- ==================================================================================================== -->


            <div class="recent-grid">
                <div class="customers">
                    <div class="card">
                        <div class="profile-header">
                            <h3><i class="fas fa-stamp" style="width: 50px;"></i>Certificates</h3>
                            <button data-toggle='modal' data-target='#certPopUp' data-whatever='@getbootstrap'
                                type="submit" class="edit-btn"
                                style="padding: 0px 30px; margin: 0px 0px 0px auto;">Edit</button>
                        </div>
                        <div class="profile-body" id="special-body-uwu">
                            <div class="neatly-constructed-grid-rows">
                                <div class="neatly-put-grid-columns">
                                    <h2>Certificate</h2>
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

            <!-- certificates form -->
            <div class='modal fade' id='certPopUp' tabindex='-1' role='dialog' aria-labelledby='certPopUpForm'
                aria-hidden='true'>
                <div class='modal-dialog modal-dialog-centered' role='document'>
                    <form action='' method='post' style="width: 100%;">
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='certPopUpForm'>Certificate</h5>
                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                            <div class='modal-body'>
                                <form>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Name of Certificate:</label>
                                        <input style="margin-left: 0;" type="text" class="form-control"
                                            id="recipient-name">
                                    </div>
                                    <div class='form-group'>
                                        <label for="recipient-name" class="col-form-label">Description:</label>
                                        <textarea class='form-control' id='title-text' name='title-content'></textarea>
                                    </div>
                                </form>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                    <button type='submit' class='btn btn-success' name='title'>Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- ==================================================================================================== -->



            <div class="recent-grid">
                <div class="customers">
                    <div class="card">
                        <div class="profile-header">
                            <h3><i class="fas fa-trophy" style="width: 50px;"></i>Achievements</h3>
                            <button data-toggle='modal' data-target='#achievementsPopUp' data-whatever='@getbootstrap'
                                type="submit" class="edit-btn"
                                style="padding: 0px 30px; margin: 0px 0px 0px auto;">Edit</button>
                        </div>
                        <div class="profile-body" id="special-body-uwu">
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

            <!-- achievements form -->
            <div class='modal fade' id='achievementsPopUp' tabindex='-1' role='dialog'
                aria-labelledby='achievementsPopUpForm' aria-hidden='true'>
                <div class='modal-dialog modal-dialog-centered' role='document'>
                    <form action='' method='post' style="width: 100%;">
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='achievementsPopUpForm'>Achievement</h5>
                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                            <div class='modal-body'>
                                <form>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Achievement:</label>
                                        <input style="margin-left: 0;" type="text" class="form-control"
                                            id="recipient-name">
                                    </div>
                                    <div class='form-group'>
                                        <label for="recipient-name" class="col-form-label">Description:</label>
                                        <textarea class='form-control' id='title-text' name='title-content'></textarea>
                                    </div>
                                </form>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                    <button type='submit' class='btn btn-success' name='title'>Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- ==================================================================================================== -->



            <div class="recent-grid">
                <div class="customers">
                    <div class="card">
                        <div class="profile-header">
                            <h3><i class="fas fa-air-freshener" style="width: 50px;"></i>Activities</h3>
                            <button data-toggle='modal' data-target='#actPopUp' data-whatever='@getbootstrap'
                                type="submit" class="edit-btn"
                                style="padding: 0px 30px; margin: 0px 0px 0px auto;">Edit</button>
                        </div>
                        <div class="profile-body" id="special-body-uwu">
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

            <!-- activities form -->
            <div class='modal fade' id='actPopUp' tabindex='-1' role='dialog' aria-labelledby='actPopUpForm'
                aria-hidden='true'>
                <div class='modal-dialog modal-dialog-centered' role='document'>
                    <form action='' method='post' style="width: 100%;">
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='actPopUpForm'>Activity</h5>
                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                            <div class='modal-body'>
                                <form>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Activity:</label>
                                        <input style="margin-left: 0;" type="text" class="form-control"
                                            id="recipient-name">
                                    </div>
                                    <div class='form-group'>
                                        <label for="recipient-name" class="col-form-label">Description:</label>
                                        <textarea class='form-control' id='title-text' name='title-content'></textarea>
                                    </div>
                                </form>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                    <button type='submit' class='btn btn-success' name='title'>Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
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