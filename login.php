<?php
include("header.php");
?>

<?php
error_reporting(E_ERROR);

if(isset($_SESSION['id']))
{
header("location:index.php");
    exit();
}


    
if (isset($_SESSION['error']) && $_SESSION['error'] == 1 ) {
    $user                       =   $_SESSION['user'];
    $userErr                    =   $_SESSION['userErr'];
    $passErr                    =   $_SESSION['passErr'];
    $password                   =   $_SESSION['password'];

    unset($_SESSION['userErr']);
    unset($_SESSION['passErr']);
    
}
else {
    $user           = '';
    $userErr        = '';
    $password       = '';
    $passErr        = '';
}

?>
<link rel="stylesheet" href="css/login.css">

<div class="container">
    
    <form action="login_validation.php" method="post">
        <?php if (isset($_GET['error'])) { ?>
            <p class="Err1"><?php echo $_GET['error']; ?></p>
            
            <?php } ?>
        <h2>Login Form</h2>

    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name=user value="<?php echo $user ?>" >
    <p class="Err"><?php echo ($userErr);?></p>
<br/>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" >
    <p class="Err"><?php echo ($passErr);?></p>

        <br/>
    <button type="submit">Login</button>
    
    
    
  </form>
</div>

<?php

include("footer.php");
?>