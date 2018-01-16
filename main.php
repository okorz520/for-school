<?php
    setcookie("nick", $_POST["nick"]) //用cookie記錄用戶昵稱,是常用的傳遞變數方法
?>
<html>
<title>聊天室</title>
<frameset rows="80%,*">
    <frame src="cdisplay.php" name="chatdisplay">
    <frame src="speak.php" name="speak">
</frameset>
</html>