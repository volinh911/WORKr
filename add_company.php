<?php

    include './func/cre.php';
    $model = new Model;
    $createBlog = $model->createCompany();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
    <link rel="stylesheet" href="/css/dashboard.css">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <div class="container">
        <form action="" method="post">
            <div>
                <label for="company-name">Company Name</label><br>
                <input type="text" name="name" id="" class="text-input"><br>
            </div>
            <div>
                <label for="company-address">Company Address</label><br>
                <input type="text" name="address" id="" class="text-input"><br>
            </div>
            <div>
                <label for="company-website">Company Website</label><br>
                <input type="text" name="website" id="" class="text-input"><br>
            </div>
            <div>
                <label for="company-applyemail">Company Apply Email</label><br>
                <input type="text" name="applyemail" id="" class="text-input"><br>
            </div>
            <div>
                <label for="company-size">Company Size</label><br>
                <input type="text" name="size" id="" class="text-input"><br>
            </div>
            <div>
                <label for="company-logo">Company Logo</label><br>
                <input type="text" name="logo" id="" class="text-input"><br>
            </div>
            <div>
                <label for="body">Description</label>
                <textarea name="body" id="body" class="text-input"></textarea>
            </div>

            <button type="submit" name="submit">Add Company</button>
        </form>
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
    <script src="https://cdn.ckeditor.com/ckeditor5/12.2.0/classic/ckeditor.js"></script>
    <script src="/js/blog_dashboard.js"></script>
</body>

</html>