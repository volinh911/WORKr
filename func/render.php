<?php

// ------------------------------------- RENDER HEADER ------------------------------------- //

    function renderHeader($role, $jobseeker, $employer){

        switch($role){

            case '1': //Admin dashboard
                echo "        
                <header>
                    <h2>
                        <label for='nav-toggle'>
                            <span><i class='fas fa-bars text-white'></i></span>
                        </label>
                    </h2>
                    <div class='user-wrapper'>
                        <img src='/images/Avatar.png' width='40px' height='40px' alt=''>
                        <div>
                            <h6 class='text-white'>Admin({$jobseeker['email']})</h6>
                        </div>
                    </div>
                </header>";

                break;

            case '2': //Jobseeker dashboard
                if ($jobseeker['avatar'] != null) {

                    echo "
                <header>
                    <h2>
                        <label for='nav-toggle'>
                            <span><i class='fas fa-bars text-white'></i></span>
                        </label>
                    </h2>
                    <div class='user-wrapper'>
                        <img src='{$jobseeker['avatar']}' width='40px' height='40px' alt=''>
                        <div>
                            <h6 class='text-white'>{$jobseeker['username']}</h6>
                        </div>
                    </div>
                </header>";

                }else{

                    echo "
                <header>
                    <h2>
                        <label for='nav-toggle'>
                            <span><i class='fas fa-bars text-white'></i></span>
                        </label>
                    </h2>
                    <div class='user-wrapper'>
                        <img src='/images/Avatar.png' width='40px' height='40px' alt=''>
                        <div>
                            <h6 class='text-white'>{$jobseeker['username']}</h6>
                        </div>
                    </div>
                </header>";

                }

                break;

            case '3': // Employer dashboard
                echo "
                <header>
                    <h2>
                        <label for='nav-toggle'>
                            <span><i class='fas fa-bars text-white'></i></span>
                        </label>
                    </h2>
                    <div class='user-wrapper'>
                        <img src='/images/Avatar.png' width='40px' height='40px' alt=''>
                        <li class='nav-item dropdown'>
                            <a style='font-size: 1.2rem;' class='nav-link dropdown-toggle text-white font-weight-bolder'
                                href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true'
                                aria-expanded='false'>
                                Employer({$employer['email']})
                            </a>
                            <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                                <a class='dropdown-item' href='find_resume.php'>Search Resumes</a>
                            </div>
                        </li>
                    </div>
                </header>";

                break;

            default:
                echo "not loggedin";
        }

    }

// ------------------------------------- END RENDER HEADER ------------------------------------- //

// ------------------------------------- RENDER BLOGS ------------------------------------- //

    function renderMoreBlog($blog,$smallText) {

        echo "
        <div class='col-lg-4 col-md-6'>
            <div class='card border rounded-2 shadow advice h-100 mt-4' style='width: 20rem;'>

                <img src={$blog['image']} class='card-img-top' alt=''    >

                <div class='card-body'>

                    <h5 class='card-title font-weight-bolder' style='height: 3.5rem; font-size: 1rem;'> {$blog['title']} </h5>

                    <p class='card-text'> {$blog['authorname']} |
                        <small> {$blog['datecreated']} </small>
                    </p>

                    <p>$smallText ... </p>

                    <a href='blogdetail.php?id={$blog['id']}'>
                        <small class='float-right'><i class='fa fa-arrow-right' aria-hidden='true'></i> Read More</small></a>
                            
                </div>
            </div>
        </div>";

    }

    function renderBlogDetail($blog){

        echo "
            <div class='container mt-5 '>
                <h2 class='text-center'> {$blog['title']} </h2>
                <p class='mt-4 mb-4'>By {$blog['authorname']} on {$blog['datecreated']} </p>
                <div class='picture'>
                    <img class='d-block mx-auto img-fluid' src={$blog['image']} alt=''>
                </div>
                <div class='blog-content mt-5'>
                    <p> {$blog['content']} </p>
                </div>
            </div>";

    }

    function renderBlogList($blog, $smallText){

        echo "
        <div class='col-lg-4 col-md-6 pt-4'>
            <div class='card border rounded-2 shadow advice h-100' style='width: 25rem;'>

                <img src={$blog['image']} class='card-img-top' alt='    '>

                <div class='card-body'>

                    <h5 class='card-title font-weight-bolder' style='height: 3rem; font-size: 1.3rem;'> {$blog['title']} </h5>

                    <p class='card-text'> {$blog['authorname']} |
                        <small> {$blog['datecreated']} </small>
                    </p>

                    <p>$smallText ... </p>

                    <a href='blogdetail.php?id={$blog['id']}'>
                        <small class='float-right'><i class='fa fa-arrow-right' aria-hidden='true'></i> Read More</small></a>
                        
                </div>
            </div>
        </div>";

    }

// ------------------------------------- END RENDER BLOGS ------------------------------------- //

// ------------------------------------- RENDER ADMIN DASHBOARD ------------------------------------- //

    function renderBlogListAdmin($blog){

        echo"
        <tr>
        <td>{$blog['id']}</td>
        <td>{$blog['title']}</td>
        <td>{$blog['userid']}</td>
        <td>{$blog['datecreated']}</td>
        <td><a href='./admin_dashboard_delete.php?id={$blog['id']}' class='delete'>Delete</a></td>
        <td><a href='./admin_dashboard_edit.php?id={$blog['id']}' class='edit'>Edit</a></td>
        </tr>";

    }

    function renderEditBlogAdmin($blog){

        echo "                               
            <form action='' method='POST' enctype='multipart/form-data'>

            <!-- Input TITLE -->
            <div>
                <label for='title'>Title</label><br>
                <input type='text' name='title' id='' class='text-input' value = '{$blog['title']}'><br>
            </div>

            <!-- Input AUTHOR -->
            <div>
                <label for='author'>Author</label><br>
                <input type='text' name='author' id='' class='text-input' value = '{$blog['authorname']}'><br>
            </div>

            <!-- Input BODY -->
            <div>
                <label for='body'>Body</label>
                <textarea name='body' id='body' class='text-input'>{$blog['content']}</textarea>
            </div>

            <!-- Input IMAGE -->
            <div>
                <label for='Image'>Image</label><br>
                <input type='file' name='image' class='text-input'>
            </div>

            <button type='submit' name='update'> Update Blog</button>
        </form>";

    }

    function renderReviewsListAdmin($review){

        echo "                                        
        <tr>
        <td>{$review['id']}</td>
        <td>{$review['content']}</td>
        <td>{$review['companyname']}</td>
        <td>{$review['datecreated']}</td>
        <td><a href='./admin_dashboard.reviews_del.php?id={$review['id']}' class='delete'>Delete</a></td>
        <td><a href='./comp_review_details.php?id={$review['companyid']}' class='text-primary'>View</a></td>
        </tr>";

    }

