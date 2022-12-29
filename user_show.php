<?php 
include ('config.php');

session_start();

if (isset($_POST['submit'])) {
    $error              =   0;
    $name               =   $_POST['name'];
    $email              =   $_POST['email'];
    $password           =   $_POST['password'];
    $user               =   $_POST['user'];
    $Mobile             =   $_POST['Mobile'];
    $state              =   $_POST['state'];
    $city               =   $_POST['city'];
    $Gender             =   $_POST['Gender'];
    $sports             =   $_POST['sports'];



//name validation
    if ($name == '') {
        $_SESSION['nameErr'] = '*Please fill name';
        $error = 1;

    } elseif (ctype_alpha(str_replace(' ', '', $name)) == false) {
        $_SESSION['nameError'] = 'Only Words Please';
        $error = 1;
    } else {
        $_SESSION['nameErr'] = '';
        $_SESSION['nameError'] = '';
    }

//email validation
    if ($email == '') {
        $_SESSION['emailErr'] = '*Please fill email';
        $error = 1;
    } else {
        $_SESSION['emailErr'] = '';
    }

//password validation    
    if ($password == '') {
        $_SESSION['passErr'] = '*Please fill password';
        $error = 1;
    } else {
        $_SESSION['passErr'] = '';
    }

//mobile validation
if ($Mobile == '') {
    $_SESSION['moErr'] = '*Please fill Mobile';
    $error = 1;
} elseif (is_numeric($Mobile) == 0) {
    $_SESSION['mobileErr'] = '*Only Number ';
    $error = 1;
} elseif (strlen($Mobile) > 10 || strlen($Mobile) < 10) {
    $_SESSION['mobileErr1'] = '*10 digit only ';
    $error = 1;

} else {
    $_SESSION['moErr'] = '';
    $_SESSION['mobileErr'] = '';
    $_SESSION['mobileErr1'] = '';
}

//pass 
if ($password == '') {
    $_SESSION['passErr'] = '*Please fill password';
    $error = 1;
} else {
    $_SESSION['passErr'] = '';
}

 //user 
 if ($user == '') {
    $_SESSION['userErr'] = '*Please fill user';
    $error = 1;
}
else {
        $_SESSION['userErr'] = '';
}

//state
if ($state == '') {
    $_SESSION['stateErr'] = '*Please select state';
    $error = 1;
} else {
    $_SESSION['stateErr'] = '';
}

//city
if ($city == '') {
    $_SESSION['cityErr'] = '*Please select city';
    $error = 1;
} else {
    $_SESSION['cityErr'] = '';
}

//Gender
if ($Gender == '') {
    $_SESSION['genErr'] = '*Please select gender';
    $error = 1;
} else {
    $_SESSION['genErr'] = '';
}

//hobby Error 
if (!isset($_REQUEST['sports']) && $_REQUEST['sports'] == '') { //one is for true false and another one is for check
    $_SESSION['soErr'] = '*Hobby please';
    $sports = array();
    $error = 1;
} elseif (count($sports) < 2) {
    $_SESSION['hobbyError'] = 'Select 1 or more hobby';
    $error = 1;
} else {
    $sports = $_POST['sports'];
    $_SESSION['soErr'] = '';
    $_SESSION['hobbyError'] = '';

}


if ($error == 1) {
        $_SESSION['name']               =   $name;
        $_SESSION['email']              =   $email;
        $_SESSION['password']           =   $password;
        $_SESSION['Mobile']             =   $Mobile;
        $_SESSION['user']               =   $user;
        $_SESSION['state']              =   $state;
        $_SESSION['city']               =   $city;
        $_SESSION['Gender']             =   $Gender;
        $_SESSION['sports']             =   $sports;



        $_SESSION['error']              =   1;
            header("location:user_add.php");
    }
    else {

        $sports1                        =   implode(",", $sports);

        $sql= "INSERT INTO `admin`(`user`, `password`, `name`, `email`, `phone`,`city`,`state`,`Gender`,`Hobby`) 
        VALUES ('$user','$password','$name','$email','$Mobile','$city','$state','$Gender','$sports1')";

        if (mysqli_query($con, $sql)) {
            header("location:user_data.php");
        }
        
    }
    
}
else {
    header("location:index.php");

}



?>