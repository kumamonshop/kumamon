<?php 
// mysql�̐ڑ�����萔�Ƃ��Đ錾
define("SERVER", "PC141S06");
define("USERNAME", "saga");
define("PASSWORD", "saga");
define("DB_NAME", "kumamondb");

$con = mysqli_connect(SERVER, USERNAME, PASSWORD, DB_NAME);

if (!$con) {
    die('�ڑ����s�ł��B\n\n'.mysql_error());
}

mysqli_set_charset($con, "utf8");

?>