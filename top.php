<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>大谷研在室日時確認システム</title>
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/common.css">
    </head>
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
	if(!$result){
		$result1 = mysqli_query($link,"CREATE DATABASE $dbname CHARACTER SET utf8");
		if(!$result1) { echo "db failed"; }
		$result2 = mysqli_query($link,"USE $dbname");
		if(!$result2) { echo "use failed"; }
		$result3 = mysqli_query($link,"CREATE TABLE $tablename (num numeric(8) PRIMARY KEY, gnum numeric(2) NOT NULL, sei varchar(100) binary NOT NULL, mei varchar(100) binary  NOT NULL, when1 datetime not null, when2 datetime not null, comment varchar(1000) binary, event_num numeric(8) not null) character set utf8");
		if(!$result3) { echo "table1 failed"; }
		$result4 = mysqli_query($link,"CREATE TABLE $tablename2 (num numeric(8) PRIMARY KEY, event_name varchar(100) binary not null, event_comment varchar(1000) binary,event_time1 datetime not null, event_time2 datetime not null) character set utf8");
		if(!$result4) { echo "table2 failed"; }
	}

	//Basic認証
	$user = 'user';
	$user_pass = '1234';

	$admin = 'admin';
	$admin_pass = '1234';

?>
	<body>
		<header>
			<h1> 大谷研在室日時確認システム</h1>
		</header>

		<article>

