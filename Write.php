
<?php
// 以下にCSVへのパス
$filePath = "./csvs/main.csv"; // <==ここっ！
//書き込み！
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $text = $_POST["username"];
    $text2 = $_POST["coment"];
    if ($text == "" or $text2 == ""){
        echo "でーたがないよー";
    }else{
        date_default_timezone_set('Asia/Tokyo');
       $time = date('Y-m-d H:i:s');

    $fields = array($text, $text2, $time);

    $fp = fopen($filePath, 'a');
    
    fputcsv($fp, $fields);
    
    fclose($fp);
    //配置場所に合わせて変更！！！
    header("Location: ./index.html");
    }
}
//書ここまで！
?>