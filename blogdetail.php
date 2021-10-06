<?php
    include './func/cre.php';
    include './func/render.php';

    $model = new Model;
    
    if (isset($_GET['id'])) {

        $blogID = $_GET['id'];
        $blog = $model->getBlogDetail($blogID);

    }
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
    <link rel="stylesheet" href="/css/careerblog.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light shadow ">
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
                    <a class="nav-link" href="#">Comapny Review</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">For Employers</a>
                </li>
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
    <!-- !Navbar -->

    <!-- Content -->

    <?php if(isset($_GET['id']) && $blog != false): ?>

        <?php renderBlogDetail($blog); ?>

    <?php else: ?>

    <h1>Blog not found</h1>

    <?php endif ?>
    <!-- !Content -->

    <!-- See more blog -->
    <div class="container mt-5">
        <h3 class="text-center">More from blog...</h3>
        <div class="row">

        <!-- Neu lay duoc ID va sql query khong loi -->
            <?php if(isset($_GET['id']) && $blog != false): 
                
                $exists = array(); 
                
            ?>

        <!-- Loop 3 lan = 3 bai  -->
            <?php for ($i = 1; $i <= 3; $i++) :  

                do{

                    $randomBlogID = $model->getRandBlogID($blogID);

                } while(

                    in_array($randomBlogID, $exists)

                );

                array_push($exists, $randomBlogID);

                $blog = $model->getBlogDetail((int)$randomBlogID); 

                // Neu du 3 bai thi set => khong de thi co nhieu in bay nhieu
                // Cac bai bi xoa lot vao 3 so random thi co bao nhieu in bay nhieu

                $smallText = substr($blog['content'], 0, 50);


            ?>

            <?php

               renderMoreBlog($blog, $smallText);

            ?>

            <?php endfor; ?>

            <?php else: ?>

            <h1>Blog not found</h1>

            <?php endif ?>

        </div>
    </div>
    <!-- !See more blog -->

    <footer class="bg-light mt-5">
        <div class="container ">
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
        <h6 class="text-center" style="color: #2D7BA0;">© 2021 WORKs. All rights reserved</h6>
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
</body>

</html>