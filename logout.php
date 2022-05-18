<?php

session_start();
if(isset($_POST['logout_btn']))
{
    session_destroy();
  echo"<script>location.href='login.php'</script>";
}
else {
    echo"<script>location.href='login.php'</script>";
}


?>