<?php
function load_contents($url)
{
  $lokiCurl = curl_init(); // 初始化 CURL
  curl_setopt($lokiCurl, CURLOPT_RETURNTRANSFER, true); //回傳移除，預設 false: 自動輸出至畫面。true 則不輸出（可繼續編輯處理變數）
  curl_setopt($lokiCurl, CURLOPT_URL, $url); //目標網址
  /****************************************************************非必要的設定
  curl_setopt($lokiCurl, CURLOPT_HEADER, false); // 是否需取得 HEAD 資訊
  預設 TRUE 驗證伺服器憑證，拜訪 https 若未做任何 SSL 設定會出錯。
  curl_setopt($lokiCurl, CURLOPT_SSL_VERIFYPEER, false);
  發出端的用戶代理，提供軟體類型、版本號、作業系統、開發者資訊。參考 https://developer.mozilla.org/zh-TW/docs/Web/HTTP/Headers/User-Agent
  curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.71 Safari/537.36");
   *******************************************************************/
  $data = curl_exec($lokiCurl); // 執行 curl
  curl_close($lokiCurl); // 關閉 curl
  return $data;
}
$content = load_contents('https://www.smeservice.org.tw/api/V1/project');
$content = str_replace("\\\\", "\\", $content);

echo $content = preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function ($match) {
  return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
}, $content);