// ------------------------------------- END RENDER ADMIN DASHBOARD ------------------------------------- //

// ------------------------------------- RENDER JOBLIST AND JOBDETAIL ------------------------------------- //

    function renderJobList($job, $favoriteJob){

        $favorite = '';

        // var_dump($favoriteJob[0]['jobid']);
        foreach ($favoriteJob as $favojob) {

            if($favojob['jobid'] == $job['jobid']){
                $favorite .= "<p class='text-success'> Favorited </p>";
            }else{
                $favorite .= "";
            }

        }

        echo "
        <hr>
        <div class='row'>
            <div class='col-md-12'>
                <div class='jobs d-flex align-items-center mt-3 mb-3'>
                    <div class='card' style='width: 170px;'>
                        <img src=' {$job['logo']} ' class='card-img-top' style='height: 150px; width: 100%; object-fit: cover;' alt='...'>
                    </div>

                        <div class='card_content w-100 ml-3 d-flex justify-content-between align-items-end'>
                            <div class='job_info'>

                                <a href='job_details.php?id={$job['jobid']}'>

                                <h5 class='text-danger' style='margin-left: 12px;'> {$job['title']} </h5> 

                                </a>

                                    <h6 style='margin-left: 12px;'> {$job['companyname']} </h6>
                                    <h6 class=' text-warning' style='margin-left: 12px;'><span><i class='fas fa-dollar-sign'></i></span>
                                        {$job['salary']} </h6>
                                    <h6 style='margin-left: 12px;'><i class='fas fa-map-marker-alt'></i> {$job['location']} </h6>
                                    <div class='treatment'>
                                        <ul class='d-flex'>
                                            <li><i class='fas fa-medkit'></i> Health Insurance</li>
                                            <li><i class='fas fa-star-of-life'></i> Medical Services</li>
                                        </ul>
                                    </div>

                            </div>

                            <div class='details'>
                                {$favorite}
                                <p><i class='far fa-calendar-minus mr-2'></i> {$job['enddate']} </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        ";

    }

    function renderJobDetail($job, $company, $favoriteJob, $favoriteCompany){

        $appfavo = "";
        if($favoriteJob == true){

            $appfavo .= "<button type='submit' class='btn btn-danger text-white  mt-2' name='apply'><a style='color: white;' href ='{$job['website']}'>Apply</a></button>
                        <button type='submit' class='btn btn-outline-danger love-btn mt-2' name='favorite'><i
                            class='far fa-heart' aria-hidden='true'></i> Add to favorite list</button>";

        }else {

            $appfavo .="<button type='submit' class='btn btn-danger text-white mt-2' name='apply'><a style='color: white;' href ='{$job['website']}'>Apply</a></button>
                        <button type='submit' class='btn btn-outline-success love-btn mt-2' name='favorite'><i
                            class='far fa-heart' aria-hidden='true'></i> Favorited </button>";

        }

        $companyfavo = "";
        if($favoriteCompany == true){

            $companyfavo .= "<button type='submit' class='btn btn-outline-danger love-btn mb-3' name = 'favoritecompany'><i class='far fa-heart' aria-hidden='true'></i> Add to favorite list </button>";

        }else{

            $companyfavo .= "<button type='submit' class='btn btn-outline-success love-btn mb-3' name = 'favoritecompany'><i class='far fa-heart' aria-hidden='true'></i> Favorited </button>";

        }

        echo"
        <div class='tab-content' id='nav-tabContent'>
            <div class='tab-pane fade show active' id='job-detail' role='tabpanel'>
                <!-- Job title -->
                <div class='container mt-3'>
                    <div class='row'>
                        <div class='col'>
                            <div class='jobs d-flex align-items-center mt-3 mb-3'>
                                <div class='card' style='width:150px;'>
                                    <img src='{$job['logo']}' class='card-img-top' style='height: 150px; width: 100%; object-fit: cover;' alt='...'>
                                </div>
                                <div class='card_content w-100 ml-3 d-flex justify-content-between align-items-end'>
                                    <div class='job_info'>
                                        <h3 class='text-danger'> {$job['title']} </h3>
                                        <h6> {$job['companyname']} </h6>
                                        <h6 class=' text-success'><span><i class='fas fa-dollar-sign'></i></span>
                                            {$job['salary']} </h6>
                                        <h6><i class='fas fa-map-marker-alt'></i> {$job['location']} </h6>
                                    </div>
                                    <div class='details'>
                                        <form action='' method='post'>
                                            {$appfavo}
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class='container  mt-4'>
                    <div class='row'>
                        <div class='col-md-8'>
                            <div class='job-description '>
                                <h3>Description</h3>
                                <p> {$job['description']} </p>
                            </div>
                            <div class='job-requirement'>
                                <h3>Requirement</h3>
                                <p> {$job['requirements']} </p>
                            </div>
                        </div>
                        <div class='col-md-4 '>
                            <div class='summary offset-2 mt-3 '>
                                <div class='card rounded-0' style='width: 18rem;'>
                                    <ul class='list-group list-group-flush'>
                                        <li class='list-group-item'>
                                            <i class='fa fa-calendar mr-2' aria-hidden='true'></i>
                                            {$job['enddate']}
                                        </li>
                                        <li class='list-group-item'>
                                            <i class='fas fa-layer-group mr-2'></i> {$job['level']}
                                        </li>
                                        <li class='list-group-item'>
                                            <i class='fas fa-briefcase mr-2'></i> {$job['industry']}
                                        </li>
                                        <li class='list-group-item'>
                                            <i class='fas fa-flag mr-2'></i> {$job['experienceyear']}
                                            year(s) of experience
                                        </li>
                                        <li class='list-group-item'>
                                            <i class='fas fa-language mr-2'></i> {$job['type']}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class='tab-pane fade' id='company'>
                <div class='container mt-3'>
                    <div class='row'>
                        <div class='col-md-12 '>
                            <div class='jobs d-flex align-items-center mt-3 mb-3'>
                                <div class='card' style='width:150px;'>
                                    <img src='{$job['logo']}' class='card-img-top' style='height: 150px; width: 100%; object-fit: cover;' alt='...'>
                                </div>
                                <div class='card_content w-100 ml-3 d-flex justify-content-between align-items-end'>
                                    <div class='job_info'>
                                        <h3 class='text-danger'>{$company['companyname']}</h3>
                                        <h6>Location: <i class='fas fa-map-marker-alt text-black-50'></i> {$company['address']} </h6>
                                        <ul class='d-flex'>
                                            <li class='mr-3'><i class='fa fa-users' aria-hidden='true'></i> Company size: {$company['size']} </li>
                                            <li class='mr-3'><i class='fa fa-users' aria-hidden='true'></i> Company size: {$company['applyemail']} </li>
                                            <li><i class='fas fa-gamepad'></i> {$company['website']} </li>
                                        </ul>
                                    </div>
                                </div>
                                </div>  
                                    <div class='details float-right'>
                                        <form action='' method='post'>
                                            {$companyfavo}
                                        </form>
                                    </div>      
                                </div>
                            </div>
                        </div>
                        <div class='treatment'>
                            <h6 class='text-bold'>{$company['companydescription']} </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>";
    }

    function renderListResume($resumes){

        $avatar = '';
        $fullname = '';
        $title = '';
        $location = '';
        $salary = '';
        if($resumes != false){
            
            if($resumes['avatar'] != NULL){

                $avatar .= $resumes['avatar'];

            }else{

                $avatar = "./images/Avatar.png";

            }

            if($resumes['firstname'] != NULL && $resumes['lastname'] != NULL){

                $fullname .= $resumes['firstname'] . ' ' . $resumes['lastname'];

            }else{

                $fullname = "Not updated";

            }

            if($resumes['title'] != NULL){

                $title .= $resumes['title'];

            }else{

                $title = "Not updated";

            }

            if($resumes['location'] != NULL){

                $location .= $resumes['location'];

            }else{

                $location = "Not updated";

            }

            if($resumes['salary'] != NULL){

                $salary .= $resumes['salary'];

            }else{

                $salary = "Not updated";

            }

        }else{

            echo "<h1> Page not available </h1>";

        }


        echo "
            <div class='resume-detail row'>
                <div class='resume-avt col-lg-3 p-2'>
                    <img src='$avatar' alt='' style='height: 150px; width: 150px;'>
                </div>
                <div class='resume-brief col-lg-9 pl-4 py-2'>
                    <span class='resume-name'>$fullname</span>
                    <div class='resume-title'>$title</div>
                    <div class='resume-exp'>
                        <span>$location</span>
                        <span class='exp-years'></span>
                        <!--can adjust for input here-->
                    </div>
                    <div class='resume-locat'>
                        $salary
                    </div>
                    <hr>
                    <div class='resume-option'>
                        <a href='cv_detail.php?id={$resumes['id']}' class='resume-view'>View more... <i class='fa fa-chevron-right'></i></a>
                        <!--btn to view resume detail-->
                    </div>
                </div>
            </div>
        <hr>";

    }

    // RENDER RESUME DETAIL

        function renderResumeDetailProfile($jobseeker, $personalInfo, $title, $goals, $favoriteResume){

            $favorite = '';
            if($favoriteResume == true){

                $favorite .= "<button type='submit' name='favorite' class='btn'>Favorite CV</button>";

            }else{

                $favorite .= "<button type='submit' name='favorite' class='btn'>Favorited</button>";

            }
            
            $avatar = '';
            if ($jobseeker != false) {

                if ($jobseeker['avatar'] != null) {

                    $avatar .= $jobseeker['avatar'];

                } else {

                    $avatar = './images/Avatar.png';

                }

            }else{

                $avatar = './images/Avatar.png';

            }

            $fullname = '';
            if($personalInfo != false){

                if($personalInfo != NULL){

                    $fullname .= $personalInfo['firstname'] . ' ' . $personalInfo['lastname'];

                }else{

                    $fullname = 'Your full name here';

                }

            }else{

                $fullname = 'Your full name here';

            }

            $resumeTitle = '';
            if ($title !=false) {

                if ($title['title'] != null) {

                    $resumeTitle .= $title['title'];

                } else {

                    $resumeTitle = 'Your Resume Title Here';

                }

            } else {

                $resumeTitle = 'Your Resume Title Here';

            }

            $resumeGoals = '';

            if ($goals != false) {

                $resumeGoals .= $goals['careergoals'];

            }else{

                $resumeGoals = "Not updated";

            }

            echo "
                <div class='container grid-2'>
                    <div class='column-1'>
                        <h1 class='header-title'>$fullname</h1>
                        <p class='text text'>$resumeTitle</p>
                        <p class='text goals'>$resumeGoals</p>
                        <form action='' method='post'>
                            $favorite
                        </form>
                    </div>

                    <div class='column-2 image'>
                        <img style='width: 100%;' src='./img/shapes/points2.png' class='points points2' alt='' />
                        <img style='width: 100%;' src='$avatar' class='img-element z-index'
                            alt='' />
                    </div>
                </div>";

        }

        function renderResumeDetailPersonalInfo($personalInfo){

            $firstName = '';
            $lastName = '';
            $nationality = '';
            $maritalStatus = '';

            if($personalInfo != false){

                if($personalInfo['firstname'] != NULL){

                    $firstName .= $personalInfo['firstname'];

                }else{

                    $firstName = "Not updated";

                }

                if($personalInfo['lastname'] != NULL){

                    $lastName .= $personalInfo['lastname'];

                }else{

                    $lastName = "Not updated";

                }

                if($personalInfo['nationality'] != NULL){

                    $nationality .= $personalInfo['nationality'];

                }else{

                    $nationality = "Not updated";

                }

                if($personalInfo['status'] != NULL){

                    $maritalStatus .= $personalInfo['status'];

                }else{

                    $maritalStatus = "Not updated";

                }

            }else{

                $firstName = "Not updated";
                $lastName = "Not updated";
                $nationality = "Not updated";
                $maritalStatus = "Not updated";

            }

            echo "
                <div class='recent-grid container'>
                    <div class='customers'>
                        <div class='card'>
                            <div class='profile-body' id='special-body-uwu'>
                                <div class='neatly-constructed-grid-rows'>
                                    <div class='neatly-put-grid-columns'>
                                        <h2>First Name</h2>
                                        <p>$firstName</p>
                                    </div>
                                    <div class='neatly-put-grid-columns'>
                                        <h2>Last Name</h2>
                                        <p>$lastName</p>
                                    </div>

                                    <div class='neatly-put-grid-columns'>
                                        <h2>Nationality</h2>
                                        <p>$nationality</p>
                                    </div>
                                    <div class='neatly-put-grid-columns'>
                                        <h2>Martial Status</h2>
                                        <p>$maritalStatus</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>";

        }

        function renderResumeDetailDesiredCareer($desiredCareer){

            $salary = '';
            $type = '';
            $industry = '';
            $location = '';

            if($desiredCareer != false){

                if ($desiredCareer['salary'] != NULL){

                    $salary .= $desiredCareer['salary'];

                }else{

                    $salary = "Not updated";

                }

                if ($desiredCareer['type'] != NULL){

                    $type .= $desiredCareer['type'];

                }else{

                    $type = "Not updated";

                }

                if($desiredCareer['industry'] != NULL){

                    $industry .= $desiredCareer['industry'];

                }else{

                    $industry = "Not updated";

                }

                if($desiredCareer['location'] != NULL){

                    $location .= $desiredCareer['location'];

                }else{

                    $location = "Not updated";

                }

            }else{

                $salary = "Not updated";
                $type = "Not updated";
                $industry = "Not updated";
                $location = "Not updated";

            }

            echo "
                <div class='recent-grid container'>
                    <div class='customers'>
                        <div class='card'>
                            <div class='profile-body' id='special-body-uwu'>
                                <div class='neatly-constructed-grid-rows'>
                                    <div class='neatly-put-grid-columns'>
                                        <h2>Salary</h2>
                                        <p>$salary</p>
                                    </div>
                                    <div class='neatly-put-grid-columns'>
                                        <h2>Job Type</h2>
                                        <p>$type</p>
                                    </div>
                                    <div class='neatly-put-grid-columns'>
                                        <h2>Industry</h2>
                                        <p>$industry</p>
                                    </div>
                                    <div class='neatly-put-grid-columns'>
                                        <h2>Work Location</h2>
                                        <p>$location</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>";

        }

        function renderResumeDetailWorkExperience($workExperience){

            $jobtitle = '';
            $company = '';
            $experienceYear = '';
            $level = '';

            if($workExperience != false){

                if($workExperience['title'] != NULL){

                    $jobtitle .= $workExperience['title'];

                }else{

                    $jobtitle = "Not updated";

                }

                if($workExperience['companyname'] != NULL){

                    $company .= $workExperience['companyname'];

                }else{

                    $company = "Not updated";

                }

                if($workExperience['experienceyear'] != NULL){

                    $experienceYear .= $workExperience['experienceyear'];

                }else{

                    $experienceYear = "Not updated";

                }

                if($workExperience['level'] != NULL){

                    $level .= $workExperience['level'];

                }else{

                    $level = "Not updated";

                }

            }else{

                $jobtitle = "Not updated";
                $company = "Not updated";
                $experienceYear = "Not updated";
                $level = "Not updated";

            }

            echo "
                <div class='recent-grid container'>
                    <div class='customers'>
                        <div class='card'>
                            <div class='profile-body' id='special-body-uwu'>
                                <div class='neatly-constructed-grid-rows'>
                                    <div class='neatly-put-grid-columns'>
                                        <h2>Job Title/Position: </h2>
                                        <p>$jobtitle</p>
                                    </div>
                                    <div class='neatly-put-grid-columns'>
                                        <h2>Company: </h2>
                                        <p>$company</p>
                                    </div>
                                    <div class='neatly-put-grid-columns'>
                                        <h2>Years Of Experience</h2>
                                        <p>$experienceYear year(s)</p>
                                    </div>
                                    <div class='neatly-put-grid-columns'>
                                        <h2>Current Level</h2>
                                        <p>$level</p>
                                    </div>
                                </div>
                                <hr class='center-diamond'>
                            </div>
                        </div>
                    </div>
                </div>";
        }

        function renderResumeDetailEducation($education){

            $schoolName = '';
            $academicYear = '';

            if($education != false){

            if($education['schoolname'] != NULL){

                $schoolName .= $education['schoolname'];

            }else{
                
                $schoolName = "Not updated";

            }

            if($education['academicyear'] != NULL){

                    $academicYear .= $education['academicyear'];

            }else{

                    $academicYear = "Not updated";

            }

            }else{

                $schoolName = "Not updated";
                $academicYear = "Not updated";

            }

            echo "
                <div class='recent-grid container'>
                    <div class='customers'>
                        <div class='card'>
                            <div class='profile-body' id='special-body-uwu'>
                                <div class='neatly-constructed-grid-rows'>
                                    <div class='neatly-put-grid-columns'>
                                        <h2>School</h2>
                                        <p>$schoolName</p>
                                    </div>
                                    <div class='neatly-put-grid-columns'>
                                        <h2>Academic Year</h2>
                                        <p>$academicYear</p>
                                    </div>
                                    <hr class='center-diamond'>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>";

        }

        function renderResumeDetailCertificate($certificate){

            $name = '';
            $description = '';

            if($certificate != false){

                if($certificate['name'] != NULL){

                    $name .= $certificate['name'];

                }else{

                    $name = "Not updated";

                }

                if($certificate['description'] != NULL){

                    $description .= $certificate['description'];

                }else{

                    $description = "Not updated";

                }

            }else{

                $name = "Not updated";
                $description = "Not updated";

            }

            echo "
                <div class='recent-grid container'>
                    <div class='customers'>
                        <div class='card'>
                            <div class='profile-body' id='special-body-uwu'>
                                <div class='neatly-constructed-grid-rows'>
                                    <div class='neatly-put-grid-columns'>
                                        <h2>Degree</h2>
                                        <p>$name</p>
                                    </div>
                                    <div class='neatly-put-grid-columns'>
                                        <h2>Description</h2>
                                        <p>$description</p>
                                    </div>
                                    <hr class='center-diamond'>
                                    <!-- cái hr là trong trường hợp còn thêm chứng chỉ -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>";

        }

        function renderResumeDetailAchievement($achievement){

            $name = '';
            $description = '';

            if($achievement != false){

                if($achievement['name'] != NULL){

                    $name .= $achievement['name'];

                }else{

                    $name = "Not updated";

                }

                if($achievement['description'] != NULL){

                    $description .= $achievement['description'];

                }else{

                    $description = "Not updated";

                }

            }else{

                $name = "Not updated";
                $description = "Not updated";

            }

            echo "
                <div class='recent-grid container'>
                    <div class='customers'>
                        <div class='card'>
                        </div>
                        <div class='profile-body' id='special-body-uwu'>
                            <div class='neatly-constructed-grid-rows'>
                                <div class='neatly-put-grid-columns'>
                                    <h2>Achievement</h2>
                                    <p>$name</p>
                                </div>
                                <div class='neatly-put-grid-columns'>
                                    <h2>Description</h2>
                                    <p>$description</p>
                                </div>
                                <hr class='center-diamond'>
                                <!-- cái hr là trong trường hợp còn thêm achievements -->
                            </div>
                        </div>
                    </div>
                </div>";

        }

        function renderResumeDetailActivity($activity){

            $name = '';
            $description = '';

            if($activity != false){

                if($activity['name'] != NULL){

                    $name .= $activity['name'];

                }else{

                    $name = "Not updated";

                }

                if($activity['description'] != NULL){

                    $description .= $activity['description'];

                }else{

                    $description = "Not updated";

                }

            }else{

                $name = "Not updated";
                $description = "Not updated";

            }

            echo "
                <div class='recent-grid container'>
                    <div class='customers'>
                        <div class='card'>
                        </div>
                        <div class='profile-body' id='special-body-uwu'>
                            <div class='neatly-constructed-grid-rows'>
                                <div class='neatly-put-grid-columns'>
                                    <h2>Activity</h2>
                                    <p>$name</p>
                                </div>
                                <div class='neatly-put-grid-columns'>
                                    <h2>Description</h2>
                                    <p>$description</p>
                                </div>
                                <hr class='center-diamond'>
                                <!-- cái hr là trong trường hợp còn thêm activities -->
                            </div>
                        </div>
                    </div>
                </div>";

        }

    // END RENDER RESUME DETAIL

