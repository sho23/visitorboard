<?php
require_once __DIR__ . "/vendor/autoload.php";
	use  josegonzalez\Dotenv\Loader as Dotenv;

	$appDir = __DIR__;
	Dotenv::load([
	'filepath' =>  $appDir . '/.env',
	'toEnv' => true
	]);
	$mysqlUser = $_ENV['MYSQL_USER'];
	$mysqlPass = $_ENV['MYSQL_PASS'];
	$mysqlHost = $_ENV['MYSQL_HOST'];
	$mysqlDbName =  $_ENV['MYSQL_DBNAME'];

	// $mysqlDsnFormat = "mysql:host=%s;dbname=%s;charset=UTF8";
	// $dsn =  sprintf($mysqlDsnFormat, $mysqlHost, $mysqlDbName);

	// $dbh = new PDO($dsn, $mysqlUser, $mysqlPass);
	// $sql = 'SELECT * from users';

	// $result = $dbh->query($sql);
	// foreach ($result as $row) {
	// echo $row['id'];
	// }

	// $dbh = null;

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