<?php
	//アドミンの画面（イベント追加、変更削除)
	if(isset($_SERVER['PHP_AUTH_USER']) && ($_SERVER["PHP_AUTH_USER"]==$admin && $_SERVER["PHP_AUTH_PW"]==$admin_pass)){
?>

		<h1 id="res"> イベント追加画面 </h1>

		<?php
		$count4 = 0; //ゲットできているかどうかのカウント

		if(!isset($_GET['Txt1e'])) {
		    $errors[] = 'error1e';
		}elseif($_GET['Txt1e'] === '') {
		    $errors[] = 'error1e';
		}else{
			$ae=$_GET['Txt1e'];
			$count4++;
		}
		if(!isset($_GET['Txt2e'])) {
		    $errors[] = 'error2e';
		}elseif($_GET['Txt2e'] === '') {
		    $errors[] = 'error2e';
		}else{
			$be=$_GET['Txt2e'];
			$count4++;
		}
		if(!isset($_GET['Txt3e'])) {
		    $errors[] = 'error3e';
		}elseif($_GET['Txt3e'] === '') {
		    $errors[] = 'error3e';
		}else{
			$ce=$_GET['Txt3e'];
			if(0 <= $ce && $ce <= 9){
				$ce = '0' . "$ce";
			}
			$count4++;
		}
		if(!isset($_GET['Txt4e'])) {
		    $errors[] = 'error4e';
		}elseif($_GET['Txt4e'] === '') {
		    $errors[] = 'error4e';
		}else{
			$de=$_GET['Txt4e'];
			if(0 <= $de && $de <= 9){
				$de = '0' . "$de";
			}
			$count4++;
		}
		if(!isset($_GET['Txt5e'])) {
		    $errors[] = 'error5e';
		}elseif($_GET['Txt5e'] === '') {
		    $errors[] = 'error5e';
		}else{
			$ee=$_GET['Txt5e'];
			if(0 <= $ee && $ee <= 9){
				$ee = '0' . "$ee";
			}
			$count4++;
		}
		if(!isset($_GET['Txt6e'])) {
		    $errors[] = 'error6e';
		}elseif($_GET['Txt6e'] === '') {
		    $errors[] = 'error6e';
		}else{
			$fe=$_GET['Txt6e'];
			if(0 <= $fe && $fe <= 9){
				$fe = '0' . "$fe";
			}
			$count4++;
		}
		if(!isset($_GET['Txt7e'])) {
		    $errors[] = 'error7e';
		}elseif($_GET['Txt7e'] === '') {
		    $errors[] = 'error7e';
		}else{
			$ge=$_GET['Txt7e'];
			if(0 <= $ge && $ge <= 9){
				$ge = '0' . "$ge";
			}
			$count4++;
		}
		if(!isset($_GET['Txt8e'])) {
		    $errors[] = 'error8e';
		}elseif($_GET['Txt8e'] === '') {
		    $errors[] = 'error8e';
		}else{
			$he=$_GET['Txt8e'];
			$count4++;
		}
		if(!isset($_GET['Txt9e'])) {
		    $errors[] = 'error9e';
		}elseif($_GET['Txt9e'] === '') {
		    $errors[] = 'error9e';
		}else{
			$ie=$_GET['Txt9e'];
			if(0 <= $ie && $ie <= 9){
				$ie = '0' . "$ie";
			}
			$count4++;
		}
		if(!isset($_GET['Txt10e'])) {
		    $errors[] = 'error10e';
		}elseif($_GET['Txt10e'] === '') {
		    $errors[] = 'error10e';
		}else{
			$je=$_GET['Txt10e'];
			if(0 <= $je && $je <= 9){
				$je = '0' . "$je";
			}
			$count4++;
		}
		if(!isset($_GET['Txt11e'])) {
		    $errors[] = 'error11e';
		}elseif($_GET['Txt11e'] === '') {
		    $errors[] = 'error11e';
		}else{
			$ke=$_GET['Txt11e'];
			if(0 <= $ke && $ke <= 9){
				$ke = '0' . "$ke";
			}
			$count4++;
		}
		if(!isset($_GET['Txt12e'])) {
		    $errors[] = 'error12e';
		}elseif($_GET['Txt12e'] === '') {
		    $errors[] = 'error12e';
		}else{
			$le=$_GET['Txt12e'];
			if(0 <= $le && $le <= 9){
				$le = '0' . "$le";
			}
			$count4++;
		}
		//コメントがある場合とない場合の分岐
		if($count4 == 11){
			$event_time1 = $ce . "-" . $de. "-" .$ee. " " .$fe. ":" .$ge. ":" .'00';
			$event_time2 = $he . "-" . $ie. "-" .$je. " " .$ke. ":" .$le. ":" .'00';

			$result1 = mysqli_query($link,"SELECT max(num) FROM $tablename2");
			if(!$result1){ exit("Select error on table ($tablename2)!"); }
			$me = mysqli_fetch_array($result1)[0] + 1;

			$pre_num = $me - 1;

			$result1 = mysqli_query($link,"SELECT event_name FROM $tablename2 where num = $pre_num");
			if(!$result1){ exit("aaSelect error on table ($tablename2)!"); }
			$pre_event_name = mysqli_fetch_array($result1)[0];
			$result1 = mysqli_query($link,"SELECT event_time1 FROM $tablename2 where  num = $pre_num");
			if(!$result1){ exit("aaSelect error on table ($tablename2)!"); }
			$pre_event_time1 = mysqli_fetch_array($result1)[0];
			$result1 = mysqli_query($link,"SELECT event_time2 FROM $tablename2 where  num = $pre_num");
			if(!$result1){ exit("aaSelect error on table ($tablename2)!"); }
			$pre_event_time2 = mysqli_fetch_array($result1)[0];

			$timestamp_time1 = strtotime($event_time1);
			$timestamp_pre_time1 = strtotime($pre_event_time1);
			$timestamp_time2 = strtotime($event_time2);
			$timestamp_pre_time2 = strtotime($pre_event_time2);

			if($ae == $pre_event_name && $timestamp_time1 == $timestamp_pre_time1 && $timestamp_time2 == $timestamp_pre_time2){
				echo "重複しています";
			}else if($timestamp_time1 >= $timestamp_time2){
				echo "開始時間と終了時間に問題があります";
			}else{
				$result1 = mysqli_query($link,"INSERT INTO $tablename2 (num, event_name, event_time1, event_time2) VALUES ('".$me."','".$ae."', '".$event_time1."','".$event_time2."')");
				if(! $result1){ echo "追加できませんでした";}
				else{echo "追加完了しました";}
			}
		}else if($count4 == 12){
			$event_time1 = $ce . "-" . $de. "-" .$ee. " " .$fe. ":" .$ge. ":" .'00';
			$event_time2 = $he . "-" . $ie. "-" .$je. " " .$ke. ":" .$le. ":" .'00';

			$result1 = mysqli_query($link,"SELECT max(num) FROM $tablename2");
			if(!$result1){ exit("Select error on table ($tablename2)!"); }
			$me = mysqli_fetch_array($result1)[0] + 1;

			$pre_num = $me - 1;

			$result1 = mysqli_query($link,"SELECT event_name FROM $tablename2 where num = $pre_num");
			if(!$result1){ exit("aaSelect error on table ($tablename)!"); }
			$pre_event_name = mysqli_fetch_array($result1)[0];
			$result1 = mysqli_query($link,"SELECT event_time1 FROM $tablename2 where  num = $pre_num");
			if(!$result1){ exit("aaSelect error on table ($tablename)!"); }
			$pre_event_time1 = mysqli_fetch_array($result1)[0];
			$result1 = mysqli_query($link,"SELECT event_time2 FROM $tablename2 where  num = $pre_num");
			if(!$result1){ exit("aaSelect error on table ($tablename)!"); }
			$pre_event_time2 = mysqli_fetch_array($result1)[0];
			$result1 = mysqli_query($link,"SELECT event_comment FROM $tablename2 where  num = $pre_num");
			if(!$result1){ exit("aaSelect error on table ($tablename)!"); }
			$pre_event_comment = mysqli_fetch_array($result1)[0];

			$timestamp_time1 = strtotime($event_time1);
			$timestamp_pre_time1 = strtotime($pre_event_time1);
			$timestamp_time2 = strtotime($event_time2);
			$timestamp_pre_time2 = strtotime($pre_event_time2);

			if($ae == $pre_event_name && $timestamp_time1 == $timestamp_pre_time1 && $timestamp_time2 == $timestamp_pre_time2 && $be == $pre_event_comment){
				echo "重複しています";
			}else if($timestamp_time1 >= $timestamp_time2){
				echo "開始時間と終了時間に問題があります";
			}else{
				$result1 = mysqli_query($link,"INSERT INTO $tablename2 (num, event_name, event_comment, event_time1, event_time2) VALUES ('".$me."','".$ae."','".$be."', '".$event_time1."','".$event_time2."')");
				if(! $result1){ echo "追加できませんでした"; }
				else{echo "追加完了しました";}
			}
		}
		?>
		<?php
			if(!isset($_GET['event_num'])) {
			    $errors[] = 'error8a';
			}elseif($_GET['event_num'] === '') {
			    $errors[] = 'error8a';
			}else{
				$event_num=$_GET['event_num'];
				$result = mysqli_query($link,"DELETE FROM $tablename2 WHERE num = $event_num");

				$result2 = mysqli_query($link,"DELETE FROM $tablename WHERE event_num = $event_num");

			}
			$count = 0;
			$count2 = 0;
			$count3 = 0;
			if(!isset($_GET['event_num2'])) {
			    $errors[] = 'error8a';
			}elseif($_GET['event_num2'] === '') {
			    $errors[] = 'error8a';
			}else{
				$event_num = $_GET['event_num2'];
			}
			if(!isset($_GET['event_name'])) {
			    $errors[] = 'error6e';
			}elseif($_GET['event_name'] === '') {
			    $errors[] = 'error6e';
			}else{
				$event_name=$_GET['event_name'];
				$count = 1;
			}
			if(!isset($_GET['event_comment'])) {
				$errors[] = 'error6e';
			}elseif($_GET['event_comment'] === '') {
				$event_comment="";
				$count2 = 1;
			}else{
				$event_comment=$_GET['event_comment'];
				$count2 = 1;
			}
			if(!isset($_GET['year1'])) {
			    $errors[] = 'error4a';
			}elseif($_GET['year1'] === '') {
			    $errors[] = 'error4a';
			}else{
				$year1=$_GET['year1'];
			}
			if(!isset($_GET['month1'])) {
			    $errors[] = 'error4a';
			}elseif($_GET['month1'] === '') {
			    $errors[] = 'error4a';
			}else{
				$month1=$_GET['month1'];
				if(0 <= $month1 && $month1 <= 9){
					$month1 = '0' . "$month1";
				}
			}
			if(!isset($_GET['day1'])) {
			    $errors[] = 'error4a';
			}elseif($_GET['day1'] === '') {
			    $errors[] = 'error4a';
			}else{
				$day1=$_GET['day1'];
				if(0 <= $day1 && $day1 <= 9){
					$day1 = '0' . "$day1";
				}
			}
			if(!isset($_GET['hour1'])) {
			    $errors[] = 'error4a';
			}elseif($_GET['hour1'] === '') {
			    $errors[] = 'error4a';
			}else{
				$hour1=$_GET['hour1'];
				if(0 <= $hour1 && $hour1 <= 9){
					$hour1 = '0' . "$hour1";
				}
			}
			if(!isset($_GET['minute1'])) {
			    $errors[] = 'error4a';
			}elseif($_GET['minute1'] === '') {
			    $errors[] = 'error4a';
			}else{
				$minute1=$_GET['minute1'];
				if(0 <= $minute1 && $minute1 <= 9){
					$minute1 = '0' . "$minute1";
				}
			}
			if(!isset($_GET['year2'])) {
			    $errors[] = 'error4a';
			}elseif($_GET['year2'] === '') {
			    $errors[] = 'error4a';
			}else{
				$year2=$_GET['year2'];
			}
			if(!isset($_GET['month2'])) {
			    $errors[] = 'error4a';
			}elseif($_GET['month2'] === '') {
			    $errors[] = 'error4a';
			}else{
				$month2=$_GET['month2'];
				if(0 <= $month2 && $month2 <= 9){
					$month2 = '0' . "$month2";
				}
			}
			if(!isset($_GET['day2'])) {
			    $errors[] = 'error4a';
			}elseif($_GET['day2'] === '') {
			    $errors[] = 'error4a';
			}else{
				$day2=$_GET['day2'];
				if(0 <= $day2 && $day2 <= 9){
					$day2 = '0' . "$day2";
				}
			}
			if(!isset($_GET['hour2'])) {
			    $errors[] = 'error4a';
			}elseif($_GET['hour2'] === '') {
			    $errors[] = 'error4a';
			}else{
				$hour2=$_GET['hour2'];
				if(0 <= $hour2 && $hour2 <= 9){
					$hour2 = '0' . "$hour2";
				}
			}
			if(!isset($_GET['minute2'])) {
			    $errors[] = 'error4a';
			}elseif($_GET['minute2'] === '') {
			    $errors[] = 'error4a';
			}else{
				$minute2=$_GET['minute2'];
				if(0 <= $minute2 && $minute2 <= 9){
					$minute2 = '0' . "$minute2";
				}
				$count3 = 1;
			}
			if($count ==1){
				$result = mysqli_query($link,"update $tablename2 set event_name = '".$event_name."' where num = '".$event_num."'");
			}
			if($count2 == 1){
				$result = mysqli_query($link,"update $tablename2 set event_comment = '".$event_comment."' where num = '".$event_num."'");
			}
			if($count3 == 1){
				$when1 = $year1 . $month1 . $day1 . $hour1 . $minute1 .'00';
				$when2 = $year2 . $month2 . $day2 . $hour2 . $minute2 .'00';
				$timestamp_time1 = strtotime($when1);
				$timestamp_time2 = strtotime($when2);
				if($timestamp_time1 >= $timestamp_time2){
					echo "開始時間と終了時間に問題があります";
				}else{
					$result = mysqli_query($link,"update $tablename2 set event_time1 = '".$when1."' where num = '".$event_num."'");
					$result = mysqli_query($link,"update $tablename2 set event_time2 = '".$when2."' where num = '".$event_num."'");
				}

			}
			$result_count = mysqli_query($link,"SELECT count(*) FROM $tablename2 order by num desc");
			if(!$result_count){ exit("Select error on table ($tablename2)!"); }
			$result = mysqli_query($link,"SELECT num FROM $tablename2 order by num desc");
			if(!$result){ exit("Select error on table ($tablename2)!"); }
			$result2 = mysqli_query($link,"SELECT event_name FROM $tablename2 order by num desc");
			if(!$result2){ exit("Select error on table ($tablename2)!"); }

			$count = mysqli_fetch_array($result_count)[0];
		?>
			<form method="get" action="event_addition.php">

				<button type="submit" name="Btn1" value="Btn1" class="btn--blue">追加</button>

			</form>
			<form method="get" action="event_edit.php">
				<select name="event_num" id="pull_down1">
				<?php
					for($i =0; $i < $count; $i++){
					$num = mysqli_fetch_array($result)[0];
					$name = mysqli_fetch_array($result2)[0];
					print ('<option value="' . $num . '">' . $name . '</option>');
					}
				?>
				</select>

			<button type="submit" name="Btn1" value="Btn1" class="btn--red">このイベントを削除・変更する</button>

			</form>
			<hr color = "black">
<?php
	}else if(isset($_SERVER['PHP_AUTH_USER']) && ($_SERVER["PHP_AUTH_USER"]==$user && $_SERVER["PHP_AUTH_PW"]==$user_pass)){
	}else {
		header("WWW-Authenticate: Basic realm=\"basic\"");
		header("HTTP/1.0 401 Unauthorized - basic");
		echo "<p>Unauthorized</p>";
		exit();
	}
