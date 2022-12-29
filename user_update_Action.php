<?php include('config.php') ?>

<?php
if (isset($_POST['submit'])) {

    $id                 =   $_POST['id'];
    $name               =   $_POST['name'];
    $email              =   $_POST['email'];
    $password           =   $_POST['password'];
    $user               =   $_POST['user'];
    $Mobile             =   $_POST['Mobile'];
    $state              =   $_POST['state'];
    $city               =   $_POST['city'];
    $Gender             =   $_POST['Gender'];
    $sports             =   $_POST['sports'];
    $sports1            =   implode(",", $sports);

        $sql1 = "UPDATE `admin` SET `user`='$user',`password`='$password',`name`='$name',`email`='$email',`phone`='$Mobile',`city`='$city',`state`='$state',`Gender`='$Gender',`Hobby`='$sports1' WHERE `id` = '$id' ";

        $res1 = mysqli_query($con, $sql1);
        if ($res1 == "") {
            echo "error";
        } else {
         

            header("Location:user_data.php");
        }
    }

    




?>