<?php

    include './func/cre.php';
    $model = new Model;
?>

<!doctype html>
<html lang="en">

<head>
    <?php include ('./includes/head.php');?>
    <link rel="stylesheet" href="/css/home-style.css">
</head>

<body>
    <?php include ('./includes/nav.php');?>
    <!--end of navbar-->

    <!--page container-->
    <!--banner-->
    <div class="banner container-fluid row justify-content-around">
        <div class="banner-title align-self-center">
            <h1>Your Dream Career Starts Here.</h1>
            <p>We offer you the chances to seek, hire, and share your skills, all in one place.</p>
            <button class="join-us"><a href="login.php" class="sienna">Join us</a> </button>
        </div>
    </div>
    <!--end of banner-->

    <!--trending-->
    <div class="trending">
        <p>Don't know where to start?</p>
        <div class="h1">Trending</div>
        <div class="tag-group">
            <a href="" class="tag-item">Software Engineer</a>
            <a href="" class="tag-item">Receptionist</a>
            <a href="" class="tag-item">Human Resources</a>
            <a href="" class="tag-item">Accounting</a>
            <a href="" class="tag-item">Administrative Assistant</a>
        </div>
        <a href="" class="more-jobs sienna">or find out more here!</a>
    </div>
    <!--end of trending-->


    <!--blog promo-->
    <div class="blog-promo container py-5">
        <div class="community-advert mb-5">
            <p>CAN'T FIND ANYTHING?</p>
            <h3>Explore other places of us!</h3>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 p-4">
                <div class="border shadow card p-4">
                    <img class="card-img-top" src="../images/blog.svg" alt="Card image cap">
                    <div class="card-body">
                        <h3 class="card-title sienna">Career Blog</h3>
                        <p class="card-text font-weight-bold">Looking for some advice?</p>
                        <p class="card-text">Where you can learn helpful tips in your next journeys
                        </p>
                        <a href="careerblog.php" class="sienna">Learn More <i class="fa fa-arrow-right"
                                aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 p-4">
                <div class="border shadow card p-4">
                    <img class="card-img-top" src="../images/review.svg" alt="Card image cap">
                    <div class="card-body">
                        <h3 class="card-title sienna">Company Reviews</h3>
                        <p class="card-text font-weight-bold">Wanna learn from experiences?</p>
                        <p class="card-text">Where you can write, read and receive a variety of advice for your next
                            job.
                        </p>
                        <a href="comp_review.php" class="sienna">Learn More <i class="fa fa-arrow-right"
                                aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 p-4">
                <div class="border shadow card p-4">
                    <img class="card-img-top" src="../images/employer.svg" alt="Card image cap">
                    <div class="card-body">
                        <h3 class="card-title sienna">For Employers</h3>
                        <p class="card-text font-weight-bold">Looking to Post a job?</p>
                        <p class="card-text">We have end-to-end solutions that can keep up with you and your standards
                        </p>
                        <a href="register_employer.php" class="sienna">Learn More <i class="fa fa-arrow-right"
                                aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--end of blog promo-->


    <!--end of page container-->


    <!-- Footer -->
    <?php include ('./includes/footer.php');?>
    <!-- Footer -->
</body>