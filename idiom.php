<html>
<head>
    <title>成語列表</title>
</head>
<body>
    <?php
    /**
     * Created by PhpStorm.
     * User: USER
     * Date: 2018/1/11
     * Time: 下午 01:18
     */
    $dbhost = 'localhost:3306';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'idiom';
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    //mysqli 預設編號為latin-1，建立資料庫已指定utf8編碼，所以要指定連線時所用編碼
    $mysqli->query("SET NAMES utf8");

    $sql = "SELECT * FROM `chinese`";
    $stmt = $mysqli->prepare($sql);
    $stmt->execute();
    $stmt->bind_result($name, $explantion);

    while($stmt->fetch()){
        echo $name." ".$explantion."<br>";
    }

    $stmt->close();
    $mysqli->close();1
    ?>

</body>
</html>