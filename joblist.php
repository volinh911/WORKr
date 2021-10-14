<?php
    include './func/render.php';
    include './func/cre.php';
    $model = new Model;

    

    $company = $model->getCompany();
    $experience = $model->getExperience();
    $industry = $model->getIndustry();
    $location = $model->getLocation();
    $salary = $model->getSalary();
    $type = $model->getType();



    $page = isset($_GET['page']) ? $_GET['page'] : "1";
    if ($page > 0) {
        $jobs = $model->fetchJobs($page);
        $searchResult = $model->searchBar($page);
    }

    //get number of pages
    $pages = $model->getPagesJobs();
    $totalJobs = $model->totalJobs;

    $searchpages = $model->getPagesSearch();
    $totalJobsSearch = $model->totalJobSearch;

    #sigular Page
    $Previous = $page - 1;
    $Next = $page + 1;
?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/job_list.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <a class="navbar-brand ml-5" href="">
            <img src="../images/LOGO.png" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ml-5" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Career Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Comapny Review</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">For Employers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fa fa-user" aria-hidden="true"></i> Sign In
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fa fa-lock" aria-hidden="true"></i> Sign Up
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Navbar end -->

    <!-- Searchbox -->
    <form action="" method="post">
        <div class="container-fluid mt-5">
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
                        <div class="input-group-append">
                            <button type="submit" class="btn bg-sienna" name="submit">
                                <i class="fa fa-search text-white" aria-hidden="true"></i>
                            </button>
                        </div>
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
        </div>
    </form>
    <!-- Searchbox -->

    <!-- Job title -->
    <div class="container-fluid mt-3">
        <!-- In tong viec lam truoc va sau khi search -->
        <?php if ($searchResult == false): ?>
        <h3 class="mt-4"><?php echo $totalJobs; ?> việc làm</h3>
        <?php else: ?>
        <h3 class="mt-4"><?php echo $totalJobsSearch; ?> việc làm</h3>
        <?php endif; ?>

        <!-- In all jobs sort by startdate -->
        <?php if ($page > 0 && $page <= $pages && $searchResult == false): ?>
        <?php foreach($jobs as $job): ?>

        <?php renderJobList($job); ?>

        <?php endforeach; ?>

        <!-- In jobs da search -->
        <?php elseif($searchResult): ?>
        <?php foreach($searchResult as $result): ?>

        <?php renderSearchResult($result); ?>

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
                <?php if ($searchResult == false): ?>
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
                
                <!-- Phan con loi -->
                <?php else: ?>

                <?php if ($page == 1) : ?>

                <li class="disabled"><a class="prev" href="joblist.php?page=<?= $Previous; ?>"><i
                            class="fas fa-chevron-left"></i></a></li>

                <?php else : ?>

                <li><a class="prev" href="joblist.php?page=<?= $Previous; ?>"><i class="fas fa-chevron-left"></i></a>
                </li>

                <?php endif; ?>

                <!-- In ra so trang tuong ung voi luong bai viet -->
                <?php for ($i = 1; $i <= $searchpages; $i++) : ?>

                <li class="pageNumber active"><a href="joblist.php?page=<?= $i; ?>"> <?= $i; ?> </a></li>

                <?php endfor; ?>

                <?php if ($page < $searchpages) : ?>

                <li><a class="next" href="joblist.php?page=<?= $Next; ?>"><i class="fas fa-chevron-right"></i></a></li>

                <?php else : ?>

                <li class="disabled"><a class="next" href="joblist.php?page=<?= $Next; ?>"><i
                            class="fas fa-chevron-right"></i></a></li>

                <?php endif; ?>

                <?php endif; ?>
            </ul>
        </div>
    </div>
    <!-- !Pagination -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>