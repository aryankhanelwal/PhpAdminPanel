<?php
include("headerafter.php");


if (!isset($_SESSION['id'])) {
    header("location:login.php");
}

if (isset($_SESSION['error']) && $_SESSION['error'] == 1) {
    $id                             =       $_SESSION['id'];
    $name                           =       $_SESSION['name'];
    $email                          =       $_SESSION['email'];
    $password                       =       $_SESSION['password'];
    $Mobile                         =       $_SESSION['Mobile'];
    $user                           =       $_SESSION['user'];
    $state                          =       $_SESSION['state'];
    $city                           =       $_SESSION['city'];
    $Gender                         =       $_SESSION['Gender'];
    $sports                         =       $_SESSION['sports'];


    $nameErr                        =       $_SESSION['nameErr'];
    $nameError                      =       $_SESSION['nameError'];
    $emailErr                       =       $_SESSION['emailErr'];
    $passErr                        =       $_SESSION['passErr'];
    $mobileErr                      =       $_SESSION['mobileErr'];
    $userErr                        =       $_SESSION['userErr'];
    $moErr                          =       $_SESSION['moErr'];
    $mobileErr1                     =       $_SESSION['mobileErr1'];
    $userErr                        =       $_SESSION['userErr'];
    $stateErr                       =       $_SESSION['stateErr'];
    $cityErr                        =       $_SESSION['cityErr'];
    $genErr                         =       $_SESSION['genErr'];
    $soErr                          =       $_SESSION['soErr'];
    $hobbyError                     =       $_SESSION['hobbyError'];



    unset($_SESSION['name']);
    unset($_SESSION['email']);
    unset($_SESSION['password']);
    unset($_SESSION['mobile']);
    unset($_SESSION['state']);
    unset($_SESSION['city']);
    unset($_SESSION['Gender']);
    unset($_SESSION['sports']);


    unset($_SESSION['nameErr']);
    unset($_SESSION['nameError']);
    unset($_SESSION['emailErr']);
    unset($_SESSION['mobileErr']);
    unset($_SESSION['userErr']);
    unset($_SESSION['moErr']);
    unset($_SESSION['mobileErr1']);
    unset($_SESSION['passErr']);
    unset($_SESSION['userErr']);
    unset($_SESSION['stateErr']);
    unset($_SESSION['cityErr']);
    unset($_SESSION['genErr']);
    unset($_SESSION['soErr']);
    unset($_SESSION['hobbyError']);
    unset($_SESSION['error']);

} 
else {
    $name                           =       '';
    $email                          =       '';
    $password                       =       '';
    $user                           =       '';
    $Mobile                         =       '';
    $state                          =       '';
    $city                           =       '';
    $Gender                         =       '';
    $sports                         =       array();


    $nameErr                        =       '';
    $nameError                      =       '';
    $emailErr                       =       '';
    $mobileErr                      =       '';
    $moErr                          =       '';
    $mobileErr1                     =       '';
    $userErr                        =       '';
    $passErr                        =       '';
    $stateErr                       =       '';
    $cityErr                        =       '';
    $genErr                         =       '';
    $soErr                          =       '';
    $hobbyError                     =       '';



}

?>



<link rel="stylesheet" href="css/user_add.css">

