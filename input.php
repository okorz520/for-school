<html>
<head>
    <title>成語編輯</title>
</head>
<body>新增<br>

<?php

if (isset($_POST['name']) && isset($_POST['explanation'])) {
    $dbhost = 'localhost:3306';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'idiom';
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    //mysqli 預設編號為latin-1，建立資料庫已指定utf8編碼，所以要指定連線時所用編碼
    $mysqli->query("SET NAMES utf8");

    $name = $_POST['name'];
    $explanation = $_POST['explanation'];

    $sql = "INSERT INTO `chinese` (name, explanation) VALUES (?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('ss', $name, $explanation);
    $stmt->execute();

    $stmt->close();
    $mysqli->close();
}
?>
<form action="input.php" method="post" target="_self">
    <input type="text" name="name">
    <input type="text" name="explanation">
    <input type="submit" value="新增">
</form>



</body>
</html>