<?php 
    include './func/cre.php';
    include './func/render.php';

    $model = new Model;

    $page = isset($_GET['page']) ? $_GET['page'] : "1";
    if ($page > 0) {
        $blogs = $model->getBlogs($page);
        
    }

    //get number of pages
    $pages = $model->getPagesBlog();

    #sigular Page
    $Previous = $page - 1;
    $Next = $page + 1;
     

?>

<!doctype html>
<html lang="en">

<head>
    <?php include ('./includes/head.php');?>
    <link rel="stylesheet" href="/css/careerblog.css">
</head>

<body>
    <!-- Navbar -->
    <?php include ('./includes/nav.php');?>
    <!-- !Navbar -->

    <!-- Cards -->
    <div class="container-fluid mt-5" style="padding-left: 150px;">
        <h3>Advice and inspiration for building successful careers.</h3>
        <p class="">Resume guides. Interviewing tips. Industry data.</p>
        <div class="row topic-post">

            <?php if ($page > 0 && $page <= $pages) : ?>
            <?php 

        if ($blogs != false){

            foreach ($blogs as $blog) {

                // Giam luong characters xuong 50
                $smallText = substr($blog['content'], 0, 40);

        ?>

            <?php renderBlogList($blog, $smallText);  ?>

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

                <li class="disabled"><a class="prev" href="careerblog.php?page=<?= $Previous; ?>"><i
                            class="fas fa-chevron-left"></i></a></li>

                <?php else : ?>

                <li><a class="prev" href="careerblog.php?page=<?= $Previous; ?>"><i class="fas fa-chevron-left"></i></a>
                </li>

                <?php endif; ?>

                <!-- In ra so trang tuong ung voi luong bai viet -->
                <?php for ($i = 1; $i <= $pages; $i++) : ?>

                <li class="pageNumber active"><a href="careerblog.php?page=<?= $i; ?>"> <?= $i; ?> </a></li>

                <?php endfor; ?>

                <?php if ($page < $pages) : ?>

                <li><a class="next" href="careerblog.php?page=<?= $Next; ?>"><i class="fas fa-chevron-right"></i></a>
                </li>

                <?php else : ?>

                <li class="disabled"><a class="next" href="careerblog.php?page=<?= $Next; ?>"><i
                            class="fas fa-chevron-right"></i></a></li>

                <?php endif; ?>

            </ul>
        </div>
    </div>
    <!-- !Pagination -->

    <!-- Footer -->
    <?php include ('./includes/footer.php');?>
</body>

</html>