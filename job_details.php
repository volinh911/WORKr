<?php
    include './func/cre.php';

    $model = new Model;
    
    if (isset($_GET['id'])) {

        $jobID = $_GET['id'];
        $job = $model->fetchDetailJob($jobID);

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
    <link rel="stylesheet" href="/css/job_details.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
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
    <!-- Navbar end -->

    <!-- jumbotron -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">

        </div>
    </div>
    <!-- jumbotron -->

    <div class="container">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-link active" data-toggle="tab" href="#job-detail" role="tab" aria-selected="true">Job
                    detail</a>
                <a class="nav-link" data-toggle="tab" href="#company" role="tab" aria-controls="company"
                    aria-selected="false">Company review</a>
            </div>
        </nav>
        <?php if(isset($_GET['id']) && $job != false): ?>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="job-detail" role="tabpanel">
                <!-- Job title -->
                <div class="container mt-3">
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="jobs d-flex align-items-center mt-3 mb-3">
                                <div class="card" style="width: 18rem;">
                                    <img src="<?php echo $job['logo']; ?>" class="card-img-top" alt="...">
                                </div>
                                <div class="card_content w-100 ml-3 d-flex justify-content-between align-items-end">
                                    <div class="job_info">
                                        <h3 class="text-danger"> <?php echo $job['title']; ?> </h3>
                                        <h6> <?php echo $job['companyname']; ?> </h6>
                                        <h6 class=" text-warning"><span><i class="fas fa-dollar-sign"></i></span>
                                            <?php echo $job['salary']; ?> </h6>
                                        <h6><i class="fas fa-map-marker-alt"></i> <?php echo $job['location']; ?> </h6>
                                    </div>
                                    <div class="details">
                                        <button type="submit" class="btn btn-warning text-white"> Apply</button>
                                        <button type="submit" class="btn btn-outline-warning love-btn"><i
                                                class="far fa-heart" aria-hidden="true"></i> Add to favorite
                                            list</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container  mt-4">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="job-description ">
                                <h3>Description</h3>
                                <p> <?php echo $job['description']; ?> </p>
                            </div>
                            <div class="job-requirement">
                                <h3>Requirement</h3>
                                <p> <?php echo $job['requirements']; ?> </p>
                            </div>
                        </div>
                        <div class="col-md-4 ">
                            <div class="summary offset-2 mt-3 ">
                                <div class="card rounded-0" style="width: 18rem;">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <i class="fa fa-calendar mr-2" aria-hidden="true"></i>
                                            <?php echo $job['enddate']; ?>
                                        </li>
                                        <li class="list-group-item">
                                            <i class="fas fa-layer-group mr-2"></i> <?php echo $job['level']; ?>
                                        </li>
                                        <li class="list-group-item">
                                            <i class="fas fa-briefcase mr-2"></i> <?php echo $job['industry']; ?>
                                        </li>
                                        <li class="list-group-item">
                                            <i class="fas fa-flag mr-2"></i> <?php echo $job['experienceyear']; ?>
                                            year/years of experience
                                        </li>
                                        <li class="list-group-item">
                                            <i class="fas fa-language mr-2"></i> <?php echo $job['type']; ?>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="company">
                <div class="container mt-3">
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="jobs d-flex align-items-center mt-3 mb-3">
                                <div class="card" style="width: 18rem;">
                                    <img src="/images/gameloft.jpg" class="card-img-top" alt="...">
                                </div>
                                <div class="card_content w-100 ml-3 d-flex justify-content-between align-items-end">
                                    <div class="job_info">
                                        <h3 class="text-danger">Gameloft Company</h3>
                                        <h6>Location: <i class="fas fa-map-marker-alt text-black-50"></i> Hồ Chí Minh
                                        </h6>
                                        <div class="treatment">
                                            <h6 class="text-bold">Company Infomation: </h6>
                                            <ul class="d-flex">
                                                <li class="mr-3"><i class="fa fa-users" aria-hidden="true"></i> Company
                                                    size: 100 - 200</li>
                                                <li><i class="fas fa-gamepad"></i> Major: Games</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="details">

                                        <button type="submit" class="btn btn-outline-warning love-btn"><i
                                                class="far fa-heart" aria-hidden="true"></i> Add to favorite
                                            list</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php else: ?>

        <h1>Job not found</h1>

        <?php endif ?>

    </div>


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