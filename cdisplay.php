<html>
<head>
    <title>顯示用戶發言</title>
    <meta http-equiv="refresh" content="1; url=cdisplay.php">
</head>
<body>
<?php
    $dbhost = 'localhost:3306';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'chat';
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    //mysqli 預設編號為latin-1，建立資料庫已指定utf8編碼，所以要指定連線時所用編碼
    $mysqli->query("SET NAMES utf8");

    $sql = "select * from chat ORDER BY chtime";
    $stmt = $mysqli->prepare($sql);
    $stmt->execute();
    $stmt->bind_result($chtime, $nick, $words);

    while($stmt->fetch()){
        echo $chtime." ".$nick.": ".$words."<br>";
    }

    $stmt->close();
    $mysqli->close();
?>
</body>
</html>
