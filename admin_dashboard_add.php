<?php
    include './func/cre.php';
    $model = new Model;
    $createBlog = $model->createBlog();
    
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="/css/dashboard.css">
    <link rel="stylesheet" href="/css/style.css">
  </head>
  <body>
      
    <input type="checkbox" id="nav-toggle">
    <!-- Sidebar -->
      <div class="sidebar">
         <div class="sidebar-brand">
            <h2><span><img src="/images/LOGO.png" alt=""></span></h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="" class="active"><span><i class="fab fa-blogger-b"></i></span>
                    <span>Blogs</span></a>
                </li>
                <li>
                    <a href="" class="active"><span><i class="fas fa-briefcase"></i></span>
                    <span>Jobs</span></a>
                </li>
                <li>
                    <a href="" class="active"><span><i class="fas fa-pen"></i></span>
                    <span>Review</span></a>
                </li>
                <li>
                    <a href="" class="active"><span><i class="fa fa-home" aria-hidden="true"></i></span>
                    <span>Home</span></a>
                </li>
                <li>
                    <a href="./logout.php" class="active"><span><i class="fas fa-sign-out-alt"></i></span>
                    <span>Logout</span></a>
                </li>
            </ul>
        </div>
        </div>
    <!-- Sidebar -->

    <div class="main-content ">
        <!-- Header -->
        <header>
            <h2>
                <label for="nav-toggle">
                    <span><i class="fas fa-bars text-white"></i></span>
                </label> 
            </h2>
            <div class="user-wrapper">
                <img src="/images/Avatar.png" width="40px" height="40px" alt="">
                <div>
                    <h6 class="text-white">Administrador</h6>
                </div>
            </div>
        </header>
        <!-- Header -->

        <main>
             <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h5>Add Blog</h5>
                            <a href="/html/admin_dashboard_blog.html">
                                <button>Manage Blogs</button>
                            </a>
                        </div>
                        <div class="card-body">
                             <div class="table-responsive">
                                 <!-- Neu khong phai admin thi out -->
                                 <?php var_dump($_SESSION); if ($_SESSION['role'] == 1): ?>

                                <form action="admin_dashboard_add.php" method="POST" enctype="multipart/form-data">

                                    <!-- Input TITLE -->
                                    <div>
                                        <label for="title">Title</label><br>
                                        <input type="text" name="title" id="" class="text-input"><br>
                                    </div>

                                    <!-- Input AUTHOR -->
                                    <div>
                                        <label for="author">Author</label><br>
                                        <input type="text" name="author" id="" class="text-input"><br>
                                    </div>

                                    <!-- Input BODY -->
                                    <div>
                                        <label for="body">Body</label>
                                        <textarea name="body" id="body" class="text-input"></textarea>
                                    </div>

                                    <!-- Input IMAGE -->
                                    <div>
                                        <label for="Image">Image</label><br>
                                        <input type="file" name="image" class="text-input" >
                                    </div>
                                    
                                    <button type="submit" name="submit"> Add Blog</button>
                                </form>

                                <?php else : echo "<h1> You're in a wrong place my friend";?>
                                <?php endif ?>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="customers">
                    <div class="card">
                        <div class="card-header">
                            <h5>Admins</h5>
                        </div>
                        <div class="card-body">
                                <div class="customer ">
                                   <div class="info">
                                    <img src="/images/Avatar.png " width="40px " height="40px " alt=" ">
                                    <div>
                                        <h4>1959009</h4>
                                    </div>
                                </div>
                                <div class="contact ">
                                    <span><i class="fas fa-comment-dots"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </main>
        <footer>
            <p class="text-center pt-2">© 2021 WORKr. All rights reserved.</p>
        </footer>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/12.2.0/classic/ckeditor.js"></script>
    <script src="/js/blog_dashboard.js"></script>
  </body>
</html>