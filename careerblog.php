<?php 
    include './func/cre.php';
    $model = new Model;

    $page = isset($_GET['page']) ? $_GET['page'] : "1";
    if ($page > 0) {
        $blogs = $model->fetchBlogs($page);
    }

    //get number of pages
    $pages = $model->getPages();


    #sigular Page
    $Previous = $page - 1;
    $Next = $page + 1;

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

    <!-- Cards -->
    <div class="container-fluid mt-5 ">
        <h3>Advice and inspiration for building successful careers.</h3>
        <p class="">Resume guides. Interviewing tips. Industry data.</p>
        <div class="row topic-post">

        <?php if ($page > 0 && $page <= $pages) : ?>
        <?php 

        if ($blogs != false){

            foreach ($blogs as $blog) {

                // Giam luong characters xuong 50
                $smallText = substr($blog['content'], 0, 50);

        ?>

            <div class='col-lg-4 col-md-6 pt-4'>
                <div class='card border rounded-2 shadow advice' style='width: 25rem;'>

                    <img src='<?php echo $blog['image']; ?>' class='card-img-top' alt='    '>

                    <div class='card-body'>

                        <h5 class='card-title'> <?php echo $blog['title']; ?> </h5>

                        <p class='card-text'> <?php echo $blog['authorname']; ?> |
                            <small> <?php echo $blog['datecreated']; ?> </small>
                        </p>

                        <p> <?php echo $smallText; ?> </p>

                        <a href='blogdetail.php?id=<?php echo $blog['id']; ?>'>
                            <small class='float-right'><i class='fa fa-arrow-right' aria-hidden='true'></i> Read More</small></a>
                            
                    </div>
                </div>
            </div>

        <?php
        }
        }else{
            echo "You have no blog";
        }
        ?>
        
        <?php else : ?>

        <h1>Page not available </h1>

        <?php endif; ?>
        

        </div>

    </div>
    <!-- !Cards -->

    <!-- Pagination -->

    <div class="container mt-3 d-flex justify-content-center">
        <div class="row">
            <ul class="d-flex page-nav">

                <!-- Dynamic pagination -->
                <!-- Disabled khi khong co trang previous && next -->
                <?php if ($page == 1) : ?>
                
                <li class="disabled"><a class="prev" href="careerblog.php?page=<?= $Previous; ?>"><i class="fas fa-chevron-left"></i></a></li>

                <?php else : ?>

                <li><a class="prev" href="careerblog.php?page=<?= $Previous; ?>"><i class="fas fa-chevron-left"></i></a></li>

                <?php endif; ?>

                <!-- In ra so trang tuong ung voi luong bai viet -->
                <?php for ($i = 1; $i <= $pages; $i++) : ?>
                    
                <li class="pageNumber active"><a href="careerblog.php?page=<?= $i; ?>"> <?= $i; ?> </a></li>

                <?php endfor; ?>

                <?php if ($page < $pages) : ?>

                <li><a class="next" href="careerblog.php?page=<?= $Next; ?>"><i class="fas fa-chevron-right"></i></a></li>

                <?php else : ?>

                <li class="disabled"><a class="next" href="careerblog.php?page=<?= $Next; ?>"><i class="fas fa-chevron-right"></i></a></li>

                <?php endif; ?>

            </ul>
        </div>
    </div>
    <!-- !Pagination -->

    <!-- Footer -->
    <footer class="bg-light">
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