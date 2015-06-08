<?php 
// mysqlの接続情報を定数として宣言
define("SERVER", "localhost");
define("USERNAME", "");
define("PASSWORD", "");
define("DB_NAME", "");

$link = mysql_connect(SERVER, USERNAME, PASSWORD);

if (!$link) {
    die('接続失敗です。\n\n'.mysql_error());
}

$db_selected = mysql_select_db(DB_NAME, $link);
if (!$db_selected){
	die('データベース選択失敗です。'.mysql_error());
}

?>