<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<title>ビジターボード</title>
	<style>
		.hide {
			display: none;
		}
		.btn-toolbar {
			margin-bottom: 15px;
		}
	</style>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div id="wrap">
		<?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["lang"] == "en") { ?>
			<div class="jumbotron text-center">
				<h1>Visitor Board</h1>
				<p>This is the borad for visitor</p>
			</div>
		<?php } else { ?>
			<div class="jumbotron text-center">
				<h1>ビジターボード</h1>
				<p>ゲスト管理用のビジターボードです</p>
			</div>
		<?php } ?>
		<div class="container">
<?php
require_once __DIR__ . "/vendor/autoload.php";
	use  josegonzalez\Dotenv\Loader as Dotenv;

	$appDir = __DIR__;
	Dotenv::load([
	'filepath' =>  $appDir . '/.env',
	'toEnv' => true
	]);

	$homeUrl = $_ENV['HOME_URL'];
	$messages = ['登録が完了しました。', 'データの追加に失敗しました', 'TOPページから情報を入力してください。', 'TOPへ'];

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
		$houseId = intval($_POST["house_id"]);

		if (empty($name) || empty($room)) {
			$er_msg = $lang == 'ja' ? '名前と部屋番号は必須です。' : 'Name and Room number are required.';
			print('<div class="alert alert-danger" role="alert">'. $er_msg .'</div>');
		} else {
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

			if ($lang == "en") {
				$messages = ['Registration successful.', 'Failed to insert data. Please try again.', 'Register from top page.', 'Back to Top'];
			}

			if ($flag) {
				print('<div class="alert alert-success" role="alert">' . $messages[0] . '</div>');
		    }else{
				print('<div class="alert alert-danger" role="alert">' . $messages[1] . '</div>');
		    }
			$dbh = null;
		}
	} else {
		echo '<div class="alert alert-warning" role="alert">' . $messages[2] . '</div>';
	}
?>
			<div class="panel panel-default links">
				<div class="panel-body text-center">
					<a class="btn btn-default" href='<?php echo $homeUrl . '?house_id=' . $houseId; ?>'><?php echo $messages[3]; ?></a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>