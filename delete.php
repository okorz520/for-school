<html>
<head>
    <title>成語刪除</title>
</head>
<body>刪除<br>

<?php

if (isset($_POST['name'])) {
    $dbhost = 'localhost:3306';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'idiom';
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    //mysqli 預設編號為latin-1，建立資料庫已指定utf8編碼，所以要指定連線時所用編碼
    $mysqli->query("SET NAMES utf8");

    $name = $_POST['name'];

    $sql = "DELETE FROM chinese WHERE `name` = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('s',$name);
    $stmt->execute();

    $stmt->close();
    $mysqli->close();
}
?>
<form action="delete.php" method="post" target="_self">
    <input type="text" name="name">
    <input type="submit" value="刪除">
</form>



</body>
</html>