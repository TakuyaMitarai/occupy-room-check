<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>追加ページ</title>
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/common.css">
    </head>
    <body>
		<header>
			<h1>大谷研在室日時確認システム</h1>
		</header>
		<article>
<?php
$hostname = '127.0.0.1';
$username = 'root';
$password = 'dbpass';

$dbname = 'zaishitsu';
$tablename = 'user';
$tablename2 = 'event';

$link = mysqli_connect($hostname,$username,$password);
if(! $link){ exit("Connect error!"); }

$result = mysqli_query($link,"USE $dbname");
if(!$result) { exit("USE failed!"); }
?>
<?php
	$result_count = mysqli_query($link,"SELECT count(*) FROM $tablename2 order by num desc");
	if(!$result_count){ exit("Select error on table ($tablename2)!"); }
	$result = mysqli_query($link,"SELECT num FROM $tablename2 order by num desc");
	if(!$result){ exit("Select error on table ($tablename2)!"); }
	$result2 = mysqli_query($link,"SELECT event_name FROM $tablename2 order by num desc");
	if(!$result2){ exit("Select error on table ($tablename2)!"); }

	$count = mysqli_fetch_array($result_count)[0];


	if(!isset($_GET['Txta'])) {
		$errors[] = 'errora';
	}elseif($_GET['Txta'] === '') {
		$errors[] = 'errora';
	}else{
		$event_num=$_GET['Txta'];
	}
	if(!isset($_GET['Txtb'])) {
		$errors[] = 'errorb';
	}elseif($_GET['Txtb'] === '') {
		$errors[] = 'errorb';
	}else{
		$b=$_GET['Txtb'];
		$timestamp = strtotime($b);
		$year =  date("Y", $timestamp);
		$month =  date("m", $timestamp);
		$day =  date("d", $timestamp);
		$json_YEAR = json_encode($year);
		$json_MONTH = json_encode($month);
		$json_DAY = json_encode($day);
	}

	//イベント時間をとってくる
	$result = mysqli_query($link,"SELECT event_time1 FROM $tablename2 where num = $event_num");
	if(!$result){ exit("bbSelect error on table ($tablename)!a"); }
	$event_start = mysqli_fetch_array($result)[0];
	$json_ES = json_encode($event_start);

	$result = mysqli_query($link,"SELECT event_time2 FROM $tablename2 where num = $event_num");
	if(!$result){ exit("bbSelect error on table ($tablename)!c"); }
	$event_end = mysqli_fetch_array($result)[0];
	$json_EE = json_encode($event_end);
?>
<script>
	const js_ES = JSON.parse('<?php echo $json_ES; ?>');
	const js_EE = JSON.parse('<?php echo $json_EE; ?>');
	const js_YEAR = JSON.parse('<?php echo $json_YEAR; ?>');
	const js_MONTH = JSON.parse('<?php echo $json_MONTH; ?>');
	const js_DAY = JSON.parse('<?php echo $json_DAY; ?>');
</script>

        <h1 id="res"> <?php echo $year . "年" . $month . "月" . $day . "日";?>-追加画面 </h1>

        <form method="get" action="top.php">
		<input type="hidden" name="Txt12a" value="<?php echo "$event_num";?>">
		<input type="hidden" name="Txt8a" value="<?php echo "$year";?>">
		<input type="hidden" name="Txt9a" value="<?php echo "$month";?>">
		<input type="hidden" name="Txt10a" value="<?php echo "$day";?>">

		<div class="cp_iptxt">
			<label class="ef">
			<input type="text" name="Txt11a" value="" placeholder="入学年度(2ケタ）">
			</label>
		</div>
		<div class="cp_iptxt">
			<label class="ef">
			<input type="text"  name="Txt1a" value="" placeholder="姓">
			</label>
			<label class="ef">
			<input type="text" name="Txt2a" value="" placeholder="名">
			</label>
		</div>
			<br>
		<div class="box--time--container">
		<div class="box--time">
			<p>入室時間</p>
			<div class = "box-inside">
			<select name="Txt3a" id="timeX1" class="select--form">


<?php
	for ($i = 7; $i <= 22; $i++) {
   		print ('<option value="' . $i. '">' . $i . '</option>');

   	}
 ?>
			</select>
	   		<span>時</span>
 			<select name="Txt4a" id="minuteX1" class="select--form">


<?php
	for ($i = 0; $i <= 50; $i+=10) {
	print ('<option value="' . $i. '">' . $i . '</option>');
	}
?>
			</select>
		<span>分</span>

		</div>

		</div>

		<div class="box--time">
			<p>退室時間</p>
			<div class = "box-inside">
			<select name="Txt5a" id="timeX2" class="select--form">

<?php
	for ($i = 7; $i <= 22; $i++) {


		print ('<option value="' . $i. '">' . $i . '</option>');
	}
?>
			</select>
		<span>時</span>

		<select name="Txt6a" id="minuteX2" class="select--form">


<?php
	for ($i = 0; $i <= 50; $i+=10) {
		print ('<option value="' . $i. '">' . $i . '</option>');
	}
?>
			</select>
		<span>分</span>


		</div>

		</div>
		</div>
			<div class="cp_iptxt">
				<label class="ef">
				<textarea name="Txt7a" rows="5" cols="30" placeholder="コメント"></textarea>
				</label>
			</div>
			<br>
            <button type="submit" name="Btn1" value="Btn1" class="btn--blue">確定ボタン</button>
        </form>

		<div class="btn--flex">
			<div class="btn--margin">
				<form method="get" action="days.php">
				<input type="hidden" name="Txta" value="<?php echo "$event_num";?>">
				<input type="hidden" name="Txtb" value="<?php echo "$b";?>">
				<button type="submit" name="Btn2" value="Btn2" class="btn--white">ユーザ詳細ページへ</button>
				</form>
			</div>
			<div class="btn--margin">
				<form method="get" action="top.php">
					<button type="submit" name="Btn2" value="Btn2" class="btn--white">トップページへ</button>
				</form>
			</div>
		</div>
		</article>
		<footer></footer>

		<!--js読み込み-->
		<script src = "user_addition.js"></script>
    </body>
</html>
