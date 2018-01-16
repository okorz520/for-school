<html>
<head>
    <title>發言</title>
</head>
<body>
<?php
    $nick = $_COOKIE['nick'];

    if (isset($_POST['words'])) {
        $dbhost = 'localhost:3306';
        $dbuser = 'root';
        $dbpass = '';
        $dbname = 'chat';
        $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        //mysqli 預設編號為latin-1，建立資料庫已指定utf8編碼，所以要指定連線時所用編碼
        $mysqli->query("SET NAMES utf8");

        $words = $_POST['words'];
        $time = date("y").date("m").date("d").date("h").date("i").date("s"); //取得當前時間

        $sql = "INSERT INTO `chat` (chtime, nick, words) VALUES (?, ?, ?)";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('sss', $time, $nick, $words);
        $stmt->execute();

        $stmt->close();
        $mysqli->close();
    }
?>
    <form action="speak.php" method="post" target="_self">
        <input type="text" name="words" cols="20">
        <input type="submit" value="發言">
    </form>
</body>
</html>

