<?php 

	include './func/cre.php';

	$model = new Model;

	$jobid = $_GET['id'];
    if (isset($_SESSION['role']) && $_SESSION['role'] == 3) {
	    $delete = $model->deleteJob($jobid);
    }else{
        $delete = false;
    }

    if($delete){

        echo "<script>alert('delete successfully');</script>";
        echo "<script>window.location.href = 'employer_JM.php';</script>";

    }else{
        echo "<script>alert('You're not suppose to do this');</script>";
    }

?>