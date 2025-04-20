<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SampleCSVCHAT</title>
</head>
<body>
<?php
//読み込み部

// 以下にCSVへのパス
$filePath = "./csvs/main.csv"; // <==ここっ！
$handle = fopen($filePath, "r");
while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
	echo htmlspecialchars($data[0], ENT_QUOTES, 'UTF-8') . "さん:<br>" . htmlspecialchars($data[1], ENT_QUOTES, 'UTF-8') . "<br>" . htmlspecialchars($data[2], ENT_QUOTES, 'UTF-8') . "<hr>";
    

}
fclose($handle);
//読むここまで
?>

   <?php //js使ってるぅ～ いわば脳筋解決?>
    <script>
        window.onload = function() {
            window.scrollTo(0, document.body.scrollHeight);
        };
        
   </script>


</body>
</html>
<style>
body{
background-color: white;
color: black;
}
</style>