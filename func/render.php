<?php

// ------------------------------------- RENDER BLOGS ------------------------------------- //

    function renderMoreBlog($blog,$smallText) {

        echo "
        <div class='col-lg-4 col-md-6'>
            <div class='card border rounded-2 shadow advice h-100 mt-4' style='width: 20rem;'>

                <img src={$blog['image']} class='card-img-top' alt=''    >

                <div class='card-body'>

                    <h5 class='card-title font-weight-bolder' style='height: 3.5rem; font-size: 1rem;'> {$blog['title']} </h5>

                    <p class='card-text'> {$blog['authorname']} |
                        <small> {$blog['datecreated']} </small>
                    </p>

                    <p>$smallText ... </p>

                    <a href='blogdetail.php?id={$blog['id']}'>
                        <small class='float-right'><i class='fa fa-arrow-right' aria-hidden='true'></i> Read More</small></a>
                            
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
            <div class='card border rounded-2 shadow advice h-100' style='width: 25rem;'>

                <img src={$blog['image']} class='card-img-top' alt='    '>

                <div class='card-body'>

                    <h5 class='card-title font-weight-bolder' style='height: 3rem; font-size: 1.3rem;'> {$blog['title']} </h5>

                    <p class='card-text'> {$blog['authorname']} |
                        <small> {$blog['datecreated']} </small>
                    </p>

                    <p>$smallText ... </p>

                    <a href='blogdetail.php?id={$blog['id']}'>
                        <small class='float-right'><i class='fa fa-arrow-right' aria-hidden='true'></i> Read More</small></a>
                        
                </div>
            </div>
        </div>";

    }

// ------------------------------------- END RENDER BLOGS ------------------------------------- //

// ------------------------------------- RENDER ADMIN DASHBOARD ------------------------------------- //

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

// ------------------------------------- END RENDER ADMIN DASHBOARD ------------------------------------- //