?>

		<form method="get" action="top.php">
			<h3>イベント選択</h3><select name="Txt1h" id="pull_down1">


		<?php
			$result_count = mysqli_query($link,"SELECT count(*) FROM $tablename2 order by num desc");
			if(!$result_count){ exit("Select error on table ($tablename2)!"); }
			$result = mysqli_query($link,"SELECT num FROM $tablename2 order by num desc");
			if(!$result){ exit("Select error on table ($tablename2)!"); }
			$result2 = mysqli_query($link,"SELECT event_name FROM $tablename2 order by num desc");
			if(!$result2){ exit("Select error on table ($tablename2)!");}
			$count = mysqli_fetch_array($result_count)[0];

			for($i =0; $i < $count; $i++){
			$num = mysqli_fetch_array($result)[0];
			$name = mysqli_fetch_array($result2)[0];
			print ('<option value="' . $num . '">' . $name . '</option>');
			}
		?>
			</select>

			<button type="submit" name="Btn1" value="Btn1" class="btn--blue">このイベントを見る</button>

		</form>
		<br>
		<?php
			if(!isset($_GET['Txt1h'])) {
			    $errors[] = 'error1h';
			}elseif($_GET['Txt1h'] === '') {
			    $errors[] = 'error1h';
			}else{
				$ah=$_GET['Txt1h'];
				$result1 = mysqli_query($link,"SELECT event_time1 FROM $tablename2 where num = $ah");
				if(!$result1){ exit("Select error on table ($tablename2)!"); }
				$result2 = mysqli_query($link,"SELECT event_time2 FROM $tablename2 where num = $ah");
				if(!$result2){ exit("Select error on table ($tablename2)!"); }
				$result3 = mysqli_query($link,"SELECT event_name FROM $tablename2 where num = $ah");
				if(!$result3){ exit("Select error on table ($tablename2)!"); }
				$result4 = mysqli_query($link,"SELECT event_comment FROM $tablename2 where num = $ah");
				if(!$result4){ exit("Select error on table ($tablename2)!"); }
				$event_name = mysqli_fetch_array($result3)[0];
				$event_comment = mysqli_fetch_array($result4)[0];

				echo "<h1 id='res'> $event_name </h1> ";
				echo "<p>イベント詳細　：$event_comment</p>"; ?> <br> <?php


				$timestamp = strtotime(mysqli_fetch_array($result1)[0]);
				$time1 = strtotime(date( "Y-m-d 00:00:00", $timestamp));

				$timestamp = strtotime(mysqli_fetch_array($result2)[0]);
				$time2 = strtotime(date( "Y-m-d 00:00:00", $timestamp));
				?>


				<div class="box--days">

				<?php
				$count1 = 0;
				for($i = $time1; $i <= $time2; $i+=86400){
					$timestamp = $i;
					$time3 =date( "Y-m-d 00:00:00", $timestamp);
					$time4 = date( "Y-m-d 23:59:59", $timestamp);
					$time5[$count1] =date( "Y-m-d 00:00:00", $timestamp);
					$result1 = mysqli_query($link,"SELECT sei FROM $tablename where event_num = $ah and when1 between '$time3' and '$time4'");
						if(!$result1){ exit("aaSelect error on table ($tablename)!"); }
					$result2 = mysqli_query($link,"SELECT mei FROM $tablename where event_num = $ah and when1 between '$time3' and '$time4'");
						if(!$result2){ exit("bbSelect error on table ($tablename)!"); }
					$result3 = mysqli_query($link,"SELECT comment FROM $tablename where event_num = $ah and when1 between '$time3' and '$time4'");
						if(!$result3){ exit("ccSelect error on table ($tablename)!"); }
					$result_count = mysqli_query($link,"SELECT count(*) FROM $tablename where event_num = $ah and when1 between '$time3' and '$time4'");
						if(!$result_count){ exit("ddSelect error on table ($tablename)!"); }
					$count = mysqli_fetch_array($result_count)[0];
					?>

					<div class="box--day">
						<form method="get" action="days.php">
						<input type="hidden" name="Txta" value="<?php echo "$ah";?>">
						<input type="hidden" name="<?php echo "hidden" . "$count1";?>" value="<?php echo $time5[$count1];?>">
						<button type="submit" name="Btn1" value="Btn1" class="btn--blue--ex"><?php echo date( "m月d日", $timestamp);?></button>

						</form>
						<br>
						<?php
						for($j =0; $j < $count; $j++){
							$sei = mysqli_fetch_array($result1)[0];
							$mei = mysqli_fetch_array($result2)[0];
							$comment = mysqli_fetch_array($result3)[0];
							echo $sei . $mei . " | " . $comment; ?> <br> <?php
						}
						?>
					</div>
					<br> <br><?php

					$count1++;
				}
			}
		?>
		<?php
		$count3 = 0;

		if(!isset($_GET['Txt1a'])) {
		    $errors[] = 'error1a';
		}elseif($_GET['Txt1a'] === '') {
		    $errors[] = 'error1a';
		}else{
			$a1=$_GET['Txt1a'];
			$count3++;
		}
		if(!isset($_GET['Txt2a'])) {
		    $errors[] = 'error2a';
		}elseif($_GET['Txt2a'] === '') {
		    $errors[] = 'error2a';
		}else{
			$b1=$_GET['Txt2a'];
			$count3++;
		}
		if(!isset($_GET['Txt3a'])) {
		    $errors[] = 'error3a';
		}elseif($_GET['Txt3a'] === '') {
		    $errors[] = 'error3a';
		}else{
			$c1=$_GET['Txt3a'];
			if(0 <= $c1 && $c1 <= 9){
				$c1 = '0' . "$c1";
			}
			$count3++;
		}
		if(!isset($_GET['Txt4a'])) {
		    $errors[] = 'error4a';
		}elseif($_GET['Txt4a'] === '') {
		    $errors[] = 'error4a';
		}else{
			$d1=$_GET['Txt4a'];
			if(0 <= $d1 && $d1 <= 9){
				$d1 = '0' . "$d1";
			}
			$count3++;
		}
		if(!isset($_GET['Txt5a'])) {
		    $errors[] = 'error5a';
		}elseif($_GET['Txt5a'] === '') {
		    $errors[] = 'error5a';
		}else{
			$e1=$_GET['Txt5a'];
			if(0 <= $e1 && $e1 <= 9){
				$e1 = '0' . "$e1";
			}
			$count3++;
		}
		if(!isset($_GET['Txt6a'])) {
		    $errors[] = 'error6a';
		}elseif($_GET['Txt6a'] === '') {
		    $errors[] = 'error6a';
		}else{
			$f1=$_GET['Txt6a'];
			if(0 <= $f1 && $f1 <= 9){
				$f1 = '0' . "$f1";
			}
			$count3++;
		}
		if(!isset($_GET['Txt7a'])) {
		    $errors[] = 'error7a';
		}elseif($_GET['Txt7a'] === '') {
		    $errors[] = 'error7a';
		}else{
			$g1=$_GET['Txt7a'];
			$count3++;
		}
		if(!isset($_GET['Txt8a'])) {
		    $errors[] = 'error8a';
		}elseif($_GET['Txt8a'] === '') {
		    $errors[] = 'error8a';
		}else{
			$h1=$_GET['Txt8a'];
			$count3++;
		}
		if(!isset($_GET['Txt9a'])) {
		    $errors[] = 'error9a';
		}elseif($_GET['Txt9a'] === '') {
		    $errors[] = 'error9a';
		}else{
			$i1=$_GET['Txt9a'];
			$count3++;
		}
		if(!isset($_GET['Txt10a'])) {
		    $errors[] = 'error10a';
		}elseif($_GET['Txt10a'] === '') {
		    $errors[] = 'error10a';
		}else{
			$j1=$_GET['Txt10a'];
			$count3++;
		}
		if(!isset($_GET['Txt11a'])) {
		    $errors[] = 'error11a';
		}elseif($_GET['Txt11a'] === '') {
		    $errors[] = 'error11a';
		}else{
			$k1=$_GET['Txt11a'];
			if($k1 >= 2000){
				$k1 -= 2000;
			}
			$count3++;
		}
		if(!isset($_GET['Txt12a'])) {
		    $errors[] = 'error12a';
		}elseif($_GET['Txt12a'] === '') {
		    $errors[] = 'error12a';
		}else{
			$m1=$_GET['Txt12a'];
			$count3++;
		}

		if($count3 == 11){

			$when11 = $h1 . "-" . $i1. "-" .$j1. " " .$c1. ":" .$d1. ":" .'00';
			$when21 = $h1 . "-" . $i1. "-" .$j1. " " .$e1. ":" .$f1. ":" .'00';


			$result1 = mysqli_query($link,"SELECT max(num) FROM $tablename");
			if(!$result1){ exit("Select error on table ($tablename)!"); }
			$l1 = mysqli_fetch_array($result1)[0] + 1;

			$pre_num = $l1 - 1;

			$result1 = mysqli_query($link,"SELECT gnum FROM $tablename where num = $pre_num");
			if(!$result1){ exit("aaSelect error on table ($tablename)!"); }
			$pre_gnum = mysqli_fetch_array($result1)[0];
			$result1 = mysqli_query($link,"SELECT sei FROM $tablename where num = $pre_num");
			if(!$result1){ exit("aaSelect error on table ($tablename)!"); }
			$pre_sei = mysqli_fetch_array($result1)[0];
			$result1 = mysqli_query($link,"SELECT mei FROM $tablename where num = $pre_num");
			if(!$result1){ exit("aaSelect error on table ($tablename)!"); }
			$pre_mei = mysqli_fetch_array($result1)[0];
			$result1 = mysqli_query($link,"SELECT when1 FROM $tablename where num = $pre_num");
			if(!$result1){ exit("aaSelect error on table ($tablename)!"); }
			$pre_when1 = mysqli_fetch_array($result1)[0];
			$result1 = mysqli_query($link,"SELECT when2 FROM $tablename where num = $pre_num");
			if(!$result1){ exit("aaSelect error on table ($tablename)!"); }
			$pre_when2 = mysqli_fetch_array($result1)[0];
			$result1 = mysqli_query($link,"SELECT event_num FROM $tablename where num = $pre_num");
			if(!$result1){ exit("aaSelect error on table ($tablename)!"); }
			$pre_event_num = mysqli_fetch_array($result1)[0];

			$timestamp_when11 = strtotime($when11);
			$timestamp_pre_when1 = strtotime($pre_when1);
			$timestamp_when21 = strtotime($when21);
			$timestamp_pre_when2 = strtotime($pre_when2);

			if($k1 == $pre_gnum && $a1 == $pre_sei && $b1 == $pre_mei && $timestamp_when11 == $timestamp_pre_when1 && $timestamp_when21 == $timestamp_pre_when2 && $m1 == $pre_event_num){
				echo "重複しています";
			}else if($timestamp_when11 >= $timestamp_when21){
				echo "開始時間と終了時間に問題があります";
			}else{
				$result1 = mysqli_query($link,"INSERT INTO $tablename (num, gnum, sei, mei, when1, when2, event_num) VALUES ('".$l1."','".$k1."', '".$a1."', '".$b1."', '".$when11."', '".$when21."', '".$m1."')");
				if(! $result1){ exit("追加できませんでした1"); }
				else{echo "追加完了しました";}
			}
		}else if($count3 == 12){
			$when11 = $h1 . "-" . $i1. "-" .$j1. " " .$c1. ":" .$d1. ":" .'00';
			$when21 = $h1 . "-" . $i1. "-" .$j1. " " .$e1. ":" .$f1. ":" .'00';
			$result1 = mysqli_query($link,"SELECT max(num) FROM $tablename");
			if(!$result1){ exit("Select error on table ($tablename)!"); }
			$l1 = mysqli_fetch_array($result1)[0] + 1;
			$pre_num = $l1 - 1;

			$result1 = mysqli_query($link,"SELECT gnum FROM $tablename where num = $pre_num");
			if(!$result1){ exit("aaSelect error on table ($tablename)!"); }
			$pre_gnum = mysqli_fetch_array($result1)[0];
			$result1 = mysqli_query($link,"SELECT sei FROM $tablename where num = $pre_num");
			if(!$result1){ exit("aaSelect error on table ($tablename)!"); }
			$pre_sei = mysqli_fetch_array($result1)[0];
			$result1 = mysqli_query($link,"SELECT mei FROM $tablename where num = $pre_num");
			if(!$result1){ exit("aaSelect error on table ($tablename)!"); }
			$pre_mei = mysqli_fetch_array($result1)[0];
			$result1 = mysqli_query($link,"SELECT when1 FROM $tablename where num = $pre_num");
			if(!$result1){ exit("aaSelect error on table ($tablename)!"); }
			$pre_when1 = mysqli_fetch_array($result1)[0];
			$result1 = mysqli_query($link,"SELECT when2 FROM $tablename where num = $pre_num");
			if(!$result1){ exit("aaSelect error on table ($tablename)!"); }
			$pre_when2 = mysqli_fetch_array($result1)[0];
			$result1 = mysqli_query($link,"SELECT event_num FROM $tablename where num = $pre_num");
			if(!$result1){ exit("aaSelect error on table ($tablename)!"); }
			$pre_event_num = mysqli_fetch_array($result1)[0];
			$result1 = mysqli_query($link,"SELECT comment FROM $tablename where num = $pre_num");
			if(!$result1){ exit("aaSelect error on table ($tablename)!"); }
			$pre_comment = mysqli_fetch_array($result1)[0];

			$timestamp_when11 = strtotime($when11);
			$timestamp_pre_when1 = strtotime($pre_when1);
			$timestamp_when21 = strtotime($when21);
			$timestamp_pre_when2 = strtotime($pre_when2);

			if($k1 == $pre_gnum && $a1 == $pre_sei && $b1 == $pre_mei && $timestamp_when11 == $timestamp_pre_when1 && $timestamp_when21 == $timestamp_pre_when2 && $m1 == $pre_event_num && $g1 == $pre_comment){
				echo "重複しています";
			}else if($timestamp_when11 >= $timestamp_when21){
				echo "開始時間と終了時間に問題があります";
			}else{
				$result1 = mysqli_query($link,"INSERT INTO $tablename (num, gnum, sei, mei, when1, when2, comment, event_num) VALUES ('".$l1."','".$k1."', '".$a1."', '".$b1."', '".$when11."', '".$when21."', '".$g1."', '".$m1."')");
				if(! $result1){ echo "追加できませんでした2"; }
				else{echo "追加完了しました";}
			}

		}
		?>
		<?php
		mysqli_free_result($result);

		mysqli_close($link);
		?>

				</div>
		</article>
		<footer></footer>

    </body>

</html>
