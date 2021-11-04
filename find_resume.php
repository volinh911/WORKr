<?php
    include './func/render.php';
    include './func/cre.php';

    $model = new Model;

    // get required
    $industry = $model->getIndustry();
    $location = $model->getLocation();
    $salary = $model->getSalary();
    $type = $model->getType();

    // Auto set page = 1 if not set
    $page = isset($_GET['page']) ? $_GET['page'] : "1";
    if ($page > 0) {
        $resumes = $model->getResumes($page);
    }

    //get number of pages
    $pages = $model->getPagesResume();
    $totalResume = $model->totalResumes;

    #sigular Page
    $Previous = $page - 1;
    $Next = $page + 1;

    // search bar
    $searchResult = $model->searchResume();
    $totalResumeSearch = $model->totalResumeSearch;

?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/find-resume.css">
</head>

<body>
    <!-- header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
                    <a class="nav-link" href="#">Company Review</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Find Resume</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger" href="#">Log Out</a>
                </li>
                <a href="" class="user-wrapper">
                    <img src="/images/user.jpg" width="40px" height="40px" alt="">
                    <div>
                        <h6 class="text-dark justify-content-center">User</h6>
                    </div>
                </a>
            </ul>
        </div>
    </nav>
    <!--end of navbar-->

    <h1 class="text-center py-4">Find Resumes</h1>

    <div class="container py-5">
        <div class="row">
            <div class="filter-sidebar col-lg-3 col-md-3">

                <form action="" method="post">
                    <div class="filter-search">

                        <div class="filter-column">
                            <h4>INDUSTRY</h4>

                            <div class="select-box">

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
                        <hr>

                        <div class="filter-column">
                            <h4>TYPE</h4>

                            <div class="select-box">

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
                        <hr>
                        <div class="filter-column">
                            <h4>SALARY</h4>

                            <div class="select-box">

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
                        <hr>
                        <div class="filter-column">
                            <h4>LOCATION</h4>

                            <div class="select-box">

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
                        <hr>

                        <div class="option-submit">
                            <button class="btn filter-submit" type="submit" name="submit">Filter</button>
                        </div>

                    </div>
                </form>

            </div>

            <div class="filter-list col-lg-8 col-md-7">
                <div class="resume-number d-flex">
                    <?php if ($searchResult == false): ?>
                    <span>Total: <?php echo $totalResume; ?> Resumes</span>
                    <?php else: ?>
                    <span>Total: <?php echo $totalResumeSearch; ?> Resumes was found</span>
                    <?php endif; ?>
                </div>
                <hr>

                <div class="resume-list">

                    <?php if ($page > 0 && $page <= $pages && $searchResult == false): ?>
                    <!-- In all jobs sort by id -->
                    <?php $i = 0; foreach($resumes as $resume): if ($i < 5){?>
                    <?php $i += 1; renderListResume($resume); ?>
                    <?php }endforeach; ?>

                    <!-- In jobs da search -->
                    <?php elseif($searchResult): ?>

                    <?php foreach($searchResult as $result): ?>
                    <?php renderListResume($result); ?>
                    <?php endforeach; ?>

                    <?php endif; ?>

                </div>

                <div class="resume-pagination">
                    <ul class="pagination">

                        <!-- PREV CHECK -->
                        <?php if ($page == 1) : ?>
                        <li class="disabled"><a href="find_resume.php?page=<?= $Previous; ?>" class="prev">
                                < Prev</a>
                        </li>
                        <?php else : ?>
                        <li><a href="find_resume.php?page=<?= $Previous; ?>" class="prev">
                                < Prev</a>
                        </li>
                        <?php endif; ?>

                        <!-- Pagination -->
                        <?php for ($i = 1; $i <= $pages; $i++) : ?>
                        <li class="pageNumber"><a href="find_resume.php?page=<?= $i; ?>"><?= $i; ?></a></li>
                        <?php endfor; ?>

                        <!-- NEXT CHECK -->
                        <?php if ($page < $pages) : ?>
                        <li><a href="find_resume.php?page=<?= $Next; ?>" class="next">Next ></a></li>
                        <?php else : ?>
                        <li class="disabled"><a href="find_resume.php?page=<?= $Next; ?>" class="next">Next ></a></li>
                        <?php endif; ?>

                    </ul>
                </div>
            </div>

        </div>




    </div>

    <!-- Footer -->
    <footer class="bg-light">
        <div class="container">
            <div class="boxx">
                <div class="weird mt-4">
                    <img src="../images/LOGO.png" alt="">
                    <h6 style="font-size: 13px;">227 Nguyễn Văn Cừ, Distreet 5, HCMC, VN</h6>
                </div>
                <div class="row mt-4">
                    <div class="col-md-4 col-sm-6">
                        <ul class="list-group">
                            <li>
                                <a class="title" href="">
                                    <h6>WORKr</h6>
                                </a>
                            </li>
                            <li><a href="">About</a></li>
                            <li><a href="">Carrer Blog</a></li>
                            <li><a href="">Company Review</a></li>
                            <li><a href="">Term of Use</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <ul class="list-group">
                            <li>
                                <a class="title" href="">
                                    <h6>Job Seeker</h6>
                                </a>
                            </li>
                            <li><a href="">Find All Jobs</a></li>
                            <li><a href="">Create Resume</a></li>
                            <li><a href="">Favorite Jobs</a></li>
                            <li><a href="">Review Company</a></li>
                            <li><a href="">Favorite Company</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <ul class="list-group">
                            <li>
                                <a class="title" href="">
                                    <h6>Employers</h6>
                                </a>
                            </li>
                            <li><a href="">Post Jobs</a></li>
                            <li><a href="">Find All Resume</a></li>
                            <li><a href="">Favorite Resume</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <h6 class="text-center" style="color: #2D7BA0;">© 2021 WORKs. All rights reserved</h6>
    </footer>
    <!-- Footer -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    <script src="../js/find_resume.js"></script>

</body>