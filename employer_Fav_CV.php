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
                    <a href="employer_OV.php" class="active"><span><i class="fa fa-home"></i></span>
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
            <h2 class="dash-title">Jobs Management</h2>

            <section class="recent">
                <div class="activity-grid">
                    <div class="activity-card">
                        <div class="table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Job Seeker</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="">Your Local Bread</a></td>
                                        <td>
                                            <a href="" class="option success mr-2">View</a>
                                            <a href="" class="option warning">Remove</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="summary">
                        <div class="summary-card">

                            <div class="summary-single">
                                <span class="fa fa-heart"></span>
                                <div>
                                    <h5>24</h5>
                                    <small>Favorite CVs</small>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

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
    <!--end of footer-->

</body>