<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />

        <title>日程詳細ページ</title>
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/common.css">
		<link rel="stylesheet" href="css/schedule.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
	if(!$result) { exit("USE failed!"); }

	         //Basic認証
	$user = 'user';
	$user_pass = '1234';

	$admin = 'admin';
	$admin_pass = '1234';
?>
	<body>

		<header>
			<h1>大谷研在室日時確認システム</h1>
		</header>

		<article>



<?php //ユーザー削除
	$count = 0;
	$counta =0;
	if(!isset($_GET['Txta'])) {
		$errors[] = 'errora';
	}elseif($_GET['Txta'] === '') {
		$errors[] = 'errora';
	}else{
		$event_num=$_GET['Txta'];
		$counta++;
		if(!isset($_GET['Txtb'])) {
		    $errors[] = 'errorb';
		}elseif($_GET['Txtb'] === '') {
		    $errors[] = 'errorb';
		}else{
			$event_time = $_GET['Txtb'];
		}
		if(!isset($_GET['hidden0a'])) {
		    $errors[] = 'errorb';
		}elseif($_GET['hidden0a'] === '') {
		    $errors[] = 'errorb';
		}else{
			$b = $_GET['hidden0a'];
			$counta++;
			$resultc = mysqli_query($link,"DELETE FROM $tablename WHERE num = $b");
		}
		while($count != 365){
			if(!isset($_GET["hidden" . "$count"])) {
			    $errors[] = 'error1';
			}elseif($_GET["hidden" . "$count"] === '') {
			    $errors[] = 'error1';
			}else{
				$event_time=$_GET["hidden" . "$count"];
				$counta++;
				break;
			}
			$count++;
		}
		//データベースへのユーザの変更
		$count = 0;
		$count1 = 0;
		$count2 = 0;

		if(!isset($_GET['Txt13'])) {
		    $errors[] = 'error1';
		}elseif($_GET['Txt13'] === '') {
		    $errors[] = 'error1';
		}else{
			$a=$_GET['Txt13'];
		}
		if(!isset($_GET['Txt3'])) {
		    $errors[] = 'error3';
		}elseif($_GET['Txt3'] === '') {
		    $errors[] = 'error3';
		}else{
			$c=$_GET['Txt3'];
			$count++;
		}
		if(!isset($_GET['Txt4'])) {
		    $errors[] = 'error4';
		}elseif($_GET['Txt4'] === '') {
		    $errors[] = 'error4';
		}else{
			$d=$_GET['Txt4'];
			if(0 <= $d && $d <= 9){
				$d = '0' . "$d";
			}
			$count++;
		}
		if(!isset($_GET['Txt5'])) {
		    $errors[] = 'error5';
		}elseif($_GET['Txt5'] === '') {
		    $errors[] = 'error5';
		}else{
			$e=$_GET['Txt5'];
			if(0 <= $e && $e <= 9){
				$e = '0' . "$e";
			}
			$count++;
		}
		if(!isset($_GET['Txt6'])) {
		    $errors[] = 'error6';
		}elseif($_GET['Txt6'] === '') {
		    $errors[] = 'error6';
		}else{
			$f=$_GET['Txt6'];
			if(0 <= $f && $f <= 9){
				$f = '0' . "$f";
			}
			$count1++;
		}
		if(!isset($_GET['Txt7'])) {
		    $errors[] = 'error7';
		}elseif($_GET['Txt4'] === '') {
		    $errors[] = 'error7';
		}else{
			$g=$_GET['Txt7'];
			if(0 <= $g && $g <= 9){
				$g = '0' . "$g";
			}
			$count1++;
		}
		if(!isset($_GET['Txt8'])) {
		    $errors[] = 'error8';
		}elseif($_GET['Txt8'] === '') {
		    $errors[] = 'error8';
		}else{
			$h=$_GET['Txt8'];
			if(0 <= $h && $h <= 9){
				$h = '0' . "$h";
			}
			$count2++;
		}
		if(!isset($_GET['Txt9'])) {
		    $errors[] = 'error9';
		}elseif($_GET['Txt9'] === '') {
		    $errors[] = 'error9';
		}else{
			$i=$_GET['Txt9'];
			if(0 <= $i && $i <= 9){
				$i = '0' . "$i";
			}
			$count2++;
		}

		if($count+$count1 === 5){
			$when1 = $c . $d . $e . $f . $g .'00';
			$when2 = $c . $d . $e . $h . $i .'00';
			$event_time= $c . $d . $e .'00' .'00' .'00';

			$timestamp_time1 = strtotime($when1);
			$timestamp_time2 = strtotime($when2);

			if($timestamp_time1 >= $timestamp_time2){
				echo "開始時間と終了時間に問題があります";
			}else{
				$result = mysqli_query($link,"update $tablename set  when1 = '".$when1."' where num = '".$a."'");
				$result = mysqli_query($link,"update $tablename set  when2 = '".$when2."' where num = '".$a."'");

				if(!isset($_GET['Txt10'])) {
				    $errors[] = 'error10';
				}elseif($_GET['Txt10'] === '') {
					$j="";
					$result = mysqli_query($link,"update $tablename set  comment = '".$j."' where num = '".$a."'");
				}else{
					$j=$_GET['Txt10'];
					$result = mysqli_query($link,"update $tablename set  comment = '".$j."' where num = '".$a."'");
				}
			}
		}
	}
	?>
	<?php
		$timestamp = strtotime($event_time);
		$time =  date("Y年m月d日", $timestamp);
		$result = mysqli_query($link,"SELECT event_name FROM $tablename2 where num = $event_num");
			if(!$result){ exit("Select error on table ($tablename2)!"); }
		$event_name = mysqli_fetch_array($result)[0];

		?><h1 id="res"><?php echo $time;?></h1>
		<form method="get" action="user_addition.php">
			<input type="hidden" name="Txta" value="<?php echo "$event_num";?>">
			<input type="hidden" name="Txtb" value="<?php echo "$event_time";?>">
			<button type="submit" name="Btn1" value="Btn1"class="btn--blue">在室登録ボタン</button>

		</form>
		<?php
		$timestamp = strtotime($event_time) + 86400;
		$event_time2 =  date("Y-m-d 00:00:00", $timestamp);
		?>
		<form method="get" action="days.php" class="btn--flex">
			<input type="hidden" name="Txta" value="<?php echo "$event_num";?>">
			<input type="hidden" name="Txtb" value="<?php echo "$event_time";?>">
			<div>ユーザー選択<select name="user_name" id="pull_down1">
		<?php

			$result_count = mysqli_query($link,"SELECT count(*) FROM $tablename where event_num = $event_num AND when1 between '$event_time' and '$event_time2'");
			if(!$result_count){ exit("Select error on table ($tablenamecount)!"); }
			$count = mysqli_fetch_array($result_count)[0];
			$result = mysqli_query($link,"SELECT sei FROM $tablename where event_num = $event_num AND when1 between '$event_time' and '$event_time2'");
			if(!$result){ exit("Select error on table ($tablename2)!"); }
			$result2 = mysqli_query($link,"SELECT mei FROM $tablename where event_num = $event_num AND when1 between '$event_time' and '$event_time2'");

			if(!$result2){ exit("Select error on table ($tablename2)!"); }
			$count1 = 1;
			$sei = mysqli_fetch_array($result)[0];
			$mei = mysqli_fetch_array($result2)[0];
			$name[0] = $sei . $mei;
			for($i = 1; $i < $count; $i++){
				$true = 0;
				$sei = mysqli_fetch_array($result)[0];
				$mei = mysqli_fetch_array($result2)[0];
				for($j=0; $j<$count1; $j++){
					if($name[$j] == $sei . $mei){
						$true = 1;
					}
				}
				if($true == 0){
					$name[$count1] = $sei . $mei;
					$count1++;
				}
			}
			for($i=0; $i<$count1; $i++){
				print ('<option value="' . $name[$i] . '">' . $name[$i] . '</option>');
			}
		?>
			</select></div>

			<div><button type="submit" name="Btn1" value="Btn1" class="btn--blue">このユーザーを見る</button></div>
		</form>



