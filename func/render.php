<?php

function renderMoreBlog($blog,$smallText) {

    echo "<div class='col-lg-4 col-md-6'>
    <div class='card border rounded-2 shadow advice mt-4' style='width: 20rem;'>

        <img src={$blog['image']} class='card-img-top' alt=''    >

        <div class='card-body'>

            <h5 class='card-title'>{$blog['title']}</h5>

            <p class='card-text'> {$blog['authorname']} | <small>
                    {$blog['datecreated']}</small></p>

            <p> $smallText </p>

            <a href='blogdetail.php?id={$blog['id']}'><small class='float-right'><i
                        class='fa fa-arrow-right' aria-hidden='true'></i> Read More</small></a>

        </div>
    </div>
</div>";

}

function renderBlogDetail($blog){

    echo "
        <div class='container mt-5 '>
            <h2 class='text-center'> {$blog['title']} </h2>
            <p class='mt-4 mb-4'>By {$blog['authorname']} on {$blog['datecreated']} </p>
            <div class='picture'>
                <img class='d-block mx-auto img-fluid' src={$blog['image']} alt=''>
            </div>
            <div class='blog-content mt-5'>
                <p> {$blog['content']} </p>
            </div>
        </div>";

}

function renderBlogList($blog, $smallText){

    echo "
    <div class='col-lg-4 col-md-6 pt-4'>
    <div class='card border rounded-2 shadow advice' style='width: 25rem;'>

        <img src={$blog['image']} class='card-img-top' alt='    '>

        <div class='card-body'>

            <h5 class='card-title'> {$blog['title']} </h5>

            <p class='card-text'> {$blog['authorname']} |
                <small> {$blog['datecreated']} </small>
            </p>

            <p> $smallText </p>

            <a href='blogdetail.php?id={$blog['id']}'>
                <small class='float-right'><i class='fa fa-arrow-right' aria-hidden='true'></i> Read More</small></a>
                
        </div>
    </div>
</div>";

}

function renderBlogListAdmin($blog){

    echo"
    <tr>
    <td>{$blog['id']}</td>
    <td>{$blog['title']}</td>
    <td>{$blog['userid']}</td>
    <td>{$blog['datecreated']}</td>
    <td><a href='./admin_dashboard_delete.php?id={$blog['id']}' class='delete'>Delete</a></td>
    <td><a href='./admin_dashboard_edit.php?id={$blog['id']}' class='edit'>Edit</a></td>
    </tr>";

}

function renderEditBlogAdmin($blog){
    echo "                               
        <form action='' method='POST' enctype='multipart/form-data'>

        <!-- Input TITLE -->
        <div>
            <label for='title'>Title</label><br>
            <input type='text' name='title' id='' class='text-input' value = '{$blog['title']}'><br>
        </div>

        <!-- Input AUTHOR -->
        <div>
            <label for='author'>Author</label><br>
            <input type='text' name='author' id='' class='text-input' value = '{$blog['authorname']}'><br>
        </div>

        <!-- Input BODY -->
        <div>
            <label for='body'>Body</label>
            <textarea name='body' id='body' class='text-input'>{$blog['content']}</textarea>
        </div>

        <!-- Input IMAGE -->
        <div>
            <label for='Image'>Image</label><br>
            <input type='file' name='image' class='text-input'>
        </div>

        <button type='submit' name='update'> Update Blog</button>
    </form>";
}

function renderJobList($job){
    echo "
    <div class='row'>
    <div class='col-md-10 border-top border-bottom '>
        <div class='jobs d-flex align-items-center mt-3 mb-3'>
            <div class='card' style='width: 20rem;'>

                <img src=' {$job['logo']} ' class='card-img-top' alt='...'>

            </div>

            <div class='card_content w-100 ml-3 d-flex justify-content-between align-items-end'>
                <div class='job_info'>

                <a href='job_details.php?id={$job['jobid']}'>

                <h5 class='text-danger'> {$job['title']} </h5> 

                </a>

                    <h6> {$job['companyname']} </h6>
                    <h6 class=' text-warning'><span><i class='fas fa-dollar-sign'></i></span>
                        {$job['salary']} </h6>
                    <h6><i class='fas fa-map-marker-alt'></i> {$job['location']} </h6>
                    <div class='treatment'>
                        <ul class='d-flex'>
                            <li><i class='fas fa-medkit'></i> Health Insurance</li>
                            <li><i class='fas fa-star-of-life'></i> Medical Services</li>
                        </ul>
                    </div>
                </div>
                <div class='details'>
                    <p><i class='far fa-heart mr-2' aria-hidden='true'></i>Add to favorite list</p>
                    <p><i class='far fa-calendar-minus mr-2'></i> {$job['enddate']} </p>
                </div>
            </div>
        </div>
    </div>
</div>";

}
?>