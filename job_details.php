<?php
    include './func/cre.php';
    include './func/render.php';

    $model = new Model;
    
    if (isset($_GET['id'])) {

        $jobID = $_GET['id'];
        $job = $model->getDetailJob($jobID);
        $companyid = $job['companyid'];
        $company = $model->getCompanyOverview($companyid);

        $favoriteJob = true;
        $favoriteCompany = true;
        if (isset($_SESSION['loggedin'])) {

            $userid = $_SESSION['userid'];
            $favoriteJob = $model->favoriteJob($jobID, $userid);
            $favoriteCompany = $model->favoriteCompany($companyid,$userid);

        }else{

            $null = -1;
            $favoriteJob = $model->favoriteJob($jobID, $null);
            $favoriteCompany = $model->favoriteCompany($companyid,$null);

        }

    }
?>

<!doctype html>
<html lang="en">

<head>
    <?php include ('./includes/head.php');?>
    <link rel="stylesheet" href="/css/job_details.css">
</head>

<body>
    <!-- Navbar -->
    <?php include ('./includes/nav.php');?>
    <!-- Navbar end -->

    <!-- jumbotron -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">

        </div>
    </div>
    <!-- jumbotron -->

    <div class="container">
        <nav>
            <div class="nav nav-tabs ml-3" id="nav-tab" role="tablist">
                <a class="nav-link active" data-toggle="tab" href="#job-detail" role="tab" aria-selected="true">Job
                    Detail</a>
                <a class="nav-link" data-toggle="tab" href="#company" role="tab" aria-controls="company"
                    aria-selected="false">Company Overview</a>
            </div>
        </nav>
        <?php if(isset($_GET['id']) && $job != false): ?>

        <?php renderJobDetail($job, $company, $favoriteJob, $favoriteCompany); ?>

        <?php else: ?>

        <h1>Job not found</h1>

        <?php endif ?>

    </div>

    <!-- Footer -->
    <hr class="ml-5 mr-5">
    <?php include ('./includes/footer.php');?>
</body>

</html>