<!--ここから追加分，変更削除ボタン--------------------------------------------------------------------------------->


<form method="get" action="user_edit.php" class="btn--flex">
			<input type="hidden" name="Txta" value="<?php echo "$event_num";?>">
			<input type="hidden" name="Txtb" value="<?php echo "$event_time";?>">
			<div>予定を選択<select name="edit0" id="pull_down1">
		<?php

			if(!isset($_GET['user_name'])) {
				$errors[] = 'error4';
			}elseif($_GET['user_name'] === '') {
				$errors[] = 'user_name';
			}else{
				$user_name=$_GET['user_name'];
			}

			//入室，退室時間を持ってくるところ
			$result_count = mysqli_query($link,"SELECT count(*) FROM $tablename where event_num = $event_num AND '$user_name' = concat(sei, mei) AND when1 between '$event_time' and '$event_time2'");
			if(!$result_count){ exit("Select error on table ($tablenamecount)!"); }
			$count = mysqli_fetch_array($result_count)[0];
			$result = mysqli_query($link,"SELECT when1 FROM $tablename where event_num = $event_num AND '$user_name' = concat(sei, mei) AND when1 between '$event_time' and '$event_time2'");
			if(!$result){ exit("Select error on table ($tablename2)!"); }
			$result2 = mysqli_query($link,"SELECT when2 FROM $tablename where event_num = $event_num AND '$user_name' = concat(sei, mei) AND when1 between '$event_time' and '$event_time2'");

			if(!$result2){ exit("Select error on table ($tablename2)!"); }
			$count1 = 1;
			$start_time = substr(mysqli_fetch_array($result)[0], 11,5);
			$end_time = substr(mysqli_fetch_array($result2)[0], 11,5);
			$through_time[0] = $start_time . "～" . $end_time;
			for($i = 1; $i < $count; $i++){
				$true = 0;
				$start_time = substr(mysqli_fetch_array($result)[0], 11,5);
				$end_time = substr(mysqli_fetch_array($result2)[0], 11,5);
				for($j=0; $j<$count1; $j++){
					if($through_time[$j] == $start_time . "～" . $end_time){
						$true = 1;
					}
				}
				if($true == 0){
					$through_time[$count1] = $start_time . "～" . $end_time;
					$count1++;
				}
			}

			//user_numberを持ってくるところ
			if(!isset($_GET['user_name'])) {
				$errors[] = 'error4';
			}elseif($_GET['user_name'] === '') {
				$errors[] = 'user_name';
			}else{
				$timestamp = strtotime($event_time) + 86400;
				$event_time2 =  date("Y-m-d 00:00:00", $timestamp);
				$user_name=$_GET['user_name'];
				$result_count = mysqli_query($link,"SELECT count(*) FROM $tablename where event_num = $event_num AND '$user_name' = concat(sei, mei) AND when1 between '$event_time' and '$event_time2'");
				if(!$result_count){ exit("Select error on table ($tablename)!1"); }
				$count = mysqli_fetch_array($result_count)[0];
				$result= mysqli_query($link,"SELECT num FROM $tablename where  event_num = $event_num AND '$user_name' = concat(sei, mei) AND when1 between '$event_time' and '$event_time2'");
				if(!$result){ exit("Select error on table ($tablename)!2"); }
				for($i=0; $i<$count; $i++){
					$user_number[$i] = mysqli_fetch_array($result)[0];
				}
			}
			$edit = "edit"."0";
			for($i=0; $i<$count; $i++){
				print ('<option name="' . $edit . '" value="' . $user_number[$i] . '">' . $through_time[$i] . '</option>');
			}
			?>
			</select></div>



			<div>
				<button type="submit" name="Btn1" value="Btn1" class="btn--red">この予定を変更・削除</button></div>
		</form>



