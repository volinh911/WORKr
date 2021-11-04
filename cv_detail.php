<?php 

    include './func/cre.php';
    include './func/render.php';

    $model = new Model;
    
    if(isset($_GET['id'])){

        $resumeID = $_GET['id'];
        $resumeUserid = $model->getResumeUserID($resumeID);

        if ($resumeUserid != false) {

            $jobseeker = $model->getJobSeeker($resumeUserid);
            $personalInfo = $model->getResumePersonalInfo($resumeUserid);
            $title = $model->getResumeTitle($resumeUserid);
            $goals = $model->getResumeGoals($resumeUserid);
            $desiredCareer = $model->getResumeCareer($resumeUserid);

            $workExperience = $model->getResumeWorkExperience($resumeUserid);
            $education = $model->getResumeEducation($resumeUserid);
            $certificate = $model->getResumeCertificate($resumeUserid);
            $achievement = $model->getResumeAchievement($resumeUserid);
            $activity = $model->getResumeActivity($resumeUserid);

            $favoriteResume = true;
            if (isset($_SESSION['loggedin'])) {

                $userid = $_SESSION['userid'];
                $favoriteResume = $model->favoriteResume($resumeID, $userid);
    
            }else{
    
                $null = -1;
                $favoriteResume = $model->favoriteResume($resumeID, $null);
    
            }

        }

    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include ('./includes/head.php');?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="./css/cv_detail.css">
    <link rel="stylesheet" href="./css/jseeker.css">
</head>

<body>
    <?php include ('./includes/nav.php');?>
    <?php if(isset($_GET['id']) && $resumeUserid != false): ?>
    <header id="header">
        <div class="overlay overlay-lg">
            <img src="./img/shapes/square.png" class="shape square" alt="" />
            <img src="./img/shapes/circle.png" class="shape circle" alt="" />
            <img src="./img/shapes/half-circle.png" class="shape half-circle1" alt="" />
            <img src="./img/shapes/half-circle.png" class="shape half-circle2" alt="" />
            <img src="./img/shapes/x.png" class="shape xshape" alt="" />
            <img src="./img/shapes/wave.png" class="shape wave wave1" alt="" />
            <img src="./img/shapes/wave.png" class="shape wave wave2" alt="" />
            <img src="./img/shapes/triangle.png" class="shape triangle" alt="" />
            <img src="./img/shapes/letters.png" class="letters" alt="" />
            <img src="./img/shapes/points1.png" class="points points1" alt="" />
        </div>

        <div class="header-content">
            <?php renderResumeDetailProfile($jobseeker, $personalInfo, $title, $goals, $favoriteResume) ?>
        </div>
    </header>

    <section class="info section" id="info">
        <div class="container">
            <div class="section-header">
                <h3 class="title-section sienna"><i class="fas fa-id-badge mr-3"></i>Personal Information</h3>
            </div>
        </div>
        <?php renderResumeDetailPersonalInfo($personalInfo); ?>
    </section>

    <section class="career section" id="info">
        <div class="container">
            <div class="section-header">
                <h3 class="title-section sienna"><i class="fas fa-briefcase mr-3"></i>Desired Career</h3>
            </div>
        </div>
        <?php renderResumeDetailDesiredCareer($desiredCareer); ?>
    </section>

    <section class="experience section" id="info">
        <div class="container">
            <div class="section-header">
                <h3 class="title-section sienna"><i class="fas fa-star mr-3"></i>Work Experience</h3>
            </div>
        </div>
        <?php renderResumeDetailWorkExperience($workExperience); ?>
    </section>

    <section class="edu section" id="info">
        <div class="container">
            <div class="section-header">
                <h3 class="title-section sienna"><i class="fas fa-graduation-cap mr-3"></i>Education</h3>
            </div>
        </div>
        <?php renderResumeDetailEducation($education); ?>
    </section>

    <section class="cert section" id="info">
        <div class="container">
            <div class="section-header">
                <h3 class="title-section sienna"><i class="fas fa-stamp mr-3"></i>Certificates</h3>
            </div>
        </div>
        <?php renderResumeDetailCertificate($certificate); ?>
    </section>

    <section class="achieve section" id="info">
        <div class="container">
            <div class="section-header">
                <h3 class="title-section sienna"><i class="fas fa-trophy mr-3"></i>Achievements</h3>
            </div>
        </div>
        <?php renderResumeDetailAchievement($achievement); ?>
    </section>

    <section class="activity section" id="info">
        <div class="container">
            <div class="section-header">
                <h3 class="title-section sienna"><i class="fas fa-air-freshener mr-3"></i>Acitivities</h3>
            </div>
        </div>
        <?php renderResumeDetailActivity($activity); ?>
    </section>
    <?php else: ?>

    <h1>Resume not found</h1>

    <?php endif ?>

    <?php include ('./includes/footer.php');?>

</body>

</html>