<?php 
error_reporting(E_ERROR);
include('config.php');
include("headerafter.php");
if (!isset($_SESSION['id'])) {
    header("location:login.php");
}
$order_user             =   'user_asc';
$order_name             =   'name_asc';
if(isset($_REQUEST['order']) && $_REQUEST['order'] == 'user_desc'){
    $order_by                       =   'ORDER BY `admin`.`user` DESC';
    $order_user                     =   'user_asc';
}elseif(isset($_REQUEST['order']) && $_REQUEST['order'] == 'user_asc'){
    $order_by                       =   'ORDER BY  `admin`.`user` ASC';
    $order_user                     =   'user_desc';
}elseif(isset($_REQUEST['order']) && $_REQUEST['order'] == 'name_asc'){
    $order_by                       =   'ORDER BY  `admin`.`name` ASC';
    $order_name                     =   'name_desc';
}elseif(isset($_REQUEST['order']) && $_REQUEST['order'] == 'name_desc'){
    $order_by                       =   'ORDER BY  `admin`.`name` DESC';
    $order_name                     =   'name_asc';
}else{
    $order_by                       =   'ORDER BY  `admin`.`id` ASC';
}


if (isset($_POST['save']) && $_POST['save'] == 'Search') {
    $search                 =   $_POST['search'];
    $search1                =   $_POST['search1'];
    $search2                =   $_POST['search2'];
    $search3                =   $_POST['search3'];
    $search4                =   $_POST['search4'];
    $search5                =   $_POST['search5'];
    $search6                =   $_POST['search6'];
    $search7                =   $_POST['search7'];
    $search8                =   $_POST['search8'];
    $search9                =   $_POST['search9'];







    }else {
    $search                 =   '';
    $search1                =   '';
    $search2                =   '';
    $search3                =   '';
    $search4                =   '';
    $search5                =   '';
    $search6                =   array();
    $search7                =   '';
    $search8                =   '';
    $search9                =   '';

    
    






}

if (isset($_POST['save'])) {

    if (isset($_POST['search']) && $_POST['search'] != '') {
        $where_user                 =    "and `user` LIKE '%" . $_POST['search']. "%'";
    }else{
        $where_user                 =    "";
    }

    if (isset($_POST['search1']) && $_POST['search1'] != '') {
        $where_name                 =   "and `name` LIKE '%" . $search1 . "%'";
    }else{
        $where_name                 =   "";
    }

    if (isset($_POST['search2']) && $_POST['search2'] != '') {
        $where_phone                =   "and `phone` LIKE '%" . $search2 . "%'";
    }else{
        $where_phone                =   "";
    }
    if (isset($_POST['search3']) && $_POST['search3'] != '') {
        $where_gender                =   "and `Gender` LIKE '" . $search3 . "'";
    }else{
        $where_gender                =   "";
    }
    if (isset($_POST['search4']) && $_POST['search4'] != '') {
        $where_city                =   "and `city` LIKE '" . $search4 . "'";
    }else{
        $where_city                =   "";
    }
    if (isset($_POST['search5']) && $_POST['search5'] != '') {
        $where_state                =   "and `state` LIKE '" . $search5 . "'";
    }else{
        $where_state                =   "";
    }
    if (isset($_POST['search6']) && $_POST['search6'] != '') {
        $where_hobby                =   "and `Hobby` LIKE '%" . $search6 . "%' and `Hobby` LIKE '%" . $search7 . "%'and `Hobby` LIKE '%" . $search8 . "%'and `Hobby` LIKE '%" . $search9 . "%'";

    }else{
        $where_hobby                =   "";
    }

    $limit = 10;
    if (!isset ($_GET['page']) ) {  
        $page_number = 1;  
    } else {  
        $page_number = $_GET['page'];  
    }    
    $initial_page = ($page_number-1) * $limit; 

     
    $sql = "select * from admin  where  1=1 ". $where_user." ".$where_name." ".$where_phone." ".$where_gender." ".$where_city." ".$where_state." ".$where_hobby." limit " .$initial_page . "," . $limit;
    $res = mysqli_query($con, $sql);
    $total_rows = mysqli_num_rows($res);
    $total_pages = ceil ($total_rows / $limit);     
   
    

}else{
    $limit = 10;  
    $sql = "select * from admin ". $order_by;
    
    $res1 = mysqli_query($con, $sql);
    $total_rows = mysqli_num_rows($res1);
    $total_pages = ceil ($total_rows / $limit);     
    if (!isset ($_GET['page']) ) {  
        $page_number = 1;  
    } else {  
        $page_number = $_GET['page'];  
    }    
    $initial_page = ($page_number-1) * $limit;   
    $sql2 = "select * from admin ". $order_by . " limit " . $initial_page . "," . $limit;  
    $res = mysqli_query($con, $sql2);       
    
}

?>

<link rel="stylesheet" href="css/user_data.css">