// ------------------------------------- END RENDER JOBLIST AND JOBDETAIL ------------------------------------- //

// ------------------------------------- RENDER EMPLOYER DASHBOARD ------------------------------------- //

    function renderEmployerJoblist($job){
        echo "
            <tr>

            <td> {$job['title']} </td>
            <td> {$job['startdate']} </td>
            <td> {$job['enddate']} </td>

            <td>
                <a href='./job_details.php?id={$job['jobid']}' class='option success mr-2'>View</a>
                <a href='./employer_JM_delete.php?id={$job['jobid']}' class='option warning'>Delete</a>
            </td>

        </tr>";
    }

    function renderEmployerFavoriteResume($resume){

        if($resume != NULL){

            $fullname = '';
            if($resume['firstname'] != NULL && $resume['lastname'] != NULL){

                $fullname .= $resume['firstname'] . ' ' . $resume['lastname'];

            }else{

                $fullname = "No full name for this resume";

            }

            $resumeTitle = '';
            if($resume['title'] != NULL){

                $resumeTitle .= $resume['title'];

            }else{

                $resumeTitle = "No title for this resume";

            }

        }else{
            
            $fullname = "No full name for this resume";
            $resumeTitle = "No title for this resume";

        }

        echo "
            <tr>
                <td>$fullname</td>
                <td>$resumeTitle</td>
                <td>
                    <a href='./cv_detail.php?id={$resume['id']}' class='option success mr-2'>View</a>
                    <a href='./employer_Fav_CV_delete.php?id={$resume['favoriteid']}' class='option warning'>Remove</a>
                </td>
            </tr>";

    }

