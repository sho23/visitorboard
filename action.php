<?php
// 変数の初期化
$name = "";
$room = "";
$visitType = "";
$number = ""; 
$date = "";
$time = "";

// POSTリクエストがあった時
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = htmlspecialchars($_POST["name"], ENT_QUOTES);
	$room = htmlspecialchars($_POST["room"], ENT_QUOTES);
	$visitType = $_POST["visitType"];
	$number = $_POST["number"];
	$date = htmlspecialchars($_POST["date"], ENT_QUOTES);
	$time = htmlspecialchars($_POST["time"], ENT_QUOTES);
	$lang = $_POST["lang"];
} else {
	echo "フォームページからアクセスしてください。";
	exit(1);
}
?>