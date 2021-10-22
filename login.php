<?php include("func/cre.php"); 
    $model = new Model;
    $signup = $model->loginJobSeeker();

?>
<!doctype html>
<html lang="en">

<head>
    <?php include ('./includes/head.php');?>
    <link rel="stylesheet" href="/css/account.css">
</head>

<body>
    <?php include ("./includes/nav.php");?>
    <div class="l-form">
        <div class="shape1"></div>
        <div class="shape2"></div>
        <div class="form">
            <img src="/images/login.svg" alt="" class="form__img">
            <form action="" class="form__content" method="POST">
                <h1 class="form__title">One of us ?</h1>
                <div class="form__div form__div-one">
                    <div class="form__icon">
                        <i class="fas fa-envelope" aria-hidden="true"></i>
                    </div>

                    <!-- Input EMAIL -->
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
                <input type="submit" class="form__button" name="submit" value="Login">
                <p><a href="./register.php" class="text-success">Don't have an account yet?</a> Register now - it's free
                </p>
            </form>
        </div>
    </div>

    <hr>
    <?php include ("./includes/footer.php");?>
</body>

</html>