
<?php
$username = "";
$coment = "";
// 以下にCSVへのパス
$filePath = "./csvs/main.csv"; // <==ここっ！
//書き込み！
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $text = $_POST["username"];
    $text2 = $_POST["coment"];
    $urlS = $_POST["URLs"];
    if ($text == "" or $text2 == ""){
        echo "でーたがないよー";
    }else{
        if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
            $uploadDir = 'csvs/';
            $uploadFile = $uploadDir . basename($_FILES['file']['name']);
    
            // ファイルを指定されたディレクトリに移動
            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
                echo "ファイルが正常にアップロードされました: " . htmlspecialchars(basename($_FILES['file']['name']));
            } else {
                echo "ファイルのアップロードに失敗しました。";
            }
        } else {
            echo "ファイルがアップロードされていません。";
        }
       date_default_timezone_set('Asia/Tokyo');
       $time = date('Y-m-d H:i:s');

    $fields = array($text, $text2, $time, basename($_FILES['file']['name']), $urlS);

    $fp = fopen($filePath, 'a');
    
    fputcsv($fp, $fields);
    
    fclose($fp);
    //配置場所に合わせて変更！！！
    header("Location: ./index.html");
    }
}
//書ここまで！
?>