// ------------------------------------- RENDER JOBLIST AND JOBDETAIL ------------------------------------- //

    function renderJobList($job, $favoriteJob){

        $favorite = '';

        // var_dump($favoriteJob[0]['jobid']);
        foreach ($favoriteJob as $favojob) {

            if($favojob['jobid'] == $job['jobid']){
                $favorite .= "<p> Favorited </p>";
            }else{
                $favorite .= "";
            }

        }

        echo "
        <hr>
        <div class='row'>
            <div class='col-md-12'>
                <div class='jobs d-flex align-items-center mt-3 mb-3'>
                    <div class='card' style='width: 170px;'>
                        <img src=' {$job['logo']} ' class='card-img-top' style='height: 150px; width: 100%; object-fit: cover;' alt='...'>
                    </div>

                        <div class='card_content w-100 ml-3 d-flex justify-content-between align-items-end'>
                            <div class='job_info'>

                                <a href='job_details.php?id={$job['jobid']}'>

                                <h5 class='text-danger' style='margin-left: 12px;'> {$job['title']} </h5> 

                                </a>

                                    <h6 style='margin-left: 12px;'> {$job['companyname']} </h6>
                                    <h6 class=' text-warning' style='margin-left: 12px;'><span><i class='fas fa-dollar-sign'></i></span>
                                        {$job['salary']} </h6>
                                    <h6 style='margin-left: 12px;'><i class='fas fa-map-marker-alt'></i> {$job['location']} </h6>
                                    <div class='treatment'>
                                        <ul class='d-flex'>
                                            <li><i class='fas fa-medkit'></i> Health Insurance</li>
                                            <li><i class='fas fa-star-of-life'></i> Medical Services</li>
                                        </ul>
                                    </div>

                            </div>

                            <div class='details'>
                                {$favorite}
                                <p><i class='far fa-calendar-minus mr-2'></i> {$job['enddate']} </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>";

    }

    function renderJobDetail($job, $company, $favoriteJob, $favoriteCompany){

        $appfavo = "";
        if($favoriteJob == true){

            $appfavo .= "<button type='submit' class='btn btn-danger text-white' name='apply'><a style='color: white;' href ='{$job['website']}'>Apply</a></button>
                        <button type='submit' class='btn btn-outline-danger love-btn' name='favorite'><i
                        class='far fa-heart' aria-hidden='true'></i> Add to favorite list</button>";

        }else {

            $appfavo .="<button type='submit' class='btn btn-danger text-white' name='apply'><a href ='{$job['website']}'>Apply</a></button>
                        <button type='submit' class='btn btn-outline-danger love-btn' name='favorite'><i
                        class='far fa-heart' aria-hidden='true'></i> Favorited </button>";

        }

        $companyfavo = "";
        if($favoriteCompany == true){

            $companyfavo .= "<button type='submit' class='btn btn-outline-danger love-btn mb-3' name = 'favoritecompany'><i class='far fa-heart' aria-hidden='true'></i> Add to favorite list </button>";

        }else{

            $companyfavo .= "<button type='submit' class='btn btn-outline-danger love-btn mb-3' name = 'favoritecompany'><i class='far fa-heart' aria-hidden='true'></i> Favorited </button>";

        }

        echo"
        <div class='tab-content' id='nav-tabContent'>
        <div class='tab-pane fade show active' id='job-detail' role='tabpanel'>
            <!-- Job title -->
            <div class='container mt-3'>
                <div class='row'>
                    <div class='col'>
                        <div class='jobs d-flex align-items-center mt-3 mb-3'>
                            <div class='card' style='width:150px;'>
                                <img src='{$job['logo']}' class='card-img-top' style='height: 150px; width: 100%; object-fit: cover;' alt='...'>
                            </div>
                            <div class='card_content w-100 ml-3 d-flex justify-content-between align-items-end'>
                                <div class='job_info'>
                                    <h3 class='text-danger'> {$job['title']} </h3>
                                    <h6> {$job['companyname']} </h6>
                                    <h6 class=' text-success'><span><i class='fas fa-dollar-sign'></i></span>
                                        {$job['salary']} </h6>
                                    <h6><i class='fas fa-map-marker-alt'></i> {$job['location']} </h6>
                                </div>
                                <div class='details'>
                                
                                <form action='' method='post'>

                                    {$appfavo}

                                </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class='container  mt-4'>
                <div class='row'>
                    <div class='col-md-8'>
                        <div class='job-description '>
                            <h3>Description</h3>
                            <p> {$job['description']} </p>
                        </div>
                        <div class='job-requirement'>
                            <h3>Requirement</h3>
                            <p> {$job['requirements']} </p>
                        </div>
                    </div>
                    <div class='col-md-4 '>
                        <div class='summary offset-2 mt-3 '>
                            <div class='card rounded-0' style='width: 18rem;'>
                                <ul class='list-group list-group-flush'>
                                    <li class='list-group-item'>
                                        <i class='fa fa-calendar mr-2' aria-hidden='true'></i>
                                        {$job['enddate']}
                                    </li>
                                    <li class='list-group-item'>
                                        <i class='fas fa-layer-group mr-2'></i> {$job['level']}
                                    </li>
                                    <li class='list-group-item'>
                                        <i class='fas fa-briefcase mr-2'></i> {$job['industry']}
                                    </li>
                                    <li class='list-group-item'>
                                        <i class='fas fa-flag mr-2'></i> {$job['experienceyear']}
                                        year(s) of experience
                                    </li>
                                    <li class='list-group-item'>
                                        <i class='fas fa-language mr-2'></i> {$job['type']}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class='tab-pane fade' id='company'>
            <div class='container mt-3'>
                <div class='row'>
                    <div class='col-md-12 '>
                        <div class='jobs d-flex align-items-center mt-3 mb-3'>
                            <div class='card' style='width:150px;'>
                                <img src='{$job['logo']}' class='card-img-top' style='height: 150px; width: 100%; object-fit: cover;' alt='...'>
                            </div>
                            <div class='card_content w-100 ml-3 d-flex justify-content-between align-items-end'>
                                <div class='job_info'>
                                    <h3 class='text-danger'>{$company['companyname']}</h3>
                                    <h6>Location: <i class='fas fa-map-marker-alt text-black-50'></i> {$company['address']} </h6>
                                    <ul class='d-flex'>
                                        <li class='mr-3'><i class='fa fa-users' aria-hidden='true'></i> Company size: {$company['size']} </li>
                                        <li class='mr-3'><i class='fa fa-users' aria-hidden='true'></i> Company size: {$company['applyemail']} </li>
                                        <li><i class='fas fa-gamepad'></i> {$company['website']} </li>
                                    </ul>
                                </div>
                            </div>
                            </div>  
                                <div class='details float-right'>

                                    <form action='' method='post'>
                                        {$companyfavo}
                                    </form>

                                </div>      
                            </div>
                        </div>
                    </div>
                </div>
                <div class='treatment'>
                    <h6 class='text-bold'>{$company['companydescription']} </h6>
                </div>
            </div>
        </div>";
    }

    function renderSearchResult($result){
        echo "
        <hr>
        <div class='row'>
            <div class='col-md-12'>
                <div class='jobs d-flex align-items-center mt-3 mb-3'>
                    <div class='card' style='width: 170px;'>
                        <img src=' {$result['logo']} ' class='card-img-top' style='height: 150px; width: 100%; object-fit: cover;' alt='...'>
                    </div>

                    <div class='card_content w-100 ml-3 d-flex justify-content-between align-items-end'>
                        <div class='job_info'>
                            <a href='job_details.php?id={$result['jobid']}'>
                                <h5 class='text-danger' style='margin-left: 12px;'> {$result['title']} </h5> 
                            </a>
                                <h6 style='margin-left: 12px;'> {$result['companyname']} </h6>
                                <h6 class=' text-warning' style='margin-left: 12px;'><span><i class='fas fa-dollar-sign'></i></span>
                                    {$result['salary']} </h6>
                                <h6 style='margin-left: 12px;'><i class='fas fa-map-marker-alt'></i> {$result['location']} </h6>
                                <div class='treatment'>
                                    <ul class='d-flex'>
                                        <li><i class='fas fa-medkit'></i> Health Insurance</li>
                                        <li><i class='fas fa-star-of-life'></i> Medical Services</li>
                                    </ul>
                                </div>
                        </div>

                        <div class='details'>
                            <p><i class='far fa-calendar-minus mr-2'></i> {$result['enddate']} </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>";
    }


