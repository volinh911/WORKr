<?php include("func/cre.php"); 
    $model = new Model;
    $signup = $model->signupJobSeeker();
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
    <link rel="stylesheet" href="/css/account.css">
</head>

<body>
    <?php include ("./includes/nav.php");?>

    <div class="l-form">
        <div class="shape1"></div>
        <div class="shape2"></div>
        <div class="form">
            <img src="/images/register.svg" alt="" class="form__img">
            <form action="" class="form__content" method="POST">
                <h1 class="form__title">Looking for a job ?</h1>
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
                <div class="form__div form__div-one">
                    <div class="form__icon">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>

                    <!-- Input USERNAME -->
                    <div class="form__div-input">
                        <label for="" class="form__label"></label>
                        <input type="text" class="form__input" name="username" placeholder="Username">
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

                <input type="submit" class="form__button" name="submit" value="Sign up">
            </form>
        </div>
    </div>

    <hr>
    <!-- Footer -->
    <?php include ("./includes/footer.php");?>
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
</body>

</html>