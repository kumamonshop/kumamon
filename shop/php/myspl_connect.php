<?php 
// mysqlの接続情報を定数として宣言
define("SERVER", "PC141S06");
define("USERNAME", "saga");
define("PASSWORD", "saga");
define("DB_NAME", "kumamondb");

$con = mysqli_connect(SERVER, USERNAME, PASSWORD, DB_NAME);

if (!$con) {
    die('接続失敗です。\n\n'.mysql_error());
}

mysqli_set_charset($con, "utf8");

?>