<?php 

    include './func/cre.php';
    include './func/render.php';
    $model = new Model;
    $company = $model->getCompany();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include ('./includes/head.php');?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="/css/comp_review.css">

</head>

<body>
    <?php include ('./includes/nav.php');?>

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
            <div class="listing-carousel-button listing-carousel-button-next"><i class="fa fa-caret-right"
                    style="color: #fff"></i></div>
            <div class="listing-carousel-button listing-carousel-button-prev"><i class="fa fa-caret-left"
                    style="color: #fff"></i></div>
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

    <div style="margin-top: 45rem;"></div>
    <?php include ('./includes/footer.php');?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
    <script src="/js/comp_review.js"></script>

</body>

</html>