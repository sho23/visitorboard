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
	<?php $house_id = empty($_GET['house_id']) ? 999 : intval($_GET['house_id']); ?>
	<div id="wrap">
		<div class="jumbotron text-center">
			<h1>ビジターボード</h1>
			<p>ゲスト管理用のビジターボードです</p>
		</div>
		<div class="container">
			<div class="btn-toolbar">
				<div class="btn-group">
					<button id="ja" class="btn btn-primary">日本語</button>
					<button id ="en" class="btn btn-default">English</button>
				</div>
			</div>
			<div class="row box">
				<div id="ja-form" class="col-md-6 col-md-offset-3">
					<form action="action.php" method="post">
						<input type="hidden" name="lang" value="ja">
						<input type="hidden" name="house_id" value="<?php echo $house_id; ?>">
						<div class="form-group">
							<label for="name">名前</label>
							<input type="text" class="form-control" name="name" placeholder="名前" required>
							<small class="form-text text-muted">入居者の名前を記入してください</small>
						</div>
						<div class="form-group">
							<label for="room">部屋番号</label>
							<input type="text" class="form-control" name="room" placeholder="部屋番号" required>
						</div>
						<div class="form-group">
							<div class="radio">
								<label class="checkbox-inline"><input type="radio" name="visitType" value="1" checked> 訪問</label>
								<label class="checkbox-inline"><input type="radio" name="visitType" value="2"> 宿泊</label>
							</div>
						</div>
						<div class="form-group">
							<label for="number" class="control-label">人数</label>
							<select class="form-control" name="number" name="number">
								<option value="1" selected="selected">1人</option>
								<option value="2">2人</option>
								<option value="3">3人以上</option>
							</select>
							<small class="form-text text-muted">宿泊は原則1人までです</small>
						</div>
						<div class="form-group">
							<label for="date">訪問日</label>
							<input type="text" class="form-control" name="date" id="datepicker" value="<?php echo date('m/d/Y'); ?>">
							<small class="form-text text-muted">連泊される場合は各日ごとに個別に申請してください</small>
						</div>
						<div class="form-group">
							<label for="time">訪問時間</label>
							<input type="text" class="form-control" name="time" value="<?php echo date('H:i'); ?>">
						</div>
						<button type="submit" class="btn btn-primary">送信</button>
					</form>
				</div>
				<div id="en-form" class="col-md-6 col-md-offset-3 hide">
					<form action="action.php" method="post">
						<input type="hidden" name="lang" value="en">
						<input type="hidden" name="house_id" value="<?php echo $house_id; ?>">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" name="name" placeholder="Tom" required>
							<small class="form-text text-muted">Please write your name who live in this share house.</small>
						</div>
						<div class="form-group">
							<label for="room">Room number</label>
							<input type="text" class="form-control" name="room" placeholder="123" required>
						</div>
						<div class="form-group">
							<div class="radio">
								<label class="checkbox-inline"><input type="radio" name="visitType" value="1" checked> Visit</label>
								<label class="checkbox-inline"><input type="radio" name="visitType" value="2"> Stay</label>
							</div>
						</div>
						<div class="form-group">
							<label for="number" class="control-label">Number</label>
							<select class="form-control" name="number" name="number">
								<option value="1" selected="selected">1 person</option>
								<option value="2">2 people</option>
								<option value="3">3 people or more</option>
							</select>
							<small class="form-text text-muted">Only allowed one person for staying.</small>
						</div>
						<div class="form-group">
							<label for="date">Date</label>
							<input type="text" class="form-control" name="date" id="datepicker2" value="<?php echo date('m/d/Y'); ?>">
							<small class="form-text text-muted">Enter visitor information for each day even if it's staying more than 1 night.</small>
						</div>
						<div class="form-group">
							<label for="time">Time</label>
							<input type="text" class="form-control" name="time" value="<?php echo date('H:i'); ?>">
						</div>
						<button type="submit" class="btn btn-primary">Send</button>
					</form>
				</div>
			</div>
			<!-- FOOTER -->
			<footer>
				<div class="row text-center">
					<p class="text-center text-white">&copy; 2018 Company, Inc.</p>
				</div>
			</footer>
		</div><!-- /.container -->
	</div>
	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"><\/script>')</script>

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
	$(function () {
		$( "#datepicker" ).datepicker();
		$( "#datepicker2" ).datepicker();
	});
	$('#ja').click(function(){
		$(this).removeClass("btn-default");
		$(this).addClass("btn-primary");
		$(this).siblings().addClass("btn-default");
		$(this).siblings().removeClass("btn-primary");
		$("#ja-form").removeClass("hide");
		$("#en-form").addClass("hide");
		$(".jumbotron h1").text('ビジターボード');
		$(".jumbotron p").text('ゲスト管理用のビジターボードです');
	});
	$('#en').click(function(){
		$(this).removeClass("btn-default");
		$(this).addClass("btn-primary");
		$(this).siblings().addClass("btn-default");
		$(this).siblings().removeClass("btn-primary");
		$("#en-form").removeClass("hide");
		$("#ja-form").addClass("hide");
		$(".jumbotron h1").text('Visitor Board');
		$(".jumbotron p").text('This is the borad for visitor');
	});
	</script>
</body>
</html>