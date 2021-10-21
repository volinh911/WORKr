<?php 

	include './func/cre.php';

	$model = new Model;

	$jobid = $_GET['id'];
	$delete = $model->deleteFavoriteJob($jobid);

    if($delete){

        echo "<script>alert('delete successfully');</script>";
        echo "<script>window.location.href = 'jseeker_dashboard_fav_j.php';</script>";

    }

?>