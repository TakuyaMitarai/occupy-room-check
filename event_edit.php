<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />


		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>変更番号選択ページ</title>
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/common.css">
    </head>
    <body>
		<header>
			<h1>大谷研在室日時確認システム</h1>
		</header>
		<article>
      <h1> イベント削除・変更画面 </h1>

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
	if(!isset($_GET['event_num'])) {
		$errors[] = 'errora';
	}elseif($_GET['event_num'] === '') {
		$errors[] = 'errora';
	}else{
		$a=$_GET['event_num'];
	}


	$result_event_name = mysqli_query($link,"SELECT event_name FROM $tablename2 where num = $a");
	if(!$result_event_name){ exit("bbSelect error on table ($tablename)!a"); }
	$event_name = mysqli_fetch_array($result_event_name)[0];

	$result_event_start = mysqli_query($link,"SELECT event_time1 FROM $tablename2 where num = $a");
	if(!$result_event_start){ exit("bbSelect error on table ($tablename)!b"); }
	$event_start = mysqli_fetch_array($result_event_start)[0];
	//$event_startに始まる日時が書いてある
	$json_ES = json_encode($event_start);


	$result_event_end = mysqli_query($link,"SELECT event_time2 FROM $tablename2 where num = $a");
	if(!$result_event_end){ exit("bbSelect error on table ($tablename)!c"); }
	$event_end = mysqli_fetch_array($result_event_end)[0];
	//$event_endに終わる日時が入ってる
	$json_EE = json_encode($event_end);

	$result_event_comment = mysqli_query($link,"SELECT event_comment FROM $tablename2 where num = $a");
	if(!$result_event_comment){ exit("bbSelect error on table ($tablename)!d"); }
	$event_comment = mysqli_fetch_array($result_event_comment)[0];

	echo "イベント詳細　：　" ;
	echo $event_name . " " . $event_comment . " " . $event_start . " " . $event_end;

?>

<!--js変数引き渡し-->
<script>
	const js_ES = JSON.parse('<?php echo $json_ES; ?>');
	const js_EE = JSON.parse('<?php echo $json_EE; ?>');
</script>

	<h1> 削除変更入力 </h1>
	<form method="get" action="top.php">
		<input type="hidden" name="event_num" value="<?php echo "$a";?>">
		<button type="submit" name="Btn2" value="Btn2" class="btn--red">削除</button>


		※すぐに削除されるので注意！
	</form>
	<h1> 日時変更入力 </h1>


	<form method="get" action="top.php">
		<input type="hidden" name="event_num2" value="<?php echo "$a";?>">
		イベント名<input type="text" name="event_name" value="<?php echo $event_name; ?>">
		<br>
		コメント<textarea name="event_comment" rows="3" cols="30"><?php echo $event_comment; ?></textarea>
		<br>

		<p>開始時間</p>
		<div class = "pulldown_3">

		<select name="year1" id="year1">
<?php
$year = date('Y');
for ($i = $year; $i <=($year+3); $i++) {
   print ('<option value="' . $i. '">' . $i . '</option>');
   }
 ?>
			</select>
			<span>年</span>
			<select name="month1" id="month1">
<?php
for ($i = 1; $i <=12; $i++) {
   print ('<option value="' . $i. '">' . $i . '</option>');
   }
 ?>
			</select>
			<span>月</span>
			<select name="day1" id="day1">
<?php
for ($i = 1; $i <= 31; $i++) {
   print ('<option value="' . $i. '">' . $i . '</option>');
   }
 ?>
 			</select>
			<span>日</span>
</div>
<div class = "pulldown_3">

			<select name="hour1" id="hour1">
<?php
		   for ($i = 0; $i <= 23; $i++) {
		   print ('<option value="' . $i. '">' . $i . '</option>');
		   }
?>
		    </select>
		   <span>時</span>
		    <select name="minute1" id="minute1">
<?php
		   for ($i = 0; $i <= 50; $i+=10) {
		   print ('<option value="' . $i. '">' . $i . '</option>');
		   }
?>
		    </select>
			<span>分</span>
		</div>
			<br>

			<p>終了時間</p>
			<div class = "pulldown_3">
			<select name="year2" id="year2">
<?php
			for ($i = $year; $i <=($year+3); $i++) {
				print ('<option value="' . $i. '">' . $i . '</option>');
			}
?>
			</select>
			<span>年</span>
			<select name="month2" id="month2">
<?php
			for ($i = 1; $i <=12; $i++) {
				print ('<option value="' . $i. '">' . $i . '</option>');
			}
?>
			</select>
			<span>月</span>
			<select name="day2" id="day2">
<?php
			for ($i = 1; $i <= 31; $i++) {
				print ('<option value="' . $i. '">' . $i . '</option>');
			}
?>
			</select>
			<span>日</span>
		</div>
		<div class = "pulldown_3">
			<select name="hour2" id="hour2">
<?php
	for ($i = 0; $i <= 23; $i++) {
		print ('<option value="' . $i. '">' . $i . '</option>');
	}
?>
			</select>
			<span>時</span>
		<select name="minute2" id="minute2">
<?php
	for ($i = 0; $i <= 50; $i+=10) {
		print ('<option value="' . $i. '">' . $i . '</option>');
	}
?>
	</select>
	<span>分</span>
</div>
	<br>
	<br>

    <button type="submit" name="Btn1" value="Btn1" class="btn--blue">確定</button>

</form>
<?php
mysqli_close($link);
?>
<br>
<form method="get" action="top.php">


	<button type="submit" name="Btn2" value="Btn2" class="btn--white">ホームページへ</button>
	<!--『変更せずにホームへ』とかもあり？統一感なくなっちゃうから要相談-->
</form>
		</article>
<footer></footer>

<!--js読み込み-->
	<script src = "event_edit.js"></script>

    </body>
</html>
