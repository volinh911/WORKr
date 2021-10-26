<?php 

	include './func/cre.php';

	$model = new Model;

	$id = $_GET['id'];
    if (isset($_SESSION['role']) && $_SESSION['role'] == 2) {
	    $delete = $model->deleteReview($id);
    }else{
        $delete = false;
    }

    if($delete){

        echo "<script>alert('delete successfully');</script>";
        echo "<script>window.location.href = 'jseeker_dashboard_review.php';</script>";

    }else{
        echo "<script>alert('You're not suppose to do this');</script>";
    }

?>