// ------------------------------------- END RENDER EMPLOYER DASHBOARD ------------------------------------- //

// ------------------------------------- RENDER JOBSEEKER DASHBOARD ------------------------------------- //

    function renderJobseekerFavoriteJob($job){
        echo "                            
            <tr>

                <td> {$job['title']} </td>
                <td> {$job['startdate']} </td>
                <td> {$job['enddate']} </td>

                <td>
                    <a href='./job_details.php?id={$job['jobid']}' class=' option success mr-2'>View</a>
                    <a href='./jseeker_dashboard_fav_j_delete.php?id={$job['jobid']}' class='option warning'>Delete</a>
                </td>

            </tr>";
    }

    function renderJobseekerFavoriteCompany($company){

        echo "                                
        <div class='c-box'>
            <a href='./comp_review_details.php?id={$company['companyid']}'>
                <img src='{$company['logo']}' alt=''>
                <h3> {$company['companyname']} </h3>
            </a>
            <a href='./jseeker_dashboard_fav_c_delete.php?id={$company['companyid']}' class='font-weight-bolder option text-danger float-right' 
                    style='margin-bottom: 2rem; margin-right: 20px;font-size: 1rem;'>Delete</a>
        </div>";

    }

    function renderJobseekerReviews($review){

        echo"
            <tr>
            <td>{$review['content']}</td>
            <td>{$review['name']}</td>
            <td>{$review['companyname']}</td>
            <td>{$review['datecreated']}</td>
            <td><a href='./jseeker_dashboard_review_del.php?id={$review['id']}' class='delete'>Delete</a></td>
            <td><a href='./comp_review_details.php?id={$review['companyid']}' class='text-primary'>View</a></td>
            </tr>
        ";

    }

    // RENDER RESUME

        function renderResumeProfile($jobseeker, $personalInfo, $title, $desiredCareer){

            $avatar = '';
            if ($jobseeker != false) {

                if ($jobseeker['avatar'] != null) {

                    $avatar .= $jobseeker['avatar'];

                } else {

                    $avatar = './images/Avatar.png';

                }

            }else{

                $avatar = './images/Avatar.png';

            }

            $fullname = '';
            if($personalInfo != false){

                if($personalInfo != NULL){

                    $fullname .= $personalInfo['firstname'] . ' ' . $personalInfo['lastname'];

                }else{

                    $fullname = 'Your full name here';

                }

            }else{

                $fullname = 'Your full name here';

            }

            $resumeTitle = '';
            if ($title !=false) {

                if ($title['title'] != null) {

                    $resumeTitle .= $title['title'];

                } else {

                    $resumeTitle = 'Your Resume Title Here';

                }

            } else {

                $resumeTitle = 'Your Resume Title Here';

            }

            $industry = '';
            $type = '';
            $salary = '';

            if ($desiredCareer != false) {

                if ($desiredCareer['industry'] != null) {

                    $industry .= $desiredCareer['industry'];

                } else {

                    $industry = "Your desired industry here";

                }

                if ($desiredCareer['type'] != null) {

                    $type .= $desiredCareer['type'];

                } else {

                    $type .= "Your desired type here";

                }

                if ($desiredCareer['salary'] != null) {

                    $salary .= $desiredCareer['salary'];

                } else {

                    $salary = "Your desired salary here";

                }

            }else{

                $industry = "Your desired industry here";
                $type .= "Your desired type here";
                $salary = "Your desired salary here";

            }

            echo "
                <div class='recent-grid'>
                    <div class='customers'>
                        <div class='card'>
                            <div class='profile-header'>
                                <h3>WORKr Profile</h3>
                            </div>
                            <div class='profile-body'>
                                <div class='profile-img'>
                                    <div class='info'>
                                        <img src='$avatar' width='300px' height='300px ' alt=''>
                                        <a data-toggle='modal' data-target='#imagePopUp' data-whatever='@getbootstrap'
                                            href='' style='margin-top: 20px;'><i class='fas fa-plus'></i> Upload Picture</a>
                                    </div>
                                </div>
                                <div class='text-box'>
                                    <h1>$fullname</h1>
                                    <h4 style='margin-bottom: 20px;'> $resumeTitle </h4>
                                    <p><i class='fas fa-star'></i> $industry </p>
                                    <p><i class='fas fa-user'></i> $type </p>
                                    <p><i class='fas fa-dollar-sign'></i> $salary </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>";

        }

        function renderResumePersonalInfo($personalInfo){

            $firstName = '';
            $lastName = '';
            $nationality = '';
            $maritalStatus = '';

            if($personalInfo != false){

                if($personalInfo['firstname'] != NULL){

                    $firstName .= $personalInfo['firstname'];

                }else{

                    $firstName = "Your first name here";

                }

                if($personalInfo['lastname'] != NULL){

                    $lastName .= $personalInfo['lastname'];

                }else{

                    $lastName = "Your last name here";

                }

                if($personalInfo['nationality'] != NULL){

                    $nationality .= $personalInfo['nationality'];

                }else{

                    $nationality = "Your nationality here";

                }

                if($personalInfo['status'] != NULL){

                    $maritalStatus .= $personalInfo['status'];

                }else{

                    $maritalStatus = "Your marital status here";

                }

            }else{

                $firstName = "Your first name here";
                $lastName = "Your last name here";
                $nationality = "Your nationality here";
                $maritalStatus = "Your marital status here";

            }

            echo "
                <div class='recent-grid'>
                    <div class='customers'>
                        <div class='card'>
                            <div class='profile-header'>
                                <h3><i class='fas fa-id-badge' style='width: 50px;'></i>Personal Information</h3>
                                <button data-toggle='modal' data-target='#personalInfoPopUp' data-whatever='@getbootstrap'
                                    type='submit' class='edit-btn'
                                    style='padding: 0px 30px; margin: 0px 0px 0px auto;'>Edit</button>
                            </div>
                            <div class='profile-body' id='special-body-uwu'>
                                <div class='neatly-constructed-grid-rows'>

                                    <div class='neatly-put-grid-columns'>
                                        <h2>First Name</h2>
                                        <p>$firstName</p>
                                    </div>

                                    <div class='neatly-put-grid-columns'>
                                        <h2>Last Name</h2>
                                        <p>$lastName</p>
                                    </div>

                                    <div class='neatly-put-grid-columns'>
                                        <h2>Nationality</h2>
                                        <p>$nationality</p>
                                    </div>

                                    <div class='neatly-put-grid-columns'>
                                        <h2>Martial Status</h2>
                                        <p>$maritalStatus</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>";

        }

        function renderResumeTitle($title){

            $resumeTitle = '';
            if($title != false){

                if($title['title'] != NULL){

                    $resumeTitle .= $title['title'];

                }else{

                    $resumeTitle = "Your resume title here";

                }

            }else{

                $resumeTitle = "Your resume title here";

            }

            echo "
                <div class='recent-grid'>
                    <div class='customers'>
                        <div class='card'>
                            <div class='profile-header'>
                                <h3><i class='fas fa-user-circle' style='width: 50px;'></i>Resume Title</h3>
                                <button data-toggle='modal' data-target='#titlePopUp' data-whatever='@getbootstrap'
                                    type='submit' class='edit-btn'
                                    style='padding: 0px 30px; margin: 0px 0px 0px auto;'>Edit</button>
                            </div>
                            <div class='profile-body'>
                                <div class='pdesc-box'>
                                    <p> $resumeTitle </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>";
        } 

        function renderResumeCareerObjective($goals){

            $careerGoals = '';
            if ($goals != false){

                if($goals != NULL){

                    $careerGoals .= $goals['careergoals'];

                }else{

                    $careerGoals = "Your career goals here";

                }

            }else{

                $careerGoals = "Your career goals here";

            }

            echo "
                <div class='recent-grid'>
                    <div class='customers'>
                        <div class='card'>
                            <div class='profile-header'>
                                <h3><i class='fas fa-bullseye' style='width: 50px;'></i>Career Objective</h3>
                                <button data-toggle='modal' data-target='#goalsPopUp' data-whatever='@getbootstrap'
                                    type='submit' class='edit-btn'
                                    style='padding: 0px 30px; margin: 0px 0px 0px auto;'>Edit</button>
                            </div>
                            <div class='profile-body'>
                                <div class='pdesc-box'>
                                    <p>$careerGoals</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>";

        }

        function renderResumeDesiredCareer($desiredCareer){

            $salary = '';
            $type = '';
            $industry = '';
            $location = '';

            if($desiredCareer != false){

                if ($desiredCareer['salary'] != NULL){

                    $salary .= $desiredCareer['salary'];

                }else{

                    $salary = "Your desired salary here";

                }

                if ($desiredCareer['type'] != NULL){

                    $type .= $desiredCareer['type'];

                }else{

                    $type = "Your desired type of work here";

                }

                if($desiredCareer['industry'] != NULL){

                    $industry .= $desiredCareer['industry'];

                }else{

                    $industry = "Your desired industry here";

                }

                if($desiredCareer['location'] != NULL){

                    $location .= $desiredCareer['location'];

                }else{

                    $location = "Your desired location here";

                }

            }else{

                $salary = "Your desired salary here";
                $type = "Your desired type of work here";
                $industry = "Your desired industry here";
                $location = "Your desired location here";

            }

            echo "
                <div class='recent-grid'>
                    <div class='customers'>
                        <div class='card'>
                            <div class='profile-header'>
                                <h3><i class='fas fa-briefcase' style='width: 50px;'></i>Desired Career</h3>
                                <button data-toggle='modal' data-target='#careerInfoPopUp' data-whatever='@getbootstrap'
                                    type='submit' class='edit-btn'
                                    style='padding: 0px 30px; margin: 0px 0px 0px auto;'>Edit</button>
                            </div>
                            <div class='profile-body' id='special-body-uwu'>
                                <div class='neatly-constructed-grid-rows'>
                                    <div class='neatly-put-grid-columns'>
                                        <h2>Salary</h2>
                                        <p>$salary</p>
                                    </div>
                                    <div class='neatly-put-grid-columns'>
                                        <h2>Job Type</h2>
                                        <p>$type</p>
                                    </div>
                                    <div class='neatly-put-grid-columns'>
                                        <h2>Industry</h2>
                                        <p>$industry</p>
                                    </div>
                                    <div class='neatly-put-grid-columns'>
                                        <h2>Work Location</h2>
                                        <p>$location</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>";

        }

        function renderResumeWorkExperience($workExperience){

            $jobtitle = '';
            $company = '';
            $experienceYear = '';
            $level = '';

            if($workExperience != false){

                if($workExperience['title'] != NULL){

                    $jobtitle .= $workExperience['title'];

                }else{

                    $jobtitle = "Your job title here";

                }

                if($workExperience['companyname'] != NULL){

                    $company .= $workExperience['companyname'];

                }else{

                    $company = "Your company you used to work here";

                }

                if($workExperience['experienceyear'] != NULL){

                    $experienceYear .= $workExperience['experienceyear'];

                }else{

                    $experienceYear = "Your year(s) of experience here";

                }

                if($workExperience['level'] != NULL){

                    $level .= $workExperience['level'];

                }else{

                    $level = "Your level here";

                }

            }else{

                $jobtitle = "Your job title here";
                $company = "Your company you used to work here";
                $experienceYear = "Your year(s) of experience here";
                $level = "Your level here";

            }

            echo "
                <div class='recent-grid'>
                    <div class='customers'>
                        <div class='card'>
                            <div class='profile-header'>
                                <h3><i class='fas fa-star' style='width: 50px;'></i>Work Experience</h3>
                                <button data-toggle='modal' data-target='#workExpPopUp' data-whatever='@getbootstrap'
                                    type='submit' class='edit-btn'
                                    style='padding: 0px 30px; margin: 0px 0px 0px auto;'>Edit</button>
                            </div>
                            <div class='profile-body' id='special-body-uwu'>
                                <div class='neatly-constructed-grid-rows'>
                                    <div class='neatly-put-grid-columns'>
                                        <h2>Job Title/Position: </h2>
                                        <p>$jobtitle</p>
                                    </div>
                                    <div class='neatly-put-grid-columns'>
                                        <h2>Company: </h2>
                                        <p>$company</p>
                                    </div>
                                    <div class='neatly-put-grid-columns'>
                                        <h2>Years Of Experience</h2>
                                        <p>$experienceYear year(s)</p>
                                    </div>
                                    <div class='neatly-put-grid-columns'>
                                        <h2>Current Level</h2>
                                        <p>$level</p>
                                    </div>
                                </div>
                                <hr class='center-diamond'>
                            </div>
                        </div>
                    </div>
                </div>";
        }

        function renderResumeEducation($education){

            $schoolName = '';
            $academicYear = '';

            if($education != false){

               if($education['schoolname'] != NULL){

                   $schoolName .= $education['schoolname'];

               }else{
                   
                   $schoolName = "Your school name here";

               }

               if($education['academicyear'] != NULL){

                    $academicYear .= $education['academicyear'];

               }else{

                    $academicYear = "Your academic year here";

               }

            }else{

                $schoolName = "Your school name here";
                $academicYear = "Your academic year here";

            }

            echo "
                <div class='recent-grid'>
                    <div class='customers'>
                        <div class='card'>
                            <div class='profile-header'>
                                <h3><i class='fas fa-graduation-cap' style='width: 50px;'></i>Education</h3>
                                <button data-toggle='modal' data-target='#eduPopUp' data-whatever='@getbootstrap'
                                    type='submit' class='edit-btn'
                                    style='padding: 0px 30px; margin: 0px 0px 0px auto;'>Edit</button>
                            </div>
                            <div class='profile-body' id='special-body-uwu'>
                                <div class='neatly-constructed-grid-rows'>
                                    <div class='neatly-put-grid-columns'>
                                        <h2>School</h2>
                                        <p>$schoolName</p>
                                    </div>
                                    <div class='neatly-put-grid-columns'>
                                        <h2>Academic Year</h2>
                                        <p>$academicYear</p>
                                    </div>
                                    <hr class='center-diamond'>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>";

        }

        function renderResumeCertificate($certificate){

            $name = '';
            $description = '';

            if($certificate != false){

                if($certificate['name'] != NULL){

                    $name .= $certificate['name'];

                }else{

                    $name = "Your certificate identification";

                }

                if($certificate['description'] != NULL){

                    $description .= $certificate['description'];

                }else{

                    $description = "Your certificate specification";

                }

            }else{

                $name = "Your certificate indentification";
                $description = "Your certificate specification";

            }

            echo "
                <div class='recent-grid'>
                    <div class='customers'>
                        <div class='card'>
                            <div class='profile-header'>
                                <h3><i class='fas fa-stamp' style='width: 50px;'></i>Certificate</h3>
                                <button data-toggle='modal' data-target='#certPopUp' data-whatever='@getbootstrap'
                                    type='submit' class='edit-btn'
                                    style='padding: 0px 30px; margin: 0px 0px 0px auto;'>Edit</button>
                            </div>
                            <div class='profile-body' id='special-body-uwu'>
                                <div class='neatly-constructed-grid-rows'>
                                    <div class='neatly-put-grid-columns'>
                                        <h2>Certificate</h2>
                                        <p>$name</p>
                                    </div>
                                    <div class='neatly-put-grid-columns'>
                                        <h2>Description</h2>
                                        <p>$description</p>
                                    </div>
                                    <hr class='center-diamond'>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>";

        }

        function renderResumeAchievement($achievement){

            $name = '';
            $description = '';

            if($achievement != false){

                if($achievement['name'] != NULL){

                    $name .= $achievement['name'];

                }else{

                    $name = "Your achievement here";

                }

                if($achievement['description'] != NULL){

                    $description .= $achievement['description'];

                }else{

                    $description = "Your achievement description here";

                }

            }else{

                $name = "Your achievement here";
                $description = "Your description here";

            }

            echo "
                <div class='recent-grid'>
                    <div class='customers'>
                        <div class='card'>
                            <div class='profile-header'>
                                <h3><i class='fas fa-trophy' style='width: 50px;'></i>Achievement</h3>
                                <button data-toggle='modal' data-target='#achievementsPopUp' data-whatever='@getbootstrap'
                                    type='submit' class='edit-btn'
                                    style='padding: 0px 30px; margin: 0px 0px 0px auto;'>Edit</button>
                            </div>
                            <div class='profile-body' id='special-body-uwu'>
                                <div class='neatly-constructed-grid-rows'>
                                    <div class='neatly-put-grid-columns'>
                                        <h2>Achievement</h2>
                                        <p>$name</p>
                                    </div>
                                    <div class='neatly-put-grid-columns'>
                                        <h2>Description</h2>
                                        <p>$description</p>
                                    </div>
                                    <hr class='center-diamond'>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>";

        }

        function renderResumeActivity($activity){

            $name = '';
            $description = '';

            if($activity != false){

                if($activity['name'] != NULL){

                    $name .= $activity['name'];

                }else{

                    $name = "Your project/work here";

                }

                if($activity['description'] != NULL){

                    $description .= $activity['description'];

                }else{

                    $description = "Your project/work detail here";

                }

            }else{

                $name = "Your project/work here";
                $description = "Your project/work detail here";

            }

            echo "
                <div class='recent-grid'>
                    <div class='customers'>
                        <div class='card'>
                            <div class='profile-header'>
                                <h3><i class='fas fa-air-freshener' style='width: 50px;'></i>Activity</h3>
                                <button data-toggle='modal' data-target='#actPopUp' data-whatever='@getbootstrap'
                                    type='submit' class='edit-btn'
                                    style='padding: 0px 30px; margin: 0px 0px 0px auto;'>Edit</button>
                            </div>
                            <div class='profile-body' id='special-body-uwu'>
                                <div class='neatly-constructed-grid-rows'>
                                    <div class='neatly-put-grid-columns'>
                                        <h2>Activity</h2>
                                        <p>$name</p>
                                    </div>
                                    <div class='neatly-put-grid-columns'>
                                        <h2>Description</h2>
                                        <p>$description</p>
                                    </div>
                                    <hr class='center-diamond'>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>";

        }

    // END RENDER RESUME


