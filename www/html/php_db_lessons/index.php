<?php 

define('DB_DATABASE', 'docker_db');
define('DB_USERNAME', 'calchos');
define('DB_PASSWORD', 'caltan');
define('PDO_DSN','mysql:host=db;dbname='. DB_DATABASE);

try {
    // host=XXXの部分のXXXにはmysqlのサービス名を指定します
    $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo '接続できました！(｡･ω･｡)ﾉ';
    $stmt = $db->query('select `text`,`number` from calchos where `id`= 2');
 	$result = $stmt->fetch();
 	print_r($result);

} catch (PDOException $e) {
    echo $e->getMessage();
    exit('データベースに接続できませんでした。' . $e->getMessage());
}