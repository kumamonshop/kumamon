<?php
// �Z�b�V�����J�n
session_start();

// �G���[���b�Z�[�W�̏�����
$errorMessage = "";

// ���O�C���{�^���������ꂽ�ꍇ
if (isset($_POST["login"])) {
  // �P�D���[�UID�̓��̓`�F�b�N
  if (empty($_POST["userid"])) {
    $errorMessage = "���[�UID�������͂ł��B";
  } else if (empty($_POST["password"])) {
    $errorMessage = "�p�X���[�h�������͂ł��B";
  } 

  // �Q�D���[�UID�ƃp�X���[�h�����͂���Ă�����F�؂���
  if (!empty($_POST["userid"]) && !empty($_POST["password"])) {
    // mysql�ڑ��p��PHP�t�@�C����ǂݍ���
	require 'mysql_connect.php';
  

    // ���͒l�̃T�j�^�C�Y
    $userid = htmlspecialchars($_POST["userid"]);

    // �N�G���̎��s
    $query = "SELECT * FROM db_user WHERE name = '" . $userid . "'";
    $result = $mysqli->query($query);
    if (!$result) {
      print('�N�G���[�����s���܂����B' . $mysqli->error);
      $mysqli->close();
      exit();
    }

    while ($row = $result->fetch_assoc()) {
      // �p�X���[�h(�Í����ς݁j�̎��o��
      $db_hashed_pwd = $row['password'];
    }

    // �f�[�^�x�[�X�̐ؒf
    $mysqli->close();

    // �R�D��ʂ�����͂��ꂽ�p�X���[�h�ƃf�[�^�x�[�X����擾�����p�X���[�h�̃n�b�V�����r���܂��B
    //if ($_POST["password"] == $pw) {
    if (password_verify($_POST["password"], $db_hashed_pwd)) {
      // �S�D�F�ؐ����Ȃ�A�Z�b�V����ID��V�K�ɔ��s����
      session_regenerate_id(true);
      $_SESSION["USERID"] = $_POST["userid"];
      header("Location: main.php");
      exit;
    } 
    else {
      // �F�؎��s
      $errorMessage = "���[�UID���邢�̓p�X���[�h�Ɍ�肪����܂��B";
    } 
  } else {
    // �����͂Ȃ牽�����Ȃ�
  } 
} 
 
?>
<!doctype html>
<html>
  <head>
  <meta charset="UTF-8">
  <title>�T���v���A�v���P�[�V����</title>
  </head>
  <body>
  <h1>���O�C���@�\�@�T���v���A�v���P�[�V����</h1>
  <!-- $_SERVER['PHP_SELF']��XSS�̊댯��������̂ŁAaction�͋�ɂ��Ă��� -->
  <!--<form id="loginForm" name="loginForm" action="<?php print($_SERVER['PHP_SELF']) ?>" method="POST">-->
  <form id="loginForm" name="loginForm" action="" method="POST">
  <fieldset>
  <legend>���O�C���t�H�[��</legend>
  <div><?php echo $errorMessage ?></div>
  <label for="userid">���[�UID</label><input type="text" id="userid" name="userid" value="<?php echo htmlspecialchars($_POST["userid"], ENT_QUOTES); ?>">
  <br>
  <label for="password">�p�X���[�h</label><input type="password" id="password" name="password" value="">
  <br>
  <input type="submit" id="login" name="login" value="���O�C��">
  </fieldset>
  </form>
  </body>
</html>
