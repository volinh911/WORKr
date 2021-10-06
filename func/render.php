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

?>