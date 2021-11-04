<?php 

	include './func/cre.php';

	$model = new Model;

	$resumeid = $_GET['id'];
    if (isset($_SESSION['role']) && $_SESSION['role'] == 3) {
	    $delete = $model->deleteFavoriteResume($resumeid);
    }else{
        $delete = false;
    }

    if($delete){

        echo "<script>alert('delete successfully');</script>";
        echo "<script>window.location.href = 'employer_Fav_CV.php';</script>";

    }else{
        echo "<script>alert('You're not suppose to do this');</script>";
    }

?>