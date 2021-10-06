<?php 

	include './func/cre.php';

	$model = new Model;

	$id = $_GET['id'];
	$delete = $model->deleteBlog($id);

    if($delete){

        echo "<script>alert('delete successfully');</script>";
        echo "<script>window.location.href = 'admin_dashboard_blog.php';</script>";

    }

 ?>