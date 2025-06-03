<?php
include "KoneksiDatabase.php";
session_start();
$_SESSION=[];
session_destroy();

setcookie('id', '',time()-3600);
setcookie('username', '',time()-3600);

header("location: LoginAkun.php");
exit;
?>