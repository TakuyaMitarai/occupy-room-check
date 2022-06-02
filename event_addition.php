<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
		<meta name = "viewport" content = "width=devce-width, initial-scale= 1.0, minimum-scale = 1.0">
        <title>イベント追加ページ</title>


		<!--css宣言-->

		<link rel = "stylesheet" href="css/reset.css">
		<link rel = "stylesheet" href = "css/common.css">

    </head>
    <body>
		<header>
			<h1>大谷研在室日時管理システム</h1>

		</header>
		<article>
        <h1 id="res"> イベント追加画面 </h1>

        <form method="get" action="top.php">
			<div class = "cp_iptxt">
				<label class = "ef">
					<input type = "text" name = "Txt1e" value="" placeholder="イベント名">
				</label>
			</div>

			<div class = "cp_iptxt">
				<label class ="ef">
					<textarea name= "Txt2e" rows = "5" cols = "30" placeholder="コメント"></textarea>
				</label>
			</div>

		<p>開始時間</p>
<div class = "pulldown_3">
		<select name="Txt3e" id="year1">

<?php
$year = date('Y');
//確認用構文(added by kawata)
//echo "<p>current day is $year<p>";

for ($i = $year; $i <=($year+3); $i++) {
   print ('<option value="' . $i. '">' . $i . '</option>');
   }
 ?>
			</select>
			<span>年</span>
			<select name="Txt4e" id="month1">
<?php
for ($i = 1; $i <=12; $i++) {
   print ('<option value="' . $i. '">' . $i . '</option>');
   }
 ?>
			</select>
			<span>月</span>
			<select name="Txt5e" id="day1">
<?php
for ($i = 1; $i <= 31; $i++) {
   print ('<option value="' . $i. '">' . $i . '</option>');
   }
 ?>
 			</select>
			<span>日</span>
</div>
<div class = "pulldown_3">

			<select name="Txt6e" id="years">
<?php
		   for ($i = 0; $i <= 23; $i++) {
		   print ('<option value="' . $i. '">' . $i . '</option>');
		   }
?>
		    </select>
		   	<span>時</span>
		    <select name="Txt7e" id="years">
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

			<select name="Txt8e" id="year2">
<?php
			for ($i = $year; $i <=($year+3); $i++) {
				print ('<option value="' . $i. '">' . $i . '</option>');
			}
?>
			</select>
			<span>年</span>
			<select name="Txt9e" id="month2">
<?php
			for ($i = 1; $i <=12; $i++) {
				print ('<option value="' . $i. '">' . $i . '</option>');
			}
?>
			</select>
			<span>月</span>
			<select name="Txt10e" id="day2">
<?php
			for ($i = 1; $i <= 31; $i++) {
				print ('<option value="' . $i. '">' . $i . '</option>');
			}
?>
			</select>
			<span>日</span>
		</div>
			<div class = "pulldown_3">
			<select name="Txt11e" id="years">
<?php
	for ($i = 0; $i <= 23; $i++) {
		print ('<option value="' . $i. '">' . $i . '</option>');
	}
?>
			</select>
			<span>時</span>
		<select name="Txt12e" id="years">
<?php
	for ($i = 0; $i <= 50; $i+=10) {
		print ('<option value="' . $i. '">' . $i . '</option>');
	}
?>
			</select>
			<span>分</span>
			</div>
			<br>
            <button type="submit" name="Btn1" value="Btn1" class = "btn--blue">確定ボタン</button>
        </form>

		<br>
		<form method="get" action="top.php">

			<button type="submit" name="Btn2" value="Btn2" class = "btn--white">トップページへ</button>

		</form>

		</article>
		<!--js読み込み-->

		<script src="event_addition.js"></script>
		<footer></footer>

    </body>
</html>