<!--ここまで--------------------------------------------------->




		<?php
			if(!isset($_GET['user_name'])) {
				$errors[] = 'error4';
			}elseif($_GET['user_name'] === '') {
				$errors[] = 'user_name';
			}else{
				$user_name=$_GET['user_name'];
				echo "<h1 id='res'>$user_name さん</h1> ";
			}
		?>


<?php $count_mondaiji=0; ?>




		<!-- スケジュール表 -->
		<div
        id="daily-calendar"
        style="display: flex;"
    	>
        <div class="event--flex">
		<div>
            <div v-for="n in 16" class="time-cell">
                <p class="event--time">{{ (n + 6) + ":00" }}</p>
            </div>
			<!--
				<div v-for="n in 16" class="time-cell">
                {{ (n + 6) + ":00" }}
            </div>
			-->
        </div>
        <div style="position: relative;" class="event--box">
            <div>
                <div v-for="n in 16" class="event-bg-cell"></div>
            </div>
            <div
                v-for="(event,index) in events"
                :style="{
                    top: getPosition(event.dtFrom) + 'px',
                    height: getPosition(event.dtTo) - getPosition(event.dtFrom) + 'px'
                }"
                class="event"
            >

					<div class="event--item">
						<p class="event--title">{{ event.title }}</p>





