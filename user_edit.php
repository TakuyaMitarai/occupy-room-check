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
			<h1 id="res">ユーザー削除変更画面</h1>


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
	if(!isset($_GET['Txta'])) {
		$errors[] = 'errora';
	}elseif($_GET['Txta'] === '') {
		$errors[] = 'errora';
	}else{
		$a=$_GET['Txta'];
		//echo "a:".$a;

		$result_event_start = mysqli_query($link,"SELECT event_time1 FROM $tablename2 where num = $a");
		if(!$result_event_start){ exit("bbSelect error on table ($tablename)!"); }
		$event_start = mysqli_fetch_array($result_event_start)[0];

		$json_RES = json_encode($event_start);


		$result_event_end = mysqli_query($link,"SELECT event_time2 FROM $tablename2 where num = $a");
		if(!$result_event_end){ exit("bbSelect error on table ($tablename)!"); }
		$event_end = mysqli_fetch_array($result_event_end)[0];

		$json_REE = json_encode($event_end);
	}
?>

<!--js変数引き渡し-->
<script>
	const js_RES = JSON.parse('<?php echo $json_RES; ?>');
	const js_REE = JSON.parse('<?php echo $json_REE; ?>');
</script>

<?php

	if(!isset($_GET['Txtb'])) {
		$errors[] = 'errorb';
	}elseif($_GET['Txtb'] === '') {
		$errors[] = 'errorb';
	}else{
		$b = $_GET['Txtb'];
		//echo "b:".$b;

		if(!isset($_GET['hidden0'])) {
			if(!isset($_GET['hidden1'])) {
				$count = 0;
			while($count != 365){
				if(!isset($_GET["edit" . "$count"])) {
					$errors[] = 'edit';
				}elseif($_GET["edit" . "$count"] === '') {
					$errors[] = 'edit';
				}else{
					$c=$_GET["edit" . "$count"];
					//echo "c:".$c;

					$count1 = 1;
					break;
				}
				$count++;
			}
			$result2 = mysqli_query($link,"SELECT gnum FROM $tablename where num = $c");
				if(!$result2){ exit("bbSelect error on table ($tablename)!"); }
			$result3 = mysqli_query($link,"SELECT sei FROM $tablename where num = $c");
				if(!$result3){ exit("bbSelect error on table ($tablename)!"); }
			$result4 = mysqli_query($link,"SELECT mei FROM $tablename where num = $c");
				if(!$result4){ exit("bbSelect error on table ($tablename)!"); }
			$result5 = mysqli_query($link,"SELECT when1 FROM $tablename where num = $c");
				if(!$result5){ exit("bbSelect error on table ($tablename)!"); }
			$result6 = mysqli_query($link,"SELECT when2 FROM $tablename where num = $c");
				if(!$result6){ exit("bbSelect error on table ($tablename)!"); }
			$result7 = mysqli_query($link,"SELECT comment FROM $tablename where num = $c");
				if(!$result7){ exit("bbSelect error on table ($tablename)!"); }

			//時間データをjsに送る処理を追加
			$when1 = mysqli_fetch_array($result5)[0];
			$when_convert = $when1;
			$json_Start = json_encode($when_convert);

			$when2 = mysqli_fetch_array($result6)[0];
			$when_converter = $when2;
			$json_End = json_encode($when_converter);


        echo "ユーザ情報";
?><br>

<script>
	const js_Start = JSON.parse('<?php echo $json_Start; ?>');
	const js_End = JSON.parse('<?php echo $json_End; ?>');
</script>
<?php
      echo "<div class='user_flex'>";


			$gnum = mysqli_fetch_array($result2)[0];
			echo "<div>卒業年度：";
			echo $gnum . "</div>";
			$sei = mysqli_fetch_array($result3)[0];
			echo "<div>名前：";
			echo $sei;
			$mei = mysqli_fetch_array($result4)[0];
			echo $mei . "</div>";
			//$when1 = mysqli_fetch_array($result5)[0];

			echo "<div>入室日時：";
			echo $when1 . "</div>";
			//$when2 = mysqli_fetch_array($result6)[0];
			echo "<div>退室日時：";

			echo $when2 . "</div>";
			echo "<div>コメント：";
        
			$comment = mysqli_fetch_array($result7)[0];
			echo $comment."</div>";
			echo "</div>";
			?>
			<h1> 削除メニュー</h1>
			<form method="get" action="user_edit.php">
				<input type="hidden" name="Txta" value="<?php echo "$a";?>">
				<input type="hidden" name="hidden0" value="<?php echo "$c";?>">
				<input type="hidden" name="Txtb" value="<?php echo "$b";?>">


				<button type="submit" name="Btn2" value="Btn2" class="btn--red">削除ボタン</button>

			</form>
			<?php
			}elseif($_GET['hidden1'] === '') {
				$errors[] = 'errorb';
			}else{
				$c= $_GET['hidden1'];
			$result2 = mysqli_query($link,"SELECT gnum FROM $tablename where num = $c");
				if(!$result2){ exit("bbSelect error on table ($tablename)!"); }
			$result3 = mysqli_query($link,"SELECT sei FROM $tablename where num = $c");
				if(!$result3){ exit("bbSelect error on table ($tablename)!"); }
			$result4 = mysqli_query($link,"SELECT mei FROM $tablename where num = $c");
				if(!$result4){ exit("bbSelect error on table ($tablename)!"); }
			$result5 = mysqli_query($link,"SELECT when1 FROM $tablename where num = $c");
				if(!$result5){ exit("bbSelect error on table ($tablename)!"); }
			$result6 = mysqli_query($link,"SELECT when2 FROM $tablename where num = $c");
				if(!$result6){ exit("bbSelect error on table ($tablename)!"); }
			$result7 = mysqli_query($link,"SELECT comment FROM $tablename where num = $c");
				if(!$result7){ exit("bbSelect error on table ($tablename)!"); }
			$gnum = mysqli_fetch_array($result2)[0];


        echo "ユーザ情報";
			?><br><?php

			echo "<div class='user_flex'>";
			echo "<div>卒業年度：";
			echo $gnum . "</div>";


			$sei = mysqli_fetch_array($result3)[0];
			echo "<div>名前：";
			echo $sei;
			$mei = mysqli_fetch_array($result4)[0];
			echo $mei . "</div>";
			$when1 = mysqli_fetch_array($result5)[0];

			echo "<div>入室日時：";
			echo $when1 . "</div>";

			$when2 = mysqli_fetch_array($result6)[0];
			echo "<div>退室日時：";

			echo $when2 . "</div>";
			echo "<div>コメント：";

			$comment = mysqli_fetch_array($result7)[0];
			echo $comment . "</div>";
			echo "</div>";
			?>
					<h1> 削除メニュー</h1>
				<form method="get" action="user_edit.php">
					<input type="hidden" name="Txta" value="<?php echo "$a";?>">
					<input type="hidden" name="hidden0" value="<?php echo "$c";?>">
					<input type="hidden" name="Txtb" value="<?php echo "$b";?>">

          <button type="submit" name="Btn2" value="Btn2" class="btn--red">削除</button>


				</form>
			<?php
			}
?>
			<h1> 日時変更入力 </h1>


			<!--開始終了時刻表示-->
			<p>イベント開始日時:<?php echo $event_start?></p>
			<p>イベント終了日時:<?php echo $event_end?></p>

		<form method="get" action="days.php">
			<input type="hidden" name="Txta" value="<?php echo "$a";?>">
			<input type="hidden" name="Txt13" value="<?php echo "$c";?>">
				<select name="Txt3" id="Years">
<?php
			for ($i = 2022; $i <=2030; $i++) {
		   	print ('<option value="' . $i. '">' . $i . '</option>');
			}
?>
					</select>
					<span>年</span>
					<select name="Txt4" id="Months">
<?php
			for ($i = 1; $i <=12; $i++) {
		   	print ('<option value="' . $i. '">' . $i . '</option>');
		   	}
?>
					</select>
					<span>月</span>
					<select name="Txt5" id="Days">
<?php
		for ($i = 1; $i <= 31; $i++) {
		   print ('<option value="' . $i. '">' . $i . '</option>');
		   }
?>
		 			</select>
					<span>日</span>
		 			<br>
					<p>入室日時</p>

					<select name="Txt6" id="hour1">
<?php
			for ($i = 7; $i <= 22; $i++) {
		   		print ('<option value="' . $i. '">' . $i . '</option>');
		   	}
?>
					</select>
			   	<span>時</span>
		 			<select name="Txt7" id="minute1">
<?php
			for ($i = 0; $i <= 50; $i+=10) {
			print ('<option value="' . $i. '">' . $i . '</option>');
			}
?>
					</select>
					<span>分</span>
		<br>



			<p>退室日時</p>

      <select name="Txt8" id="hour2">

<?php
			for ($i = 7; $i <= 22; $i++) {
				print ('<option value="' . $i. '">' . $i . '</option>');
			}
?>
					</select>
					<span>時</span>
				<select name="Txt9" id="minute2">

		<?php
			for ($i = 0; $i <= 50; $i+=10) {
				print ('<option value="' . $i. '">' . $i . '</option>');
			}
?>
					</select>
					<span>分</span>
					<br>
		コメント<textarea name="Txt10" rows="5" cols="30"><?php echo $comment; ?></textarea>
					<br>

		<button type="submit" name="Btn1" value="Btn1" class="btn--blue">確定</button>



		</form>
		<br>
			<?php
		}else if($_GET['hidden0'] === '') {
			$errors[] = 'hidden0';
		}else{
			$c= $_GET['hidden0'];
			
			?>
			<h1> 削除確認メニュー　 </h1>


			<p>以下の情報を削除してもよろしいですか？</p><br>


			<?php
			$result2 = mysqli_query($link,"SELECT gnum FROM $tablename where num = $c");
				if(!$result2){ exit("bbSelect error on table ($tablename)!"); }
			$result3 = mysqli_query($link,"SELECT sei FROM $tablename where num = $c");
				if(!$result3){ exit("bbSelect error on table ($tablename)!"); }
			$result4 = mysqli_query($link,"SELECT mei FROM $tablename where num = $c");
				if(!$result4){ exit("bbSelect error on table ($tablename)!"); }
			$result5 = mysqli_query($link,"SELECT when1 FROM $tablename where num = $c");
				if(!$result5){ exit("bbSelect error on table ($tablename)!"); }
			$result6 = mysqli_query($link,"SELECT when2 FROM $tablename where num = $c");
				if(!$result6){ exit("bbSelect error on table ($tablename)!"); }
			$result7 = mysqli_query($link,"SELECT comment FROM $tablename where num = $c");
				if(!$result7){ exit("bbSelect error on table ($tablename)!"); }
			$gnum = mysqli_fetch_array($result2)[0];
			echo "<div class='user_flex'>";
			echo "<div>卒業年度：";
			echo $gnum . "</div>";
			$sei = mysqli_fetch_array($result3)[0];
			echo "<div>名前：";
			echo $sei;
			$mei = mysqli_fetch_array($result4)[0];
			echo $mei . "</div>";
			$when1 = mysqli_fetch_array($result5)[0];

			echo "<div>入室日時：";
			echo $when1 . "</div>";
			$when2 = mysqli_fetch_array($result6)[0];
			echo "<div>退室日時：";
			echo $when2 . "</div>";
			echo "<div>コメント：";

			$comment = mysqli_fetch_array($result7)[0];
			echo $comment."</div>";
			echo "</div>"
			?>
			<form method="get" action="days.php">
				<input type="hidden" name="Txta" value="<?php echo "$a";?>">
				<input type="hidden" name="hidden0a" value="<?php echo "$c";?>">
				<input type="hidden" name="Txtb" value="<?php echo "$b";?>">


				<button type="submit" name="Btn2" value="Btn2" class="btn--red">削除確定ボタン</button>


			</form>
			<form method="get" action="user_edit.php">
				<input type="hidden" name="Txta" value="<?php echo "$a";?>">
				<input type="hidden" name="hidden1" value="<?php echo "$c";?>">
				<input type="hidden" name="Txtb" value="<?php echo "$b";?>">


				<button type="submit" name="Btn2" value="Btn2" class="btn--white">前の画面へ戻る</button>


			</form>
			<?php
		}
	}
?>
<?php
mysqli_close($link);
?>
	<div class="btn--flex">
		<div class="btn--margin">
			<form method="get" action="days.php">
				<input type="hidden" name="Txta" value="<?php echo "$a";?>">
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
<script src = "user_edit.js"></script>
    </body>
</html>