// ------------------------------------- END RENDER JOBLIST AND JOBDETAIL ------------------------------------- //

// ------------------------------------- RENDER EMPLOYER DASHBOARD ------------------------------------- //

    function renderEmployerJoblist($job){
        echo "
            <tr>

            <td> {$job['title']} </td>
            <td> {$job['startdate']} </td>
            <td> {$job['enddate']} </td>

            <td>
                <a href='./job_details.php?id={$job['jobid']}' class='option success'>View</a>
                <a href='./employer_JM_delete.php?id={$job['jobid']}' class='option warning'>Delete</a>
            </td>

        </tr>";
    }

// ------------------------------------- END RENDER EMPLOYER DASHBOARD ------------------------------------- //

// ------------------------------------- RENDER JOBSEEKER DASHBOARD ------------------------------------- //

    function renderJobseekerFavoriteJob($job){
        echo "                            
            <tr>

                <td> {$job['title']} </td>
                <td> {$job['startdate']} </td>
                <td> {$job['enddate']} </td>

                <td>
                    <a href='./job_details.php?id={$job['jobid']}' class=' option success'>View</a>
                    <a href='./jseeker_dashboard_fav_j_delete.php?id={$job['jobid']}' class='option warning'>Delete</a>
                </td>

            </tr>";
    }

    function renderJobseekerFavoriteCompany($company){

        echo "                                
        <div class='c-box'>
        <a href='#'>
            <img src='{$company['logo']}' alt=''>
            <h3> {$company['companyname']} </h3>

        </a>
        <a href='./jseeker_dashboard_fav_c_delete.php?id={$company['companyid']}' class='option warning'>Delete</a>
    </div>";

    }

// ------------------------------------- END RENDER JOBSEEKER DASHBOARD ------------------------------------- //



// function renderDropListSearch($list,$id)
// {

// $options = "";

// foreach ($list as $item) {
// $options .= "<option ";
//         if (isset($id) && $id == $item['id']) 
//                 $options .= 'selected';
//         $options .= " value={$item['id']}> {$item['companyname']}</option>";
// }
// echo "<div class='col-md-4 mt-3'>
//     <div class='input-group'>
//         <select class='custom-select' id='inputGroupSelect04' aria-label='Example select with button addon'
//             name='companyid'>
//             <option value='0' selected>Choose your Company</option>
//             {$options}

//         </select>
//     </div>
// </div>
// ";
// }

?>