<?php include("includes/head.php"); ?>
<?php include("includes/headd.php"); ?>
<?php include("func/cre.php"); 
    $model = new Model;
    $signup = $model->loginJobSeeker();

?>

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
        </form>
    </div>
</div>
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