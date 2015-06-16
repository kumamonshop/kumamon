<?php 
// mysql‚ÌÚ‘±î•ñ‚ð’è”‚Æ‚µ‚ÄéŒ¾
define("SERVER", "PC141S06");
define("USERNAME", "saga");
define("PASSWORD", "saga");
define("DB_NAME", "kumamondb");

$con = mysqli_connect(SERVER, USERNAME, PASSWORD, DB_NAME);

if (!$con) {
    die('Ú‘±Ž¸”s‚Å‚·B\n\n'.mysql_error());
}

mysqli_set_charset($con, "utf8");

?>