<?php


	$user_app_array =[];
	$user_number_after = [];
	if(!isset($_GET['user_name'])) {
		$errors[] = 'error4';
	}elseif($_GET['user_name'] === '') {
		$errors[] = 'user_name';
	}else{
		$timestamp = strtotime($event_time) + 86400;
		$event_time2 =  date("Y-m-d 00:00:00", $timestamp);
		$user_name=$_GET['user_name'];

		$result_count = mysqli_query($link,"SELECT count(*) FROM $tablename where event_num = $event_num AND '$user_name' = concat(sei, mei) AND when1 between '$event_time' and '$event_time2'");
		if(!$result_count){ exit("Select error on table ($tablename)!1"); }
		$count = mysqli_fetch_array($result_count)[0];
		$result= mysqli_query($link,"SELECT num FROM $tablename where event_num = $event_num AND '$user_name' = concat(sei, mei) AND when1 between '$event_time' and '$event_time2'");

		if(!$result){ exit("Select error on table ($tablename)!2"); }
		for($i=0; $i<$count; $i++){
			$user_number[$i] = mysqli_fetch_array($result)[0];
			$result2= mysqli_query($link,"SELECT when1 FROM $tablename where num = $user_number[$i]");
			if(!$result2){ exit("Select error on table ($tablename)!3"); }
			$user_time_start = mysqli_fetch_array($result2)[0];
			$result3= mysqli_query($link,"SELECT when2 FROM $tablename where num = $user_number[$i]");
			if(!$result3){ exit("Select error on table ($tablename)!4"); }
			$user_time_end = mysqli_fetch_array($result3)[0];
			$result4= mysqli_query($link,"SELECT comment FROM $tablename where num = $user_number[$i]");
			if(!$result4){ exit("Select error on table ($tablename)!5"); }
			$user_comment = mysqli_fetch_array($result4)[0];
			?> <br> <?php

			$user_app_array[] = [$user_comment, substr($user_time_start, 11,2), substr($user_time_start, 14,2), substr($user_time_end, 11,2), substr($user_time_end, 14,2), $user_number[$i], $user_time_start];
			$user_number_after[] = $user_number[$i];
			$mondaiji[$i] = $user_number[$i];
		}


	}


?>




					</div>
					

					<!--
					<form method="get" action="user_edit.php">
					<input type="hidden" name="Txta" value="<?php //echo "$event_num";?>">
					<input type="hidden" name="Txtb" value="<?php //echo "$event_time";?>">
					<input type="hidden" name="<?php //echo "edit" . "0";?>" value="<?php //echo $mondaiji[$count_mondaiji];?>">
					<button type="submit" name="Btn1" value="Btn1" class="btn--red--days" style="width: 100px;">削除・変更</button>
					</form>



				</div><div class="empty"></div>





            </div>このdivまでがv-forで呼ばれるらしい-->
			<?php
			$count_mondaiji++;
			?>








        </div>
    </div>
</div>
</div>




<?php
mysqli_close($link);
?>



<?php
    $jsonArray = json_encode($user_app_array);
?>

    <script src="https://unpkg.com/vue@next"></script>
    <script>
        let array = JSON.parse('<?php echo $jsonArray?>');
        Vue.createApp({
            data() {
                return {
                    events: [
                        <?php foreach($user_app_array as $vals){
                            echo "{";
                                echo "title:'".$vals[0]."',";
                                echo "dtFrom: new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate(),".$vals[1].",".$vals[2]."),";
                                echo "dtTo: new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate(),".$vals[3].",".$vals[4]."),";
								echo "number:'".$vals[5]."',";
								echo "time:'".$vals[6]."',";
                            echo "},";
                        } ?>
                    ]
                }
            },
            methods: {
                // 時刻からスケジュールのY位置を算出する
                getPosition: function(dateTime){
                    const now = new Date()
                    // 本日00:00のDateオブジェクト
                    const todaysStart = new Date()
                    todaysStart.setHours(0, 0, 0, 0)
                    // 本日24:00のDateオブジェクト
                    const todaysEnd = new Date()
                    todaysEnd.setDate(todaysEnd.getDate() + 1)
                    todaysEnd.setHours(0, 0, 0, 0)
                    // カレンダー最上部からの位置(px)を返す
                    if ( dateTime <= todaysStart ) {
                        return 0            // 本日00:00以前の場合は最上部
                    } else if ( dateTime >= todaysEnd ) {
                        return 50 * 24      // 本日24:00以降の場合は最下部
                    } else {
                        // 本日00:00からの時間数 * 50px
                        const hourFromStart = ( dateTime.getHours() + (dateTime.getMinutes() / 60) )
                        return (hourFromStart-7) * 50
                    }
                }
            }
        }).mount('#daily-calendar')
    </script>


<form method="get" action="top.php" class = "aboveBlank">
	<button type="submit" name="Btn1" value="Btn1" class="btn--white">ホームページへ</button>
</form>



		</article>
		<footer></footer>
    </body>

</html>