// ------------------------------------- END RENDER JOBSEEKER DASHBOARD ------------------------------------- //

// ------------------------------------- RENDER COMPANY ------------------------------------- //

    function renderCompanySlider($company, $smallText){
        echo "
            <div class='swiper-slide'>
                <div class='testi-item'>
                    <div class='testi-avatar'><img src='{$company['logo']}'></div>
                    <div class='testimonials-text-before'><i class='fa fa-quote-right'></i></div>
                    <div class='testimonials-text'>

                        <p>{$smallText}</p>
                        <a href='#' class='text-link'></a>
                            <div class='testimonials-avatar'>
                                <h3>{$company['companyname']}</h3>
                                <a href='./comp_review_details.php?id={$company['id']}'>Read more</a>
                            </div>

                    </div>
                    <div class='testimonials-text-after'><i class='fa fa-quote-left'></i></div>
                </div>
            </div>";
    }

    function renderCompanyDetail($company, $favoriteCompany){

        $companyfavo = "";
        if($favoriteCompany == true){
            
            $companyfavo .= "<button type='submit' class='btn btn-danger text-white' name = 'favoritecompany'><i class='far fa-heart' aria-hidden='true'></i> Favorite </button>";

        }else{

            $companyfavo .= "<button type='submit' class='btn btn-danger text-white' name = 'favoritecompany'><i class='far fa-heart' aria-hidden='true'></i> Favorited </button>";

        }

        echo "                
        <div class='jobs d-flex align-items-center mt-3 mb-3'>
            <div class='card' style='width:100px;'>
                <img src='{$company['logo']}' class='card-img-top' style='height: 100px; width: 100%; object-fit: cover;' alt='...'>
            </div>
            <div class='card_content w-100 ml-3 d-flex justify-content-between align-items-end'>
                <div class='job_info'>
                    <h3 class='text-danger'> {$company['companyname']} </h3>
                    <h6>Location: <i class='fas fa-map-marker-alt text-black-50'></i>
                        {$company['address']} </h6>
                    <div class='treatment'>
                        <ul class='d-flex'>
                            <li class='mr-3'><i class='fa fa-users' aria-hidden='true'></i> Company size:
                                {$company['size']} </li>
                            <li><i class='fas fa-gamepad'></i> Website: {$company['website']} </li>
                        </ul>
                    </div>
                </div>
                <div class='details'>

                    <form action='' method='post'>

                        {$companyfavo}
                        
                        <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#popUp'
                            data-whatever='@getbootstrap' name = 'review'>
                            Write a review
                        </button>

                    </form>

                </div>
            </div>
        </div>";
    }

    function renderReviewForm(){
        echo "    
            <div class='modal fade' id='popUp' tabindex='-1' role='dialog' aria-labelledby='popUpReviewForm' aria-hidden='true'>
                <div class='modal-dialog' role='document'>
                    <form action='' method='post'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='popUpReviewForm'>New Review</h5>
                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                            <div class='modal-body'>
                                <form>
                                    <div class='form-group'>
                                        <label for='recipient-name' class='col-form-label font-weight-bold'>How do you feel?
                                        </label>
                                        <div class='div'>
                                            <div class='form-check'>
                                                <input class='form-check-input' type='radio' name='inlineRadioOptions'
                                                    id='inlineRadio1' value='1'>
                                                <label class='form-check-label' for='inlineRadio1'><i
                                                        class='far fa-kiss-wink-heart'></i> I really love them!!!</label>
                                            </div>
                                            <div class='form-check'>
                                                <input class='form-check-input' type='radio' name='inlineRadioOptions'
                                                    id='inlineRadio2' value='2'>
                                                <label class='form-check-label' for='inlineRadio2'><i
                                                        class='far fa-grin-stars'></i>
                                                    Just love them.</label>
                                            </div>
                                            <div class='form-check'>
                                                <input class='form-check-input' type='radio' name='inlineRadioOptions'
                                                    id='inlineRadio3' value='3'>
                                                <label class='form-check-label' for='inlineRadio3'><i class='far fa-smile'></i>
                                                    Just
                                                    ok! ok!</label>
                                            </div>
                                            <div class='form-check'>
                                                <input class='form-check-input' type='radio' name='inlineRadioOptions'
                                                    id='inlineRadio4' value='4'>
                                                <label class='form-check-label' for='inlineRadio4'><i
                                                        class='far fa-frown-open'></i>
                                                    Not what I expected!!!!!</label>
                                            </div>
                                            <div class='form-check'>
                                                <input class='form-check-input' type='radio' name='inlineRadioOptions'
                                                    id='inlineRadio5' value='5'>
                                                <label class='form-check-label' for='inlineRadio5'><i
                                                        class='far fa-sad-tear'></i> I
                                                    was really disappointed</label>
                                            </div>
                                            <div class='form-check'>
                                                <input class='form-check-input' type='radio' name='inlineRadioOptions'
                                                    id='inlineRadio6' value='6'>
                                                <label class='form-check-label' for='inlineRadio6'><i class='far fa-angry'></i>
                                                    Not
                                                    want to talk about it.</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class='form-group'>
                                        <label for='message-text' class='col-form-label font-weight-bold'>Message</label>
                                        <textarea class='form-control' id='message-text' name='message'></textarea>
                                    </div>

                                </form>

                            </div>

                            <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                <button type='submit' class='btn btn-success' name='review'>Send message</button>
                            </div>
                    </form>

                </div>
            </div>
        </div>";
    }

    function renderReviews($review){

        $image = '';

        switch($review['feeling']){
            case "1":
                $image .= "/images/really love it.png";
                break;
            
            case "2":
                $image .= "/images/love it.png";
                break;

            case "3":
                $image .= "/images/oke.png";
                break;

            case "4":
                $image .= "/images/sad.png";
                break;

            case "5":
                $image .= "/images/cry.png";
                break;

            case "6":
                $image .= "/images/angry.png";
                break;
        }   

        $avatar = ''; 
        if($review['avatar'] == NULL){

            $avatar .= '\images\Avatar.png';

        }else{

            $avatar .= $review['avatar'];

        }

        echo "        
        <div class='row'>
            <div class='col-md-12'>
                <div class='jobs d-flex align-items-center mt-3 mb-3'>
                    <div style='width: 18rem;'>
                        <img src='{$avatar}' class='card-img-top' style='border-radius: 50%;' alt='...'>
                    </div>
                    <div class='card_content w-100 ml-3 d-flex justify-content-between align-items-end'>
                        <div>
                            <h3 class='text-success'>{$review['username']}</h3>
                            <h4>{$review['datecreated']}</h4>
                        </div>
                        <div style='width: 100px;'>
                            <img src='{$image}' class='card-img-top' alt='...'>
                        </div>
                    </div>
                </div>
                <div>
                    <p style='font-size: 1rem;'><i class='far fa-comment text-danger'></i><span class='font-weight-bolder text-danger'> What I think: </span>{$review['content']}</p>
                </div>
            </div>
        </div>";

    }

// ------------------------------------- END RENDER COMPANY ------------------------------------- //


?>