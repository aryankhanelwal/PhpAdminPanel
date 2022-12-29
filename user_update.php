<?php
include('config.php');
include("headerafter.php");

$id                         =   $_GET['id'];
$sql                        =   "SELECT * From admin Where  id='$id'";
$res                        =   mysqli_query($con, $sql);
$fet                        =   mysqli_fetch_array($res);
$array                      =   explode(",", $fet['Hobby'])

?>
<link rel="stylesheet" href="css/user_add.css">
<div class="container">

    <form action="user_update_Action.php" method="post" autocomplete="off" enctype="multipart/form-data">
        <table>

            <tr>
                <td><label>Name:</label>

                    <input type="text" placeholder="Enter Your Name" name="name" value="<?php echo $fet['name'];
                    ?>" required>

                </td>
            </tr>
            <tr>
                <td><label>Email:</label>
                    <input type="email" placeholder="Enter Your Email" name="email" value="<?php echo $fet['email'] ?>"
                        required>

                </td>
            </tr>
            <tr>
                <td><label>User:</label>

                    <input type="text" placeholder="Enter UserName" name="user" value="<?php echo $fet['user'] ?>"
                        required>

                </td>
            </tr>
            <tr>
                <td><label>Password:</label> <input type="password" placeholder="Enter Your Password" name="password"
                        value="<?php echo $fet['password'] ?>" required>


                </td>

            </tr>


            <tr>


                <td style="padding-bottom: 13px;"><label>Mobile:</label> <input type="text" placeholder="Enter Your Mobile" name="Mobile"
                        value="<?php echo $fet['phone']; ?>" required >
                </td>

            </tr>
            <tr style="margin-bottom: 25px;">
                <td>

                    <label>City:</label>
                    <select name="city" style="font-size: 18px;">
                        <option value="">City</option>
                        <option value="jaipur" <?php if ($fet['city'] == "jaipur") { ?> selected <?php } ?>>Jaipur
                        </option>
                        <option value="tonk" <?php if ($fet['city'] == "tonk") { ?> selected <?php } ?>>Tonk</option>
                        <option value="chennai" <?php if ($fet['city'] == "chennai") { ?> selected <?php } ?>>Chennai
                        </option>
                        <option value="pune" <?php if ($fet['city'] == "pune") { ?> selected <?php } ?>>pune</option>

                    </select>

                </td>

                <td>
                    <label>State:</label>
                    <select name="state" style="font-size: 18px;">
                        <option value="">State</option>
                        <option value="Rajasthan" <?php if ($fet['state'] == 'Rajasthan') { ?>selected <?php } ?>>
                            Rajasthan
                        </option>
                        <option value="Bihar" <?php if ($fet['state'] == 'Bihar') { ?>selected <?php } ?>>Bihar</option>
                        <option value="Punjab" <?php if ($fet['state'] == 'Punjab') { ?> selected <?php } ?>>Punjab
                        </option>
                        <option value="Tamil" <?php if ($fet['state'] == 'Tamil') { ?> selected <?php } ?>>Tamil</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td style="padding-top: 13px;">
                    <label>Gender</label>
                    <input type="radio" name="Gender" <?php if ($fet['Gender'] == "male") { ?> checked="true" ??php } ??
                        <?php } ?> value="male">
                    <label>Male</label>
                    <input type="radio" name="Gender" <?php if ($fet['Gender'] == "female") { ?> checked="true" ??php } ??
                        <?php } ?> value="female">
                    <label>Female</label><br />

                <td>

            </tr>
            <tr>
                <td style="padding:10px"><label>Hobby:</label>
                    <input type="checkbox" name="sports[]" <?php if (in_array('Books', $array)) { ?> checked ??php } ??
                     <?php } ?> value="Books">
                    <label> Books</label>
                    <input type="checkbox" name="sports[]" <?php if (in_array('cricket', $array)) { ?> checked ??php }
                      <?php } ?> value="cricket" style="margin-left: 40px;">
                    <label>cricket</label>
                </td>
            </tr>
            <tr>
                <td style="padding-left:89px;">
                    <input type="checkbox" name="sports[]" <?php if (in_array('football', $array)) { ?> checked <?php } ?>
                        ?? ??php } ?? value="football">
                    <label>Football</label>
                    <input type="checkbox" name="sports[]" <?php if (in_array('Hockey', $array)) { ?> checked ??php } ??
                     <?php } ?> value="Hockey" style="  margin-left: 21px;">
                    <label>Hockey</label>
                </td>

            </tr>
            <tr>
                <input type="hidden" name="id" value="<?php echo $fet['id'] ?>">
                <td><input type="submit" name='submit'></td>
            </tr>
    </form>
</div>