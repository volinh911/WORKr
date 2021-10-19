<?php 

include './func/cre.php';
$model = new Model;

if (isset($_SESSION['role']) && $_SESSION['role'] == 3) {
  $companyID = $_SESSION['companyid'];
  $company = $model->getCompanyOverview($companyID);
  $userid = $_SESSION['userid'];
  $postjobOV = $model->countTotalJob($userid);
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
                    <li><a href="" class="user-wrapper">
                            <img src="/images/user.jpg" width="40px" height="40px" alt="">
                            <div>
                                <h6 class="text-dark">User</h6>
                            </div>
                        </a></li>
                </ul>
            </nav>



        </header>


        <main>

          <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 3):?>

            <div class="container">

                <div class="overview-detail py-5">

                    <div class="overview-detail-header">
                        <h2>Profile</h2>
                    </div>

                    <div class="overview-profile py-5 bg-white">
                        <div class="employer-avt pl-5">
                            <img src="<?php echo $company['logo']; ?>" style="width: 300px; height:300px;" alt="">
                        </div>
                        <div class="employer-brief pl-5 align-self-center">
                            <div>
                                <h3 class="employer-name"><?php echo $company['companyname']; ?></h3>
                            </div>
                            <div class="employer-address">
                                <span><?php echo $company['address']; ?></span>
                            </div>
                            <div class="employer-description">
                                <span><?php echo $company['companydescription']; ?></span>
                            </div>
                            <div class="employer-edit">
                                <a href="" class="btn overview-button">Edit Details...</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="overview-detail py-5">
                    <div class="overview-detail-header">
                        <h2>Post Jobs</h2>
                    </div>
                    <div class="overview-content p-5 bg-white">
                        <div class="job-posting-sum">
                            <span>You have posted </span>
                            <span class="job-num text-large"><?php echo $postjobOV['count']; ?></span>
                            <span>recruitment seekings.</span>
                        </div>
                        <div class="job-posting-recent">
                            <span>Your most recent recruitment seeking was posted on: </span>
                            <span class="job-date text-large"><?php echo $postjobOV['startdate']; ?></span>
                        </div>
                        <div class="job-posting-option">
                            <a href="" class="btn overview-button">Make a Post</a>
                        </div>
                    </div>

                </div>

                <div class="overview-detail py-5">
                    <div class="overview-detail-header">
                        <h2>Favorite Resumes</h2>
                    </div>
                    <div class="overview-content p-5 bg-white">
                        <div class="favorite-sum">
                            <span>You have </span>
                            <span class="fav-num text-large">75</span>
                            <span>favorite resumes in your stocks.</span>
                        </div>
                        <div class="favorite-option">
                            <a href="" class="btn overview-button">Go Check</a>
                            <a href="" class="btn overview-button">Fetch More</a>
                        </div>
                    </div>

                </div>
            </div>

          <?php else: echo "<h1> You're not logged in or you're not an employer </h1>" ?>
          <?php endif; ?>

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
    <!--end of footer-->
</body>