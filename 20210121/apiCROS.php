<?php
header('Access-Control-Allow-Origin:*');
$db = new PDO("mysql:host=127.0.0.1;dbname=jq_sample;charset=utf8", "root", "");
date_default_timezone_set('asia/Taipei');


switch ($_GET['todo']) {
  case 'select':
    // print_r($_POST);
    $sql = "SELECT * FROM ajax_animal limit " . $_POST['start'] . ",10";
    $rows = $db->query($sql)->fetchAll();
    if ($rows) {
      foreach ($rows as $row) {
        echo '
        <tr>
          <td>' . $row['id'] . '</td>
          <td>' . $row['name'] . '</td>
          <td>' . $row['weight'] . '</td>
          <td>' . $row['info'] . '</td>
          <td>' . $row['date'] . '</td>
          <td>
            <button class="mdy">修改</button>
            <button onclick="del(this)">刪除</button>
          </td>
        </tr>
        ';
      }
    } else {
      echo 'fail';
    }
    break;
  case 'update':
    // print_r($_POST);
    $sql = "UPDATE ajax_animal SET name='" . $_POST['name'] . "',weight=" . $_POST['weight'] . ",info='" . $_POST['info'] . "',date=NOW() WHERE id=" . $_POST['id'];
    //UPDATE ajax_animal SET name='藪貓',weight=9,info='食肉目 貓科 藪貓屬',date=NOW() WHERE id=1
    $result = $db->query($sql);
    if ($result) echo date("Y-m-d H:i:s");
    break;

  case 'delete':
    $sql = "DELETE from ajax_animal WHERE id=" . $_POST['id'];
    $result = $db->query($sql);
    if ($result) echo 'deleted';
    break;
  case 'insert':
    $sql = "INSERT INTO ajax_animal VALUES(null,'" . $_POST['name'] . "'," . $_POST['weight'] . ",'" . $_POST['info'] . "',NOW())";
    //echo $sql; //INSERT INTO ajax_animal VALUES(null,'預告片03',23123,'食肉目 貓科 藪貓屬',NOW())
    $result = $db->query($sql);
    if($result) echo 'inserted';
    break;
}
