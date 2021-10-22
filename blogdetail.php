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
    <?php include ('./includes/head.php');?>
    <link rel="stylesheet" href="/css/careerblog.css">
</head>

<body>
    <!-- Navbar -->
    <?php include ('./includes/nav.php');?>
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

    <?php include ('./includes/footer.php');?>
</body>

</html>