<?php

// 以下DB接続情報は非公開
define('DB_DATABASE', 'docker_db');
define('DB_USERNAME', 'calchos');
define('DB_PASSWORD', 'caltan');
define('PDO_DSN','mysql:host=db;dbname='. DB_DATABASE);

try {
    // host=XXXの部分のXXXにはmysqlのサービス名を指定します
    $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo '接続できました！(｡･ω･｡)ﾉ';
    $stmt = $db->query('select * from `state_master`');
    $result = $stmt->fetch();
    print_r($result);

  } catch (PDOException $e) {
    echo $e->getMessage();
    exit('データベースに接続できませんでした。' . $e->getMessage());
}

?>
<!DOCTYPE html>
<html lang='ja'>
  <head>
    <meta charset="utf-8">
    <title>都道府県表示</title>
  </head>
  <body>
    <h3>都道府県表示</h3>
      <select name="pref">
        <option value="">全ての都道府県を表示</option>
        <option value="">県を表示</option>
        <option value="">府を表示</option>
      </select>
      <input type="submit" name="prefecture" value="表示">
      <p>
        <table border="1">
          <tr>
            <th>ID</th>
            <th>都道府県名</th>
          </tr>
          <tr>
            <td><?php echo $result['STATE_ID']; ?></td>
            <td><?php echo $result['STATE_NAME']; ?></td>
          </tr>
        </table>
      </p>

  </body>
</html>