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
        // Get enough things for the form
        $marriagestatus = $model->getMarriageStatus();
        $salary = $model->getSalary();
        $type = $model->getType();
        $industry = $model->getIndustry();
        $location = $model->getLocation();

        $level = $model->getLevel();
        $experience = $model->getExperience();

        // Print out the resume
        $personalInfo = $model->getResumePersonalInfo($userid);
        $title = $model->getResumeTitle($userid);
        $goals = $model->getResumeGoals($userid);
        $desiredCareer = $model->getResumeCareer($userid);

        $workExperience = $model->getResumeWorkExperience($userid);
        $education = $model->getResumeEducation($userid);
        $certificate = $model->getResumeCertificate($userid);
        $achievement = $model->getResumeAchievement($userid);
        $activity = $model->getResumeActivity($userid);

        // Form handler
        $avatar = $model->uploadAvatar($userid);

        $resumeid = $model->getResumeID($userid);

        if ($resumeid != false) {

            $updatePersonalInfo = $model->updateResumePersonalInfo($resumeid);
            $updateTitle = $model->updateResumeTitle($resumeid);
            $updateObjective = $model->updateResumeObjective($resumeid);
            $updateCareer = $model->updateResumeCareer($resumeid);

            $checkWorkExperience = $model->checkWorkExperience;
            if($checkWorkExperience != false){

                $updateWorkExperience = $model->updateResumeWorkExperience($resumeid);

            }else{

                $createWorkExperience = $model->insertResumeWorkExperience($resumeid);

            }

            $checkEducation = $model->checkEducation;
            if($checkEducation != false){

                $updateEducation = $model->updateResumeEducation($resumeid);
            
            }else{

                $createEducation = $model->insertResumeEducation($resumeid);

            }

            $checkCertificate = $model->checkCertificate;
            if($checkCertificate != false){

                $updateCertificate = $model->updateResumeCertificate($resumeid);

            }else{

                $insertCertificate = $model->insertResumeCertificate($resumeid);

            }

            $checkAchievement = $model->checkAchievement;
            if($checkAchievement != false){

                $updateAchievement = $model->updateResumeAchievement($resumeid);

            }else{

                $insertAchievement = $model->insertResumeAchievement($resumeid);

            }

            $checkActivity = $model->checkActivity;
            if($checkActivity != false){

                $updateActivity = $model->updateResumeActivity($resumeid);

            }else{

                $insertActivity = $model->insertResumeActivity($resumeid);

            }

        }else{

            $createResume = $model->insertResumePersonalInfo($userid); // PersonalInfo = create resume
            $resumeAvailability = $model->checkResumeAvailability();

        }

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
                    <a href="index.php" class="active"><span><i class="fa fa-home" aria-hidden="true"></i></span>
                        <span>Home</span></a>
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

            <!-- RESUME PROFILE -->

            <?php renderResumeProfile($jobseeker, $personalInfo, $title, $desiredCareer); ?>

            <!-- image form -->
            <div class='modal fade' id='imagePopUp' tabindex='-1' role='dialog' aria-labelledby='imagePopUpForm'
                aria-hidden='true'>
                <div class='modal-dialog' role='document'>
                    <form action='' method='post' enctype="multipart/form-data">
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
                                    <input type="submit" name="avatar">
                                </form>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- ==================================================================================================== -->

            <!-- RESUME PERSONAL INFO -->

            <?php renderResumePersonalInfo($personalInfo); ?>

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
                                            id="recipient-name" name="firstName">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Last Name:</label>
                                        <input style="margin-left: 0;" type="text" class="form-control"
                                            id="recipient-name" name="lastName">
                                    </div>

                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Nationality:</label>
                                        <input style="margin-left: 0;" type="text" class="form-control"
                                            id="recipient-name" name="nationality">
                                    </div>

                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Marital Status:</label>
                                        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref"
                                            name="marriage">
                                            <option selected value="0">Choose...</option>
                                            <?php foreach($marriagestatus as $mr): ?>

                                            <option value="<?php echo $mr['id'];?>"><?php echo $mr['status'];?></option>

                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </form>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                    <button type='submit' class='btn btn-success' name='personalinfo'>Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- ==================================================================================================== -->

            <!-- RESUME TITLE -->

            <?php renderResumeTitle($title); ?>

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

            <!-- RESUME CAREER OBJECTIVE -->

            <?php renderResumeCareerObjective($goals); ?>

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
                                        <textarea class='form-control' id='title-text'
                                            name='objective-content'></textarea>
                                    </div>
                                </form>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                    <button type='submit' class='btn btn-success' name='objective'>Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- ==================================================================================================== -->

            <!-- RESUME DESIRED CAREER -->

            <?php renderResumeDesiredCareer($desiredCareer); ?>

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
                                        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref"
                                            name="salary">
                                            <option selected value="0">Choose...</option>
                                            <?php foreach($salary as $s): ?>

                                            <option value="<?php echo $s['id'];?>"><?php echo $s['salary']; ?></option>

                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Job Type:</label>
                                        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref"
                                            name="type">
                                            <option selected value="0">Choose...</option>

                                            <?php foreach($type as $t): ?>

                                            <option value="<?php echo $t['id'];?>"><?php echo $t['type']; ?></option>

                                            <?php endforeach; ?>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Industry:</label>
                                        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref"
                                            name="industry">
                                            <option selected value="0">Choose...</option>

                                            <?php foreach($industry as $i): ?>

                                            <option value="<?php echo $i['id'];?>"><?php echo $i['industry']; ?>
                                            </option>

                                            <?php endforeach; ?>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Work Location:</label>
                                        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref"
                                            name="location">

                                            <option selected value="0">Choose...</option>
                                            <?php foreach($location as $lo): ?>

                                            <option value="<?php echo $lo['id'];?>"><?php echo $lo['location']; ?>
                                            </option>

                                            <?php endforeach; ?>

                                        </select>
                                    </div>
                                </form>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                    <button type='submit' class='btn btn-success' name='career'>Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- ==================================================================================================== -->

            <!-- RESUME WORK EXPERIENCE -->

            <?php renderResumeWorkExperience($workExperience); ?>

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
                                            id="recipient-name" name="workTitle">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Company:</label>
                                        <input style="margin-left: 0;" type="text" class="form-control"
                                            id="recipient-name" name="workCompany">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Years of Experience:</label>
                                        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref"
                                            name="workYear">
                                            <option selected value="0">Choose...</option>

                                            <?php foreach($experience as $e): ?>

                                            <option value="<?php echo $e['id']; ?>"> <?php echo $e['experienceyear']; ?>
                                            </option>

                                            <?php endforeach; ?>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Current Level:</label>
                                        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref"
                                            name="workLevel">
                                            <option selected value="0">Choose...</option>

                                            <?php foreach($level as $l): ?>

                                            <option value="<?php echo $l['id']; ?>"><?php echo $l['level']; ?></option>

                                            <?php endforeach; ?>

                                        </select>
                                    </div>
                                </form>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                    <button type='submit' class='btn btn-success' name='workExperience'>Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- ==================================================================================================== -->

            <!-- RESUME EDUCATION -->

            <?php renderResumeEducation($education); ?>

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
                                            id="recipient-name" name="educationSchool">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Academic Year (yyyy -
                                            yyyy):</label>
                                        <input style="margin-left: 0;" type="text" class="form-control"
                                            id="recipient-name" name="educationYear">
                                    </div>
                                </form>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                    <button type='submit' class='btn btn-success' name='education'>Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- ==================================================================================================== -->

            <!-- RESUME CERTIFICATES -->

            <?php renderResumeCertificate($certificate); ?>

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
                                            id="recipient-name" name="certificateName">
                                    </div>
                                    <div class='form-group'>
                                        <label for="recipient-name" class="col-form-label">Description:</label>
                                        <textarea class='form-control' id='title-text'
                                            name='certificateDescription'></textarea>
                                    </div>
                                </form>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                    <button type='submit' class='btn btn-success' name='certificate'>Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- ==================================================================================================== -->

            <!-- RESUME ACHIEVEMENTS -->

            <?php renderResumeAchievement($achievement); ?>

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
                                            id="recipient-name" name="achievementName">
                                    </div>
                                    <div class='form-group'>
                                        <label for="recipient-name" class="col-form-label">Description:</label>
                                        <textarea class='form-control' id='title-text'
                                            name='achievementDescription'></textarea>
                                    </div>
                                </form>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                    <button type='submit' class='btn btn-success' name='achievement'>Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- ==================================================================================================== -->

            <!-- RESUME ACTIVITES -->

            <?php renderResumeActivity($activity); ?>

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
                                            id="recipient-name" name="activityName">
                                    </div>
                                    <div class='form-group'>
                                        <label for="recipient-name" class="col-form-label">Description:</label>
                                        <textarea class='form-control' id='title-text'
                                            name='activityDescription'></textarea>
                                    </div>
                                </form>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                    <button type='submit' class='btn btn-success' name='activity'>Submit</button>
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