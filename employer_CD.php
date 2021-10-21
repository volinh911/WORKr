<?php 

include './func/cre.php';
$model = new Model;
if (isset($_SESSION['role']) && $_SESSION['role'] == 3) {
  
    $companyID = $_SESSION['companyid'];
    $company = $model->getCompanyOverview($companyID);
    $model->updateCompany($companyID);

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
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/employer.css">
</head>

<body>
    <input type="checkbox" id="sidebar-toggle">
    <div class="sidebar">
        <div class="sidebar-header">
            <h3 class="brand">
                <img src="../images/LOGO.png" alt="">
            </h3>
            <label for="sidebar-toggle" class="fa fa-bars"></label>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="">
                        <span class="fa fa-home"></span>
                        <span>Overview</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="fa fa-info-circle"></span>
                        <span>Company Detail</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="fa fa-heart"></span>
                        <span>Favorite Resumes</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="fa fa-edit"></span>
                        <span>Post Jobs</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="fa fa-clipboard"></span>
                        <span>Jobs Management</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <header>
            <nav>
                <ul class="nav-links">
                    <li><a href="">Home</a></li>
                    <li><a href="">Find Resume</a></li>
                    <li><button>Sign Out</button></li>
                </ul>
            </nav>

            <a href="" class="user-wrapper">
                <img src="/images/user.jpg" width="40px" height="40px" alt="">
                <div>
                    <h6>User</h6>
                </div>
            </a>

        </header>

        <main>
            <h2 class="dash-title">Company Detail</h2>

            <div class="form-wrapper">
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 3):?>
                <form action="" method="post">

                    <div class="input-form">
                        <div class="input-field">
                            <label for="">Company Name</label>
                            <input type="text" class="input" value="<?php echo $company['companyname']; ?>" name="name">
                        </div>

                        <div class="input-field">
                            <label for="">Company Logo</label>
                            <div class="input-logo">
                                <img src="<?php echo $company['logo']; ?>" alt="">
                                <input type="text" class="input" placeholder="Input image url here..." name="logo"
                                    value="<?php echo $company['logo']; ?>">
                            </div>
                        </div>

                        <div class="input-field">
                            <label for="">Address</label>
                            <textarea class="textarea" name="address"><?php echo $company['address']; ?></textarea>
                        </div>

                        <div class="input-field">
                            <label for="">Website</label>
                            <input type="text" class="input" value="<?php echo $company['website']; ?>" name="website">
                        </div>

                        <div class="input-field">
                            <label for="">Apply Email</label>
                            <input type="text" class="input" value="<?php echo $company['applyemail']; ?>" name="email">
                        </div>

                        <div class="input-field">
                            <label for="">Size</label>
                            <input type="text" class="input" value="<?php echo $company['size']; ?>" name="size">
                        </div>

                        <div class="input-field">
                            <label for="">Description</label>
                            <textarea id="body" class="text-input"
                                name="description"><?php echo $company['companydescription']; ?></textarea>
                        </div>

                        <div class="input-field">
                            <input type="submit" value="Update" class="btn" name="submit">
                        </div>

                    </div>
                </form>

                <?php else: echo "<h1> You're not logged in or you're not an employer </h1>" ?>
                <?php endif; ?>
                
            </div>

        </main>
    </div>





    <!-- footer -->
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/12.2.0/classic/ckeditor.js"></script>
    <script src="/js/blog_dashboard.js"></script>
    <!--end of footer-->
</body>