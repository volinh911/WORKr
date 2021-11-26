<?php 

    include './func/cre.php';
    include './func/render.php';

    $model = new Model;

    if (isset($_SESSION['role']) && $_SESSION['role'] == 3) {
        
        $role = $_SESSION['role'];        
        $userid = $_SESSION['userid'];
        $jobseeker = new stdClass();

        $employer = $model->getEmployer($userid);
        // End header
        $companyID = $_SESSION['companyid'];
        $company = $model->getCompanyOverview($companyID);
        $model->updateCompany($companyID);

    }else{

        echo "<script>window.location.href = 'index.php';</script>";

    }

?>

<!doctype html>
<html lang="en">

<head>
    <?php include ('./includes/head.php');?>
    <link rel="stylesheet" href="/css/dashboard.css">
    <link rel="stylesheet" href="/css/employer.css">
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
                    <a href="employer_OV.php" class="active"><span><i class="far fa-address-card"></i></span>
                        <span>Overview</span></a>
                </li>
                <li>
                    <a href="employer_CD.php" class="active"><span><i class="fa fa-info-circle"></i></span>
                        <span>Company Detail</span></a>
                </li>
                <li>
                    <a href="employer_Fav_CV.php" class="active"><span><i class="fa fa-heart"></i></span>
                        <span>Favorite Resumes</span></a>
                </li>
                <li>
                    <a href="employer_PJ.php" class="active"><span><i class="fa fa-edit" aria-hidden="true"></i></span>
                        <span>Post Jobs</span></a>
                </li>
                <li>
                    <a href="employer_JM.php" class="active"><span><i class="fa fa-clipboard"
                                aria-hidden="true"></i></span>
                        <span>Jobs Management</span></a>
                </li>
                <li>
                    <a href="index.php" class="active"><span><i class="fa fa-home"></i></span>
                        <span>Home</span></a>
                </li>
                <li>
                    <a href="logout.php" class="active"><span><i class="fas fa-sign-out-alt"></i></span>
                        <span>Logout</span></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Sidebar -->

    <div class="main-content">
        <!-- Header -->

        <?php renderHeader($role, $jobseeker, $employer); ?>

        <!-- Header -->

        <main>
            <h2 class="dash-title">Company Detail</h2>

            <div class="form-wrapper mb-5">

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

                        <label for="">Address</label>
                        <div class="input-field">
                            <textarea class="textarea" name="address"><?php echo $company['address']; ?></textarea>
                        </div>

                        <label for="">Website</label>
                        <div class="input-field">
                            <input type="text" class="input" value="<?php echo $company['website']; ?>" name="website">
                        </div>

                        <label for="">Apply Email</label>
                        <div class="input-field">
                            <input type="text" class="input" value="<?php echo $company['applyemail']; ?>" name="email">
                        </div>

                        <label for="">Size</label>
                        <div class="input-field">
                            <input type="text" class="input" value="<?php echo $company['size']; ?>" name="size">
                        </div>

                        <label for="">Description</label>
                        <div class="input-field">
                            <textarea id="body" class="text-input"
                                name="description"><?php echo $company['companydescription']; ?></textarea>
                        </div>

                        <div class="input-field float-right">
                            <input type="submit" value="Update" class="btn btn-danger" name="submit">
                        </div>

                    </div>
                </form>

            </div>
        </main>

        <footer>
            <p class="text-center pt-2">© 2021 WORKr. All rights reserved.</p>
        </footer>
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
    <script src="https://cdn.ckeditor.com/ckeditor5/12.2.0/classic/ckeditor.js"></script>
    <script src="/js/blog_dashboard.js"></script>
</body>