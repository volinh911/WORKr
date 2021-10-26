<?php 

	include './func/cre.php';

	$model = new Model;

	$jobid = $_GET['id'];
    if (isset($_SESSION['role']) && $_SESSION['role'] == 2) {
	    $delete = $model->deleteFavoriteCompany($jobid);
    }else{
        $delete = false;
    }
    
    if($delete){

        echo "<script>alert('delete successfully');</script>";
        echo "<script>window.location.href = 'jseeker_dashboard_fav_c.php';</script>";

    }else{
        echo "<script>alert('You're not suppose to do this');</script>";
    }

?>