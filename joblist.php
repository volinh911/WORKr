<?php
    include './func/render.php';
    include './func/cre.php';
    $model = new Model;

    // get required
    $company = $model->getCompany();
    $experience = $model->getExperience();
    $industry = $model->getIndustry();
    $location = $model->getLocation();
    $salary = $model->getSalary();
    $type = $model->getType();

    // Auto set page = 1 if not set
    $page = isset($_GET['page']) ? $_GET['page'] : "1";
    if ($page > 0) {
        $jobs = $model->getJobs($page);
    }

    //get number of pages
    $pages = $model->getPagesJobs();
    $totalJobs = $model->totalJobs;

    #sigular Page
    $Previous = $page - 1;
    $Next = $page + 1;

    // search bar
    $searchResult = $model->searchBar();
    $totalJobsSearch = $model->totalJobSearch;

    // Null object
    $favoriteJobs = new stdClass();
    if(isset($_SESSION['role']) && $_SESSION['role'] == 2){

        $userid = $_SESSION['userid'];
        $favoriteJobs = $model->getfavoriteJob($userid);

    }
?>

<!doctype html>
<html lang="en">

<head>
    <?php include ('./includes/head.php');?>
    <link rel="stylesheet" href="/css/job_list.css">
</head>

<body>
    <!-- Navbar -->
    <?php include ("./includes/nav.php");?>
    <!-- Navbar end -->

    <!-- Searchbox -->
    <hr style="margin-top: 0.3rem;">
    <form action="" method="post">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mt-3">
                    <div class="input-group">
                        <select class="custom-select" id="inputGroupSelect04"
                            aria-label="Example select with button addon" name="companyid">
                            <option value="0" selected>Choose your Company</option>

                            <?php foreach ($company as $c): ?>

                            <option <?php 
                                if (isset($_POST['companyid']) && $_POST['companyid'] == $c['id']) echo "selected";?>
                                value="<?php echo $c['id']; ?>"> <?php echo $c['companyname']; ?>
                            </option>

                            <?php endforeach; ?>

                        </select>
                    </div>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="input-group">
                        <select class="custom-select" id="inputGroupSelect04"
                            aria-label="Example select with button addon" name="industryid">
                            <option value="0" selected>Choose your Industry</option>

                            <?php foreach ($industry as $i): ?>

                            <option
                                <?php 
                                    if (isset($_POST['industryid']) && $_POST['industryid'] == $i['id']) echo "selected";?>
                                value="<?php echo $i['id']; ?>"> <?php echo $i['industry']; ?>
                            </option>

                            <?php endforeach; ?>

                        </select>
                    </div>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="input-group">
                        <select class="custom-select" id="inputGroupSelect04"
                            aria-label="Example select with button addon" name="experienceid">
                            <option value="0" selected>Choose your Experience</option>

                            <?php foreach ($experience as $e): ?>

                            <option
                                <?php 
                                if (isset($_POST['experienceid']) && $_POST['experienceid'] == $e['id']) echo "selected";?>
                                value="<?php echo $e['id']; ?>"> <?php echo $e['experienceyear']; ?> year/years
                            </option>

                            <?php endforeach; ?>

                        </select>
                    </div>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="input-group">
                        <select class="custom-select" id="inputGroupSelect04"
                            aria-label="Example select with button addon" name="salaryid">
                            <option value="0" selected>Choose your Salary</option>

                            <?php foreach ($salary as $s): ?>

                            <option <?php 
                                if (isset($_POST['salaryid']) && $_POST['salaryid'] == $s['id']) echo "selected";?>
                                value="<?php echo $s['id']; ?>"> <?php echo $s['salary']; ?>
                            </option>

                            <?php endforeach; ?>

                        </select>
                    </div>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="input-group">
                        <select class="custom-select" id="inputGroupSelect04"
                            aria-label="Example select with button addon" name="typeid">
                            <option value="0" selected>Choose your Type</option>

                            <?php foreach ($type as $t): ?>

                            <option <?php 
                                if (isset($_POST['typeid']) && $_POST['typeid'] == $t['id']) echo "selected";?>
                                value="<?php echo $t['id']; ?>"> <?php echo $t['type']; ?>
                            </option>

                            <?php endforeach; ?>

                        </select>
                    </div>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="input-group">
                        <select class="custom-select" id="inputGroupSelect04"
                            aria-label="Example select with button addon" name="locationid">
                            <option value="0" selected>Choose your Location</option>

                            <?php foreach ($location as $lo): ?>

                            <option
                                <?php 
                                if (isset($_POST['locationid']) && $_POST['locationid'] == $lo['id']) echo "selected";?>
                                value="<?php echo $lo['id']; ?>"> <?php echo $lo['location']; ?>
                            </option>

                            <?php endforeach; ?>

                        </select>
                    </div>
                </div>
            </div>
            <div class="input-group-append my-3 float-right">
                <button type="submit" class="btn bg-sienna text-white" name="submit">
                    <i class="fa fa-search text-white" aria-hidden="true"></i> Search
                </button>
            </div>
        </div>
    </form>
    <!-- Searchbox -->

    <!-- Job title -->
    <div class="container mt-3">
        <!-- In tong viec lam truoc va sau khi search -->
        <?php if ($searchResult == false): ?>
        <h3 class="mt-4"><?php echo $totalJobs; ?> việc làm</h3>

        <?php else: ?>

        <h3 class="mt-4"><?php echo $totalJobsSearch; ?> việc làm được tìm thấy</h3>
        <?php endif; ?>

        <!-- In all jobs sort by startdate -->
        <?php if ($page > 0 && $page <= $pages && $searchResult == false): ?>
        <?php $i = 0; foreach($jobs as $job): if ($i < 5){?>

        <?php $i += 1; renderJobList($job, $favoriteJobs); ?>

        <?php }endforeach; ?>

        <!-- In jobs da search -->
        <?php elseif($searchResult): ?>
            
        <?php foreach($searchResult as $result): ?>

        <?php renderJobList($result, $favoriteJobs); ?>

        <?php endforeach; ?>

        <?php else : ?>

        <h1>Page not available </h1>

        <?php endif; ?>

    </div>
    <!-- Job title -->

    <!-- Pagination -->
    <div class="container mt-3 d-flex justify-content-center">
        <div class="row">
            <ul class="d-flex page-nav">

                <!-- Dynamic pagination -->
                <!-- Disabled khi khong co trang previous && next -->
                <?php if ($page == 1) : ?>

                <li class="disabled"><a class="prev" href="joblist.php?page=<?= $Previous; ?>"><i
                            class="fas fa-chevron-left"></i></a></li>

                <?php else : ?>

                <li><a class="prev" href="joblist.php?page=<?= $Previous; ?>"><i class="fas fa-chevron-left"></i></a>
                </li>

                <?php endif; ?>

                <!-- In ra so trang tuong ung voi luong bai viet -->
                <?php for ($i = 1; $i <= $pages; $i++) : ?>

                <li class="pageNumber active"><a href="joblist.php?page=<?= $i; ?>"> <?= $i; ?> </a></li>

                <?php endfor; ?>

                <?php if ($page < $pages) : ?>

                <li><a class="next" href="joblist.php?page=<?= $Next; ?>"><i class="fas fa-chevron-right"></i></a></li>

                <?php else : ?>

                <li class="disabled"><a class="next" href="joblist.php?page=<?= $Next; ?>"><i
                            class="fas fa-chevron-right"></i></a></li>

                <?php endif; ?>

            </ul>
        </div>
    </div>
    <!-- !Pagination -->

    <!-- Footer -->
    <?php include ("./includes/footer.php");?>
</body>

</html>