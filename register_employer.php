<?php

    include './func/cre.php';
    $model = new Model;
    $companyNames = $model->getCompany();
    $signup = $model->signupEmployer();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include ('./includes/head.php');?>

    <link rel="stylesheet" href="/css/authorization_employer.css">
    <link rel="stylesheet" href="/css/account.css">
    <title>WORKr</title>
</head>

<body>

    <?php include ("./includes/nav.php");?>

    <div class="container">
        <div class="row">
            <div class="col mt-5">
                <h2 class="banner">FOR EMPLOYER</h2>
                <h4 class="title mt-3">SIGN UP</h4>
                <form action="" class="form__content employer_form" method="POST">
                    <div class="form__div form__div-one">
                        <div class="form__icon">
                            <i class="fas fa-envelope"></i>
                        </div>

                        <!-- INPUT EMAIL -->
                        <div class="form__div-input">
                            <label for="" class="form__label"></label>
                            <input type="email" class="form__input" name="email" placeholder="Email">
                        </div>

                    </div>

                    <div class="form__div">
                        <div class="form__icon">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </div>

                        <!-- Input PASSWORD -->
                        <div class="form__div-input">
                            <label for="" class="form__label"></label>
                            <input type="password" class="form__input" name="password" placeholder="Password">
                        </div>

                    </div><br>

                    <div class="form-group">
                        <select id="inputState" class="form-control" name="companyid">
                            <option value="0" selected>Choose your company</option>

                            <?php foreach($companyNames as $companyName): ?>

                            <option value="<?php echo $companyName['id']; ?>">
                                <?php echo $companyName['companyname']; ?> </option>

                            <?php endforeach; ?>

                        </select>
                    </div>

                    <input type="submit" class="form__button mt-4" name="submit" value="Sign up">
                    <p><a href="./login_employer.php" class="text-success">Already have an account?</a> Login now - it's
                        free</p>
                </form>
            </div>
            <div class="col">
                <img class="img-fluid employer-authorization-img" src="/images/employer_authorization.png" alt="">
            </div>
        </div>
    </div>

    <hr>
    <!-- Footer -->
    <?php include ("./includes/footer.php");?>

</body>

</html>