<?php
$movieName = array( //電影資料
  array("id" => 1, "movie" => "電影名稱 A"),
  array("id" => 2, "movie" => "電影名稱 B"),
  array("id" => 3, "movie" => "電影名稱 C"),
);
$movieDay = array( //場次時間of電影
  array("id" => 1, "movieName" => 1, "date" => "2021-01-21"),
  array("id" => 2, "movieName" => 1, "date" => "2021-01-22"),
  array("id" => 3, "movieName" => 2, "date" => "2021-01-22"),
  array("id" => 4, "movieName" => 2, "date" => "2021-01-23"),
  array("id" => 5, "movieName" => 3, "date" => "2021-01-23"),
  array("id" => 6, "movieName" => 3, "date" => "2021-01-24")
);
$movieOrder = array( //訂單
  array("id" => 1, "movieDay" => 1, "time" => 2, "sellout" => 2),
  array("id" => 2, "movieDay" => 1, "time" => 2, "sellout" => 2),
  array("id" => 3, "movieDay" => 1, "time" => 3, "sellout" => 2),
  array("id" => 4, "movieDay" => 1, "time" => 4, "sellout" => 2),
  array("id" => 5, "movieDay" => 2, "time" => 1, "sellout" => 2),
  array("id" => 6, "movieDay" => 2, "time" => 3, "sellout" => 2),
  array("id" => 7, "movieDay" => 2, "time" => 3, "sellout" => 2),
  array("id" => 8, "movieDay" => 3, "time" => 1, "sellout" => 2),
  array("id" => 9, "movieDay" => 3, "time" => 2, "sellout" => 2), // 電影名稱 B, 於時間 2021-01-26 之第2場次，賣掉2張
  array("id" => 10, "movieDay" => 3, "time" => 3, "sellout" => 2),
  array("id" => 11, "movieDay" => 4, "time" => 1, "sellout" => 2),
  array("id" => 12, "movieDay" => 4, "time" => 2, "sellout" => 2),
  array("id" => 13, "movieDay" => 4, "time" => 3, "sellout" => 2),
  array("id" => 14, "movieDay" => 5, "time" => 1, "sellout" => 2),
  array("id" => 15, "movieDay" => 5, "time" => 1, "sellout" => 2),
  array("id" => 16, "movieDay" => 5, "time" => 3, "sellout" => 2),
  array("id" => 17, "movieDay" => 6, "time" => 1, "sellout" => 2),
  array("id" => 18, "movieDay" => 6, "time" => 2, "sellout" => 2),
  array("id" => 19, "movieDay" => 4, "time" => 7, "sellout" => 3)
);

switch ($_GET['do']) {
  case 'getmovie':
    //這裡將提供 JSON 給前端，由前端來處理 DOM (JSON_UNESCAPED_UNICODE 能確保中文，非必要因 HTML 能正常顯示 unicode)
    echo json_encode($movieName, JSON_UNESCAPED_UNICODE);
    break;

  case 'getdate':
    // print_r($_GET);
    $result = array();
    foreach ($movieDay as $row)
      if ($row['movieName'] == $_GET['mvid']) array_push($result, $row);

    echo json_encode($result, JSON_UNESCAPED_UNICODE);
    break;

  case 'gettime':
    $result = array();
    foreach ($movieOrder as $row) if ($row['movieDay'] == $_GET['id']) array_push($result, $row);
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
    break;
}
