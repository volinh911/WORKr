<?php 

    include './func/cre.php';
    include './func/render.php';
    $model = new Model;
    $company = $model->getCompany();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="/css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="/css/comp_review.css">
    <title>WORKr</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light ">
        <a class="navbar-brand ml-5" href="">
            <img src="../images/LOGO.png" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

    <div class="main-box">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <p class="jum_title">Companies</p>
            </div>
        </div>

        <hr class="center-diamond">
    </div>

    <section>
        <div class="container">
            <div class="section-title">
                <h2>Popular Companies</h2>
                <span class="section-separator"></span>
            </div>
        </div>
        <div class="testimonials-carousel-wrap">
            <div class="listing-carousel-button listing-carousel-button-next"><i class="fa fa-caret-right" style="color: #fff"></i></div>
            <div class="listing-carousel-button listing-carousel-button-prev"><i class="fa fa-caret-left" style="color: #fff"></i></div>
            <div class="testimonials-carousel">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <!--testi-->
                        <?php if($company != false): ?>
                            <?php foreach($company as $c): ?>
                                <?php $smallText = substr($c['companydescription'], 0, 200); ?>

                                    <?php renderCompanySlider($c, $smallText); ?>


                        <!--testi end-->
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </div>
                </div>
            </div>

            <div class="tc-pagination"></div>
        </div>
    </section>

    <!-- Footer -->
    <footer style="margin-top: 45rem;">
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
    <script src="/js/comp_review.js"></script>

</body>

</html>