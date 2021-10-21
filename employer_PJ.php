<?php

    include './func/cre.php';
    $model = new Model;
    if (isset($_SESSION['role']) && $_SESSION['role'] == 3) {

        $companyID = $_SESSION['companyid'];
        $company = $model->getCompanyOverview($companyID);
        $createJog = $model->createJob();
        
        $companyID = $_SESSION['companyid'];
        $company = $model->getCompanyOverview($companyID);
    }
    
    $experience = $model->getExperience();
    $industry = $model->getIndustry();
    $level = $model->getLevel();
    $location = $model->getLocation();
    $salary = $model->getSalary();
    $type = $model->getType();

    $createJog = $model->createJob();

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
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/css/style.css">
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
                    <a href="" class="active"><span><i class="fa fa-home"></i></span>
                        <span>Overview</span></a>
                </li>
                <li>
                    <a href="" class="active"><span><i class="fa fa-info-circle"></i></span>
                        <span>Company Detail</span></a>
                </li>
                <li>
                    <a href="" class="active"><span><i class="fa fa-heart"></i></span>
                        <span>Favorite Resumes</span></a>
                </li>
                <li>
                    <a href="" class="active"><span><i class="fa fa-edit" aria-hidden="true"></i></span>
                        <span>Post Jobs</span></a>
                </li>
                <li>
                    <a href="" class="active"><span><i class="fa fa-clipboard" aria-hidden="true"></i></span>
                        <span>Jobs Management</span></a>
                </li>
                <li>
                    <a href="" class="active"><span><i class="fas fa-sign-out-alt"></i></span>
                        <span>Logout</span></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Sidebar -->

    <div class="main-content">
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
            <h2 class="dash-title">Post Jobs</h2>

            <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 3):?>
            <form action="" method="post">

                <div class="form-wrapper">

                    <div class="input-form">

                        <div class="input-field">
                            <label for="">Job Title</label>
                            <input type="text" class="input" name="title">
                        </div>

                        <!-- Get Company Overview -->
                        <div class="input-field">
                            <label for="">Job from Company</label>
                            <div class="custom-select">
                                <select name="company">
                                    <!-- Late put company name here acording to session that user logged in -->
                                    <option value="0" selected>Choose company</option>

                                    <option value="<?php echo $company['id']; ?>">
                                        <?php echo $company['companyname']; ?> </option>

                                </select>
                                <span class="custom-arrow"></span>
                            </div>
                        </div>

                        <div class="input-field">
                            <label for="">Industry</label>
                            <div class="custom-select">
                                <select name="industry">

                                    <option value="0" selected>Choose industry</option>

                                    <?php foreach($industry as $i):  ?>

                                    <option value="<?php echo $i['id']; ?>"> <?php echo $i['industry']; ?></option>

                                    <?php endforeach; ?>

                                </select>
                                <span class="custom-arrow"></span>
                            </div>
                        </div>

                        <div class="input-field">
                            <label for="">Salary</label>
                            <div class="custom-select">
                                <select name="salary">

                                    <option value="0" selected>Choose salary</option>

                                    <?php foreach($salary as $s):  ?>

                                    <option value="<?php echo $s['id']; ?>"> <?php echo $s['salary']; ?></option>

                                    <?php endforeach; ?>

                                </select>
                                <span class="custom-arrow"></span>
                            </div>
                        </div>

                        <div class="input-field">
                            <label for="">Experience Level</label>
                            <div class="custom-select">
                                <select name="experience">

                                    <option value="0" selected>Choose experience</option>

                                    <?php foreach($experience as $e):  ?>

                                    <option value="<?php echo $e['id']; ?>"> <?php echo $e['experienceyear']; ?> year
                                    </option>

                                    <?php endforeach; ?>

                                </select>
                                <span class="custom-arrow"></span>
                            </div>
                        </div>

                        <div class="input-field">
                            <label for="">Type</label>
                            <div class="custom-select">
                                <select name="type">

                                    <option value="0" selected>Choose type</option>

                                    <?php foreach($type as $t):  ?>

                                    <option value="<?php echo $t['id']; ?>"> <?php echo $t['type']; ?></option>

                                    <?php endforeach; ?>

                                </select>
                                <span class="custom-arrow"></span>
                            </div>
                        </div>

                        <div class="input-field">
                            <label for="">Position</label>
                            <div class="custom-select">
                                <select name="level">

                                    <option value="0" selected>Choose possition</option>

                                    <?php foreach($level as $l):  ?>

                                    <option value="<?php echo $l['id']; ?>"> <?php echo $l['level']; ?></option>

                                    <?php endforeach; ?>

                                </select>
                                <span class="custom-arrow"></span>
                            </div>
                        </div>

                        <div class="input-field">
                            <label for="">Location</label>
                            <div class="custom-select">
                                <select name="location">

                                    <option value="0" selected>Choose location</option>

                                    <?php foreach($location as $lo):  ?>

                                    <option value="<?php echo $lo['id']; ?>"> <?php echo $lo['location']; ?></option>

                                    <?php endforeach; ?>

                                </select>
                                <span class="custom-arrow"></span>
                            </div>
                        </div>

                        <div class="input-field">
                            <label for="">Application Due Date</label>
                            <input type="date" class="input" name="enddate">
                        </div>

                        <div class="input-field">
                            <label for="">Job Description</label>
                            <textarea class="textarea" name="description"></textarea>
                        </div>

                        <div class="input-field">
                            <label for="">Requirements</label>
                            <textarea class="textarea" name="requirements"></textarea>
                        </div>

                        <div class="input-field">
                            <input type="submit" value="Post" class="btn" name="submit">
                        </div>

                    </div>
                </div>

            </form>

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