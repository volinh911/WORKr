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
    <?php include ('./includes/head.php');?>
    <link rel="stylesheet" href="/css/comp_review_details.css">
</head>

<body>
    <?php include ('./includes/nav.php');?>

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

        <h1 style="color: #A0522D;">This company don't have any review yet</h1>

        <?php endif; ?>
    </div>

    <?php else: ?>

    <h1>Company not found</h1>

    <?php endif ?>

    <hr>
    <?php include ('./includes/footer.php');?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>

</body>

</html>