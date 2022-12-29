<?php

include("headerafter.php");
?>
<?php


if (!isset($_SESSION['id'])&&$_SESSION['id']==0 ) {
    header("location:login.php");
    exit();
}
//display page here
?>
    <div class="center"><div>
<h1>Welcome <span class="admin"> Admin</span></h1>
</div>
</div>


<?php

include("footer.php");
?>







