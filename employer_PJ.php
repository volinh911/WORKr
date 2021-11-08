<?php

    include './func/cre.php';
    include './func/render.php';

    $model = new Model;

    if (isset($_SESSION['role']) && $_SESSION['role'] == 3) {

        $role = $_SESSION['role'];        
        $userid = $_SESSION['userid'];
        $jobseeker = new stdClass();
    
        $employer = $model->getEmployer($userid);
        // End header
        $companyID = $_SESSION['companyid'];
        $company = $model->getCompanyOverview($companyID);
        $createJog = $model->createJob();
        $experience = $model->getExperience();
        $industry = $model->getIndustry();
        $level = $model->getLevel();
        $location = $model->getLocation();
        $salary = $model->getSalary();
        $type = $model->getType();

    }else{

        echo "<script>window.location.href = 'index.php';</script>";

    }
    
?>

<!doctype html>
<html lang="en">

<head>
    <?php include ('./includes/head.php');?>
    <link rel="stylesheet" href="/css/dashboard.css">
    <link rel="stylesheet" href="/css/employer.css">
</head>

<body>
    <input type="checkbox" id="nav-toggle">
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span><img src="/images/LOGO.png" alt=""></span></h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="employer_OV.php" class="active"><span><i class="far fa-address-card"></i></span>
                        <span>Overview</span></a>
                </li>
                <li>
                    <a href="employer_CD.php" class="active"><span><i class="fa fa-info-circle"></i></span>
                        <span>Company Detail</span></a>
                </li>
                <li>
                    <a href="employer_Fav_CV.php" class="active"><span><i class="fa fa-heart"></i></span>
                        <span>Favorite Resumes</span></a>
                </li>
                <li>
                    <a href="employer_PJ.php" class="active"><span><i class="fa fa-edit" aria-hidden="true"></i></span>
                        <span>Post Jobs</span></a>
                </li>
                <li>
                    <a href="employer_JM.php" class="active"><span><i class="fa fa-clipboard"
                                aria-hidden="true"></i></span>
                        <span>Jobs Management</span></a>
                </li>
                <li>
                    <a href="index.php" class="active"><span><i class="fa fa-home"></i></span>
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
            <h2 class="dash-title">Post Jobs</h2>

            <form action="" method="post">

                <div class="form-wrapper mb-5">
                    <div class="input-form">
                        <div class="input-field">
                            <label for="">Job Title</label>
                            <input type="text" name="title" id="" class="text-input"><br>
                        </div>

                        <div class="input-field" style="margin-top: 2rem;">
                            <label for="">Company name</label>
                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="industry"
                                style="padding-top: 0; padding-bottom: 0;">
                                <!-- Late put company name here acording to session that user logged in -->
                                <option value="0" selected>Choose company</option>

                                <option value="<?php echo $company['id']; ?>">
                                    <?php echo $company['companyname']; ?> </option>

                            </select>
                        </div>

                        <div class="input-field" style="margin-top: 2rem;">
                            <label for="">Job Industry</label>
                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="industry"
                                style="padding-top: 0; padding-bottom: 0;">
                                <option value="0" selected>Choose industry</option>

                                <?php foreach($industry as $i):  ?>

                                <option value="<?php echo $i['id']; ?>"> <?php echo $i['industry']; ?></option>

                                <?php endforeach; ?>

                            </select>
                        </div>

                        <div class="input-field" style="margin-top: 2rem;">
                            <label for="">Job Salary</label>
                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="salary"
                                style="padding-top: 0; padding-bottom: 0;">
                                <option value="0" selected>Choose salary</option>

                                <?php foreach($salary as $s):  ?>

                                <option value="<?php echo $s['id']; ?>"> <?php echo $s['salary']; ?></option>

                                <?php endforeach; ?>

                            </select>
                        </div>

                        <div class="input-field" style="margin-top: 2rem;">
                            <label for="">Job Experience Level</label>
                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="experience"
                                style="padding-top: 0; padding-bottom: 0;">
                                <option value="0" selected>Choose experience</option>

                                <?php foreach($experience as $e):  ?>

                                <option value="<?php echo $e['id']; ?>"> <?php echo $e['experienceyear']; ?> year(s)
                                </option>

                                <?php endforeach; ?>

                            </select>
                        </div>

                        <div class="input-field" style="margin-top: 2rem;">
                            <label for="">Job Type</label>
                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="type"
                                style="padding-top: 0; padding-bottom: 0;">
                                <option value="0" selected>Choose type</option>

                                <?php foreach($type as $t):  ?>

                                <option value="<?php echo $t['id']; ?>"> <?php echo $t['type']; ?></option>

                                <?php endforeach; ?>

                            </select>
                        </div>

                        <div class="input-field" style="margin-top: 2rem;">
                            <label for="">Job Level</label>
                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="level"
                                style="padding-top: 0; padding-bottom: 0;">
                                <option value="0" selected>Choose level</option>

                                <?php foreach($level as $l):  ?>

                                <option value="<?php echo $l['id']; ?>"> <?php echo $l['level']; ?></option>

                                <?php endforeach; ?>

                            </select>
                        </div>

                        <div class="input-field" style="margin-top: 2rem;">
                            <label for="">Job Level</label>
                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="location"
                                style="padding-top: 0; padding-bottom: 0;">
                                <option value="0" selected>Choose location</option>

                                <?php foreach($location as $lo):  ?>

                                <option value="<?php echo $lo['id']; ?>"> <?php echo $lo['location']; ?></option>

                                <?php endforeach; ?>

                            </select>
                        </div>

                        <div class="input-field" style="margin-top: 2rem;">
                            <label for="">Due Date</label>
                            <input type="date" id="" name="enddate" class="text-input">
                        </div>

                        <div class="input-field" style="margin-top: 2rem;">
                            <label for="">Description</label>
                        </div>

                        <div>
                            <textarea name="body" id="description" class="text-input"></textarea>
                        </div>

                        <div class="input-field" style="margin-top: 2rem;">
                            <label for="">Requirements</label>
                        </div>
                        <div>
                            <textarea name="requirements" id="requirements" class="text-input"></textarea>
                        </div>

                        <div class="input-field float-right mt-3">
                            <input type="submit" value="Post" class="btn btn-danger" name="submit">
                        </div>

                    </div>
                </div>

            </form>

        </main>

        <footer>
            <p class="text-center pt-2">© 2021 WORKr. All rights reserved.</p>
        </footer>
    </div>





    <!-- footer -->
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
    <script src="https://cdn.ckeditor.com/ckeditor5/12.2.0/classic/ckeditor.js"></script>
    <script src="/js/blog_dashboard.js"></script>
    <!--end of footer-->
</body>