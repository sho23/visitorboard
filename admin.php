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
		<div class="jumbotron text-center">
			<h1>ビジターボード</h1>
			<p>申請一覧の管理です</p>
		</div>
		<div class="container">
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
	$mysqlDsnFormat = "mysql:host=%s;dbname=%s;charset=UTF8";
	$dsn =  sprintf($mysqlDsnFormat, $mysqlHost, $mysqlDbName);

	$dbh = new PDO($dsn, $mysqlUser, $mysqlPass);
	$sql = 'SELECT * from visitors order by created desc';

	$result = $dbh->query($sql);

	$sqlHouses = 'SELECT id, name from houses';
	$houses = $dbh->query($sqlHouses);
	$houseList = [];
	foreach ($houses as $value) {
		$houseList[$value['id']] = $value['name'];
	}
	$numberList = [1 => '1人', 2 => '2人', 3 => '3人以上'];
	$visitTypeList = [1 => '訪問', 2 => '宿泊'];
?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>物件名</th>
			<th>名前</th>
			<th>部屋番号</th>
			<th>訪問/宿泊</th>
			<th>人数</th>
			<th>訪問日</th>
			<th>訪問時間</th>	
			<th>データ登録時間</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($result as $row) { ?>
		<tr>
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $houseList[$row['house_id']]; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['room']; ?></td>
			<td><?php echo $visitTypeList[$row['visitType']]; ?></td>
			<td><?php echo $numberList[$row['number']]; ?></td>
			<td><?php echo $row['date']; ?></td>
			<td><?php echo $row['time']; ?></td>
			<td><?php echo $row['created']; ?></td>
		</tr>
<?php
	}
	$dbh = null;
?>
		</div>
	</div>
</body>
</html>