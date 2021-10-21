<?php 

	include './func/cre.php';

	$model = new Model;

	$jobid = $_GET['id'];
	$delete = $model->deleteJob($jobid);

    if($delete){

        echo "<script>alert('delete successfully');</script>";
        echo "<script>window.location.href = 'employer_JM.php';</script>";

    }

?>