<form action="" method="post">
    <table class="viewinfo1" style="margin-left: 75px; margin-top: 50px;">
        <tr>
            <td>
                <input type="text" placeholder="Enter user" name="search" value="<?php echo $search ?>" >
            </td>
            <td>
                <input type="text" placeholder="Enter name" name="search1" value="<?php echo $search1 ?>">
            </td>
            <td>
                <input type="text" placeholder="Enter phone" name="search2" value="<?php echo $search2 ?>">
            </td>
            <td >
                    <label >Gender:</label><br>
                    <input type="radio" name="search3" value="male"   <?php if ($search3=="male") { ?> checked= "true"<?php } ?>>
                    <label style="font-size: 11px;">Male</label><br>
                    
                    <input type="radio" name="search3" value="female"  <?php if ($search3=="female") { ?> checked= "true"<?php } ?> > 
                    <label style="font-size: 11px;" >Female</label>
</td>
            <td>

            <label>City:</label>
            <select name="search4" class="city" >
                    <option value="">City</option>
                    <option value="jaipur" <?php if ($search4 == "jaipur") { ?> selected <?php } ?> >Jaipur</option>
                    <option value="tonk" <?php if ($search4 == "tonk") { ?> selected <?php } ?> >Tonk</option>
                    <option value="chennai" <?php if ($search4 == "chennai") { ?> selected <?php } ?> >Chennai</option>
                    <option value="pune" <?php if ($search4 == "pune") { ?> selected <?php } ?> >pune</option>
            </select>
                <br>
        </td>
            <td>
                    <label>State:</label>
                    <select name="search5">
                        <option value="">State</option>
                        <option value="Rajasthan" <?php if ($search5 == "Rajasthan") { ?>selected <?php } ?>>Rajasthan</option>
                        <option value="Bihar" <?php if ($search5 == "Bihar") { ?>selected <?php } ?>>Bihar</option>
                        <option value="Punjab" <?php if ($search5 == "Punjab") { ?> selected <?php } ?>>Punjab</option>
                        <option value="Tamil" <?php if ($search5 == "Tamil") { ?> selected <?php } ?>>Tamil</option>
                    </select>
                </td>
            <td>
                <label>Hobby:</label><br>
                    <input type="checkbox" name="search6"  <?php if ($search6=="Books") { ?> checked= "true"<?php } ?> value="Books">
                    <label> Books</label>
                    <input type="checkbox" name="search7"  <?php if ($search7=="cricket") { ?> checked= "true"<?php } ?> value="cricket">
                    <label>cricket</label>
                <br>
                
                <input type="checkbox" name="search8"  <?php if ($search8=="football") { ?> checked= "true"<?php } ?> value="football">
                    <label>Football</label>
                    <input type="checkbox" name="search9"  <?php if ($search9=="Hockey") { ?> checked= "true"<?php } ?> value="Hockey">
                    <label>Hockey</label>
                </td>
            <td><button type="submit" value="Search" name="save">Search</button></td>
            <td><button type="submit" name="reset" >Reset</button></td>

        </tr>
    </table>

</form>
<table class="viewinfo">
    
    <tr>
        <th>ID</th>
        <th><a href="user_data.php?order=<?php echo $order_name; ?>">Name</a></th>
        <th>Email</th>
       
        <th><a href="user_data.php?order=<?php echo $order_user; ?>">user</a></th>
        <th>Phone</th>
        <th>City</th>
        <th>State</th>
        <th>Gender</th>
        <th>Hobby</th>

        <th>Actions</th>

    </tr>

    <?php
    $count = 0;
        while ($row = mysqli_fetch_array($res)) {
            $count++;
    ?>


<tr>
    <td>
            <?php echo $row['id']; ?>
        </td>
        
        <td>
            <?php echo $row['name']; ?>
        </td>
        <td>
            <?php echo $row['email']; ?>
        </td>
       
        <td>
            <?php echo $row['user']; ?>
        </td>

        <td>
            <?php echo $row['phone']; ?>
        </td>
        <td>
            <?php echo $row['city']; ?>
        </td>
        <td>
            <?php echo $row['state']; ?>
        </td>
        <td>
            <?php echo $row['Gender']; ?>
        </td>
        <td>
            <?php echo $row['Hobby']; ?>
        </td>
        <td>
            <a href="http://localhost/Project/user_update.php?id=<?php echo $row['id'] ?>">Update</a>

            <a href="http://localhost/Project/user_delete.php?id=<?php echo $row['id'] ?>" class="confirm"
                id="delete-button" class= "button" onclick="return confirm('Are you sure?')"  >Delete</a>
                
        </td>
    </tr>
    <?php } ?>
</table>




<div style="
    text-align: center;
    font-size: 27px;
    margin-top: 15px;
">
    <?php  for($page_number = 1; $page_number<= $total_pages; $page_number++) {  

    echo '<a href = "user_data.php?page=' . $page_number . '" style = "text-decoration:none;background-color:#e36c6c;" >' . $page_number . ' </a>';  

}    ?>
</div>
<a href="http://localhost/Project/user_add.php" class="button">Add user</a>
<?php include("footer.php");?>
