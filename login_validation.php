<?php include('config.php') ?>
<?php
session_start();
if (isset($_POST['user']) && isset($_POST['password'])) {

    $error              =   0;
    $user               =   $_POST['user'];
    $password           =   $_POST['password'];

    if ($user == '') {
        $_SESSION['userErr']        =   '*Please fill user';
        $error = 1;
    }
    else {
        $_SESSION['userErr']        =   '';
    }
    //pass 
    if ($password == '') {
        $_SESSION['passErr']        =   '*Please fill password';
        $error = 1;
    } else {
        $_SESSION['passErr']        =   '';
    }

    if ($error==1) {
        $_SESSION['user']               =   $user;
        $_SESSION['password']           =   $password;
        $_SESSION['error']              =   1;

        header("location:login.php");

    } else {
        $sql = "SELECT * FROM admin WHERE user='$user' AND password='$password'";
        $res = mysqli_query($con, $sql);


        if (mysqli_num_rows($res) === 1) {

            $row = mysqli_fetch_assoc($res);

            $_SESSION['user']               =   $row['user'];
            $_SESSION['name']               =   $row['name'];
            $_SESSION['id']                 =   $row['id'];

            $auth                           =   1;

            header("Location: index.php");





        } else {

            
            header("location:login.php?error=Invalid user/Password");
            exit();    

        }
    }
}

else{

header("Location: index.php");

exit();

}

?>