<div class="container">
    <form action="user_show.php" method="post" autocomplete="off" enctype="multipart/form-data">
        <table>
            <tr>
                <td><label>Name:</label>

                    <input type="text" placeholder="Enter Your Name" name="name" value="<?php echo $name ?>">
                    <p>
                        <?php echo $nameErr; ?>
                        <?php echo $nameError; ?>
                    </p>
                </td>
            </tr>
            <tr>
                <td><label>Email:</label>
                    <input type="email" placeholder="Enter Your Email" name="email" value="<?php echo $email ?>">
                    <p>
                        <?php echo ($emailErr); ?>
                    </p>
                </td>
            </tr>
            <tr>
                <td><label>User:</label>

                    <input type="text" placeholder="Enter UserName" name="user" value="<?php echo $user ?>">
                    <p>
                        <?php echo ($userErr); ?>
                    </p>
                </td>
            </tr>
            <tr>
                <td><label>Password:</label> <input type="password" placeholder="Enter Your Password" name="password"
                        value="<?php echo $password; ?>">
                    <p>
                        <?php echo $passErr; ?>
                    </p>

                </td>

            </tr>


            <tr>
                <td style="padding-bottom: 13px;"><label>Mobile:</label> <input type="text" placeholder="Enter Your Mobile" name="Mobile"
                        value="<?php echo $Mobile; ?>">
                    <p>
                        <?php echo $mobileErr; ?>
                        <?php echo $mobileErr1; ?>
                        <?php echo $moErr; ?>

                    </p>

                </td>
            </tr>
            <tr style="margin-bottom: 25px;">
                <td>

                    <label>City:</label>
                    <select name="city" class="city" style="font-size: 18px;">
                            <option value="">City</option>
                            <option value="jaipur" <?php if ($city == "jaipur") { ?> selected <?php } ?>>Jaipur</option>
                            <option value="tonk" <?php if ($city == "tonk") { ?> selected <?php } ?>>Tonk</option>
                            <option value="chennai" <?php if ($city == "chennai") { ?> selected <?php } ?>>Chennai</option>
                            <option value="pune" <?php if ($city == "pune") { ?> selected <?php } ?>>pune</option>
                    </select>
                        <br>
                    <?php echo $cityErr; ?>

                </td>

                <td>
                    <label>State:</label>
                    <select name="state"style="font-size: 18px;">
                        <option value="">State</option>
                        <option value="Rajasthan" <?php if ($state == "Rajasthan") { ?>selected <?php } ?>>Rajasthan
                        </option>
                        <option value="Bihar" <?php if ($state == "Bihar") { ?>selected <?php } ?>>Bihar</option>
                        <option value="Punjab" <?php if ($state == "Punjab") { ?> selected <?php } ?>>Punjab</option>
                        <option value="Tamil" <?php if ($state == "Tamil") { ?> selected <?php } ?>>Tamil</option>
                    </select>
                    <p>
                        <?php echo $stateErr; ?>
                    </p>
                </td>
</tr>
<tr>
                <td style="padding-top: 13px;" >
                    <label>Gender</label>
                    <input type="radio" name="Gender" <?php if ($Gender=="male") { ?> checked= "true"
                    <?php } ?> value="male">
                    <label>Male</label>
                    <input type="radio" name="Gender" <?php if ($Gender=="female") { ?> checked="true"
                    <?php } ?> value="female">
                    <label>Female</label><br />
                    <p>
                    <?php echo $genErr; ?>
                    </p>
                    <td>
                        
            </tr>
            <tr>
                <td style="padding:10px"><label>Hobby:</label>
                    <input type="checkbox" name="sports[]" <?php if (in_array('Books', $sports)){ ?> checked <?php } ?> value="Books">
                    <label> Books</label>
                    <input type="checkbox" name="sports[]" <?php if (in_array('cricket', $sports)){ ?> checked <?php } ?> value="cricket">
                    <label>cricket</label>

                </td>
            </tr>
            <tr>
                <td style="padding-left:89px;"> 
                <input type="checkbox" name="sports[]" <?php if (in_array('football', $sports)){ ?> checked <?php } ?>
                    value="football">
                    <label>Football</label>
                    <input type="checkbox" name="sports[]" <?php if (in_array('Hockey', $sports)){ ?> checked <?php } ?>
                    value="Hockey">
                    <label>Hockey</label>
                    
                    <p>
                            <?php echo $soErr; ?>
                            <?php echo $hobbyError; ?>
                        </p>
                </td>
                
            </tr>

            <tr>

                <td><input type="submit" name='submit'></td>
            </tr>
        </table>
    </form>
</div>



<?php

include("footer.php");
?>