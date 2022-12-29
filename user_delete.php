<?php include('config.php') ?>;
<?php
$id                         =   $_GET['id'];
$sql                        =   "DELETE FROM admin WHERE id='$id'";
$res                        =   mysqli_query($con,$sql);


if ($res =='') {
    echo ("error");
}
else {
    header('location:user_data.php');
}


    
?>

