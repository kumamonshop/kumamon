<?php 
// mysql�̐ڑ�����萔�Ƃ��Đ錾
define("SERVER", "localhost");
define("USERNAME", "");
define("PASSWORD", "");
define("DB_NAME", "");

$link = mysql_connect(SERVER, USERNAME, PASSWORD);

if (!$link) {
    die('�ڑ����s�ł��B\n\n'.mysql_error());
}

$db_selected = mysql_select_db(DB_NAME, $link);
if (!$db_selected){
	die('�f�[�^�x�[�X�I�����s�ł��B'.mysql_error());
}

?>