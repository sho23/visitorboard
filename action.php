<?php
require_once __DIR__ . "/vendor/autoload.php";
	use  josegonzalez\Dotenv\Loader as Dotenv;

	$appDir = __DIR__;
	Dotenv::load([
	'filepath' =>  $appDir . '/.env',
	'toEnv' => true
	]);

	$homeUrl = $_ENV['HOME_URL'];

	// mysqlの情報を取得
	$mysqlUser = $_ENV['MYSQL_USER'];
	$mysqlPass = $_ENV['MYSQL_PASS'];
	$mysqlHost = $_ENV['MYSQL_HOST'];
	$mysqlDbName =  $_ENV['MYSQL_DBNAME'];
	$mysqlDsnFormat = "mysql:host=%s;dbname=%s;charset=UTF8";

	// 変数の初期化
	$name = "";
	$room = "";
	$visitType = "";
	$number = "";
	$date = "";
	$time = "";

	// POSTリクエストがあった時
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// POSTで飛んできた情報を取得
		$name = htmlspecialchars($_POST["name"], ENT_QUOTES);
		$room = htmlspecialchars($_POST["room"], ENT_QUOTES);
		$visitType = $_POST["visitType"];
		$number = $_POST["number"];
		$date = htmlspecialchars($_POST["date"], ENT_QUOTES);
		$time = htmlspecialchars($_POST["time"], ENT_QUOTES);
		$lang = $_POST["lang"];
		$created = date('Y-m-d H:i:s');
		$houseId = $_ENV['HOUSE_ID'];
		// DBに接続
		$dsn =  sprintf($mysqlDsnFormat, $mysqlHost, $mysqlDbName);
		$dbh = new PDO($dsn, $mysqlUser, $mysqlPass);
		try {
			$dbh = new PDO($dsn, $mysqlUser, $mysqlPass);
		} catch (PDOException $e) {
			exit('データベース接続失敗。'.$e->getMessage());
		}

		// INSERT
		$sql = 'INSERT INTO visitors (house_id, name, room, visitType, number, date, time, lang, created) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$stmt = $dbh->prepare($sql);
		$flag = $stmt->execute(array($houseId, $name, $room, $visitType, $number, $date, $time, $lang, $created));
		if ($flag) {
			print('データの追加に成功しました<br>');
	    }else{
			print('データの追加に失敗しました<br>');
	    }
		echo "<a href=" . $homeUrl . ">TOPへ</a>";
		$dbh = null;
	} else {
		echo "フォームページからアクセスしてください。";
		echo "<a href=" . $homeUrl . ">TOPへ</a>";
		exit(1);
	}
?>