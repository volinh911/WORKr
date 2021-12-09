<!doctype html>
<html lang="en">

<head>
    <?php include ('./includes/head.php');?>
    <link rel="stylesheet" href="/css/style.css">


</head>

<body>

    <?php include ('./includes/nav.php');?>
    <!--end of navbar-->

    <div class="jumbotron jumbotron-fluid">
        <div class="container mt-5">
            <h2 class="text-center">Contact Us Now</h2>
            <div class="row ">
                <div class="col-md-6 mt-5 form-group">
                    <label for="type">Feedback Type</label>
                    <div class="input-group">
                        <select class="custom-select">
                            <option selected></option>
                            <option value="Billing">Billing</option>
                            <option value="Technical">Technical/Website Issue</option>
                            <option value="Login Issue">Login/Register Isssue</option>
                            <option value="Feedback">Feedback</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mt-5 form-group">
                    <label for="services">Staffing Services</label>
                    <div class="input-group">
                        <select class="custom-select">
                            <option selected></option>
                            <option value="Office Team">Office Team</option>
                            <option value="Creative Group">Creative Group</option>
                            <option value="WORKr Finance & Accounting">WORKr Finance & Accounting</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12 mt-5 form-group">
                    <label for="brief">Brief Description</label><br>
                    <textarea class="form-control"></textarea>
                </div>
                <div class="col-md-6 mt-5 form-group">
                    <label for="fullname">Full Name</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-6 mt-5 form-group">
                    <label for="office">Office you work with, if any</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-6 mt-3 form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control">
                </div>
                <div class="col-md-6 mt-3 form-group">
                    <label for="phone">Business Phone</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <button type="submit" class="btn bg-sienna text-white mt-4 mx-auto d-block">Submit Now</button>
        </div>
    </div>
    <!-- Footer -->
    <?php include ('./includes/footer.php');?>
    <!-- Footer -->
</body>

</html>