<?php 

    include './func/cre.php';
    include './func/render.php';

    $model = new Model;

    if (isset($_GET['id'])) {

        $companyID = $_GET['id'];
        $company = $model->getCompanyOverview($companyID);
        $reviews = $model->getReviews($companyID);

        $favoriteCompany = true;
        if (isset($_SESSION['loggedin'])) {

            $userid = $_SESSION['userid'];
            $favoriteCompany = $model->favoriteCompany($companyID,$userid);
            $model->createReview($userid, $companyID);


        }else{

            $null = -1;
            $favoriteCompany = $model->favoriteCompany($companyID,$null);
            $model->createReview($null, $companyID);

        }
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="/css/comp_review_details.css">
    <title>WORKr</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light ">
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
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        For Employer
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#"><i class="fas fa-sign-in-alt"></i> Sign In</a>
                        <a class="dropdown-item" href="#"><i class="far fa-plus-square"></i> Sign Up</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#"><i class="fas fa-upload"></i> Post A Job</a>
                        <a class="dropdown-item" href="#"><i class="far fa-heart"></i> Favorite Resume</a>
                    </div>
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

    <!-- Company Detail -->
    <?php if(isset($_GET['id']) && $company != false): ?>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12 ">

                <?php renderCompanyDetail($company, $favoriteCompany);?>

            </div>
        </div>
    </div>

    <!--Write Review Popup-->
    <?php renderReviewForm(); ?>

    <div class="container mt-3">
        <h3>About the company</h3>
        <p><?php echo $company['companydescription']; ?></p>
    </div>
    <!-- End Company Detail -->

    <hr style="width: 80%;" class="mx-auto mt-5">

    <div class="container mt-5">
        <h3>Reviews from Employees</h3>

        <!--really love it -->
        <?php if($reviews != false): ?>
        <?php foreach($reviews as $review): ?>
            
            <?php renderReviews($review); ?>

        <?php endforeach; ?>
        <?php else: ?>

        <h1>This company don't have any review yet</h1>

        <?php endif; ?>

        <!--love it -->
        <!-- <div class="row">
            <div class="col-md-12">
                <div class="jobs d-flex align-items-center mt-3 mb-3">
                    <div style="width: 18rem;">
                        <img src="/images/gameloft.jpg" class="card-img-top" style="border-radius: 50%;" alt="...">
                    </div>
                    <div class="card_content w-100 ml-3 d-flex justify-content-between align-items-end">
                        <div>
                            <h3 class="text-success">Username</h3>
                            <h4>18:00, 18/10/2021</h4>
                        </div>
                        <div style="width: 100px;">
                            <img src="/images/love it.png" class="card-img-top" alt="...">
                        </div>
                    </div>
                </div>
                <div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam repudiandae maxime quidem odit,
                        hic odio illum, iusto rem, perferendis voluptate dolorum esse tempore ad amet numquam corporis
                        vero. Voluptates, necessitatibus!</p>
                </div>
            </div>
        </div> -->

        <!--ok -->
        <!-- <div class="row">
            <div class="col-md-12">
                <div class="jobs d-flex align-items-center mt-3 mb-3">
                    <div style="width: 18rem;">
                        <img src="/images/gameloft.jpg" class="card-img-top" style="border-radius: 50%;" alt="...">
                    </div>
                    <div class="card_content w-100 ml-3 d-flex justify-content-between align-items-end">
                        <div>
                            <h3 class="text-success">Username</h3>
                            <h4>18:00, 18/10/2021</h4>
                        </div>
                        <div style="width: 100px;">
                            <img src="/images/oke.png" class="card-img-top" alt="...">
                        </div>
                    </div>
                </div>
                <div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam repudiandae maxime quidem odit,
                        hic odio illum, iusto rem, perferendis voluptate dolorum esse tempore ad amet numquam corporis
                        vero. Voluptates, necessitatibus!</p>
                </div>
            </div>
        </div> -->

        <!--sad-->
        <!-- <div class="row">
            <div class="col-md-12">
                <div class="jobs d-flex align-items-center mt-3 mb-3">
                    <div style="width: 18rem;">
                        <img src="/images/career.jpg" class="card-img-top" style="border-radius: 50%;" alt="...">
                    </div>
                    <div class="card_content w-100 ml-3 d-flex justify-content-between align-items-end">
                        <div>
                            <h3 class="text-success">Username</h3>
                            <h4>18:00, 18/10/2021</h4>
                        </div>
                        <div style="width: 100px;">
                            <img src="/images/sad.png" class="card-img-top" alt="...">
                        </div>
                    </div>
                </div>
                <div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam repudiandae maxime quidem odit,
                        hic odio illum, iusto rem, perferendis voluptate dolorum esse tempore ad amet numquam corporis
                        vero. Voluptates, necessitatibus!</p>
                </div>
            </div>
        </div> -->

        <!--cry-->
        <!-- <div class="row">
            <div class="col-md-12">
                <div class="jobs d-flex align-items-center mt-3 mb-3">
                    <div style="width: 18rem;">
                        <img src="/images/gameloft.jpg" class="card-img-top" style="border-radius: 50%;" alt="...">
                    </div>
                    <div class="card_content w-100 ml-3 d-flex justify-content-between align-items-end">
                        <div>
                            <h3 class="text-success">Username</h3>
                            <h4>18:00, 18/10/2021</h4>
                        </div>
                        <div style="width: 100px;">
                            <img src="/images/cry.png" class="card-img-top" alt="...">
                        </div>
                    </div>
                </div>
                <div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam repudiandae maxime quidem odit,
                        hic odio illum, iusto rem, perferendis voluptate dolorum esse tempore ad amet numquam corporis
                        vero. Voluptates, necessitatibus!</p>
                </div>
            </div>
        </div> -->

        <!--angry-->
        <!-- <div class="row">
            <div class="col-md-12">
                <div class="jobs d-flex align-items-center mt-3 mb-3">
                    <div style="width: 18rem;">
                        <img src="/images/gameloft.jpg" class="card-img-top" style="border-radius: 50%;" alt="...">
                    </div>
                    <div class="card_content w-100 ml-3 d-flex justify-content-between align-items-end">
                        <div>
                            <h3 class="text-success">Username</h3>
                            <h4>18:00, 18/10/2021</h4>
                        </div>
                        <div style="width: 100px;">
                            <img src="/images/angry.png" class="card-img-top" alt="...">
                        </div>
                    </div>
                </div>
                <div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam repudiandae maxime quidem odit,
                        hic odio illum, iusto rem, perferendis voluptate dolorum esse tempore ad amet numquam corporis
                        vero. Voluptates, necessitatibus!</p>
                </div>
            </div>
        </div> -->
    </div>

    <?php else: ?>

    <h1>Company not found</h1>

    <?php endif ?>

    <!-- Footer -->
    <footer>
        <hr>
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
        <h6 class="text-center" style="color: #2D7BA0;">© 2021 WORKr. All rights reserved</h6>
    </footer>

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>

</body>

</html>