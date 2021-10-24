<?php 

include './func/cre.php';
$model = new Model;

if (isset($_SESSION['role']) && $_SESSION['role'] == 3) {

    $companyID = $_SESSION['companyid'];
    $company = $model->getCompanyOverview($companyID);
    $userid = $_SESSION['userid'];
    $postjobOV = $model->countTotalJob($userid);
    
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
                    <a href="employer_OV.php" class="active"><span><i class="fa fa-home"></i></span>
                        <span>Overview</span></a>
                </li>
                <li>
                    <a href="employer_CD.php" class="active"><span><i class="fa fa-info-circle"></i></span>
                        <span>Company Detail</span></a>
                </li>
                <li>
                    <a href="#" class="active"><span><i class="fa fa-heart"></i></span>
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
                <img src="/images/Avatar.png" width="40px" height="40px" alt="">
                <div>
                    <h6 class="text-white">Administrador</h6>
                </div>
            </div>
        </header>
        <!-- Header -->


        <main>

            <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 3):?>

            <div class="container">

                <div class="row">
                    <div class="col-md-12 ">
                        <div class="jobs d-flex align-items-center mt-3 mb-3">
                            <div class="card" style="width: 100px; height: 100px;">
                                <img src="<?php echo $company['logo']; ?>" class="card-img-top" alt="...">
                            </div>
                            <div class="card_content w-100 ml-3 d-flex justify-content-between align-items-end">
                                <div class="job_info">
                                    <h3 class="text-danger"><?php echo $company['companyname']; ?></h3>
                                    <p class="font-weight-bold">Address: <span><?php echo $company['address']; ?></span>
                                    </p>
                                </div>
                            </div>
                            <div class="details">
                                <button type="submit" class="btn btn-outline-success love-btn"><i
                                        class="far fa-edit"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="overview-detail py-5">

                    <div class="overview-detail-header">
                        <h3 class="my-3">Description</h3>
                    </div>

                    <div class="bg-white p-3">
                        <div class="employer-description">
                            <span><?php echo $company['companydescription']; ?></span>
                        </div>
                    </div>
                </div>

                <div class="overview-detail py-5">
                    <div class="overview-detail-header">
                        <h2 class="my-3">Post Jobs</h2>
                    </div>
                    <div class="overview-content pl-5 pt-3 pb-4 bg-white">
                        <div class="job-posting-sum">
                            <span>You have posted </span>
                            <span class="job-num text-large"><?php echo $postjobOV['count']; ?></span>
                            <span>recruitment seekings.</span>
                        </div>
                        <div class="job-posting-recent">
                            <span>Your most recent recruitment seeking was posted on: </span>
                            <span class="job-date text-large"><?php echo $postjobOV['startdate']; ?></span>
                        </div>
                        <div class="job-posting-option">
                            <a href="" class="btn overview-button">Make a Post</a>
                        </div>
                    </div>

                </div>

                <div class="overview-detail py-5">
                    <div class="overview-detail-header">
                        <h2 class="my-3">Favorite Resumes</h2>
                    </div>
                    <div class="overview-content pl-5 pt-3 pb-4 pr-5 bg-white">
                        <div class="favorite-sum">
                            <span>You have </span>
                            <span class="fav-num text-large">75</span>
                            <span>favorite resumes in your stocks.</span>
                        </div>
                        <div class="favorite-option">
                            <a href="" class="btn overview-button">Go Check</a>
                            <a href="" class="btn overview-button">Search Resumes</a>
                        </div>
                    </div>

                </div>
            </div>

            <?php else: echo "<h1> You're not logged in or you're not an employer </h1>" ?>
            <?php endif; ?>

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
    <!--end of footer-->
</body>