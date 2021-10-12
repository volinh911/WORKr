<?php

    include './func/cre.php';
    $model = new Model;
    $company = $model->getCompany();
    $experience = $model->getExperience();
    $industry = $model->getIndustry();
    $level = $model->getLevel();
    $location = $model->getLocation();
    $salary = $model->getSalary();
    $type = $model->getType();

    $createJog = $model->createJob();
    var_dump($_POST['enddate']);
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
                <label for="">Job Title</label><br>
                <input type="text" name="title" id="" class="text-input"><br>
            </div>
            <div>
                <label for="">Description</label>
                <textarea name="description" id="description" class="text-input"></textarea>
            </div>
            <div>
                <label for="">Requirements</label>
                <textarea name="requirements" id="requirements" class="text-input"></textarea>
            </div>
            <div>
                <label for="">End Date</label>
                <input type="date" id="" name="enddate">
            </div>
            <div>
                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="company">
                    <option value="0" selected>Choose company</option>

                    <?php foreach($company as $c): ?>

                    <option value="<?php echo $c['id']; ?>"> <?php echo $c['name']; ?> </option>

                    <?php endforeach; ?>

                </select>
            </div>
            <div>
                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="industry">
                    <option value="0" selected>Choose industry</option>

                    <?php foreach($industry as $i):  ?>

                    <option value="<?php echo $i['id']; ?>"> <?php echo $i['name']; ?></option>

                    <?php endforeach; ?>

                </select>
            </div>
            <div>
                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="salary">
                    <option value="0" selected>Choose salary</option>

                    <?php foreach($salary as $s):  ?>

                    <option value="<?php echo $s['id']; ?>"> <?php echo $s['number']; ?></option>

                    <?php endforeach; ?>

                </select>
            </div>
            <div>
                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="experience">
                    <option value="0" selected>Choose experience</option>

                    <?php foreach($experience as $e):  ?>

                    <option value="<?php echo $e['id']; ?>"> <?php echo $e['experienceyear']; ?> year</option>

                    <?php endforeach; ?>

                </select>
            </div>
            <div>
                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="type">
                    <option value="0" selected>Choose type</option>

                    <?php foreach($type as $t):  ?>

                    <option value="<?php echo $t['id']; ?>"> <?php echo $t['name']; ?></option>

                    <?php endforeach; ?>

                </select>
            </div>
            <div>
                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="level">
                    <option value="0" selected>Choose level</option>

                    <?php foreach($level as $l):  ?>

                    <option value="<?php echo $l['id']; ?>"> <?php echo $l['name']; ?></option>

                    <?php endforeach; ?>

                </select>
            </div>
            <div>
                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="location">
                    <option value="0" selected>Choose location</option>

                    <?php foreach($location as $lo):  ?>

                    <option value="<?php echo $lo['id']; ?>"> <?php echo $lo['location']; ?></option>

                    <?php endforeach; ?>

                </select>
            </div>

            <button type="submit" name="submit">Add Job</button>
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