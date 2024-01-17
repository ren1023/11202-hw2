
<!-- <?php include_once "../api/db.php" ?> -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>EstateAgency Bootstrap Template - About</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

     <!-- import jq -->
     <script src="../assets/js/jquery-3.7.1.min.js"></script>


<div class="di mt-5" style="background-color: lightblue; position:relative; ">
	<?php 
	// include "marquee.php";
	?>

	<div style="height:32px; display:block;"></div>
	<!--正中央-->
	<h3>更多最新消息顯示區</h3>
	<hr>
	<?php 
		$total =$News->count(['sh' => 1]);
		$div = 5;
		$pages = ceil($total / $div);
		$now = $_GET['p'] ?? 1;
		$start = ($now - 1) * $div;
		$news = $News->all("limit $start,$div");
	?>
	<ol class="ssaa list-group" start='<?= $start + 1; ?>'>
		<?php

		foreach ($news as $n) {
			echo "<li class='sswww list-group-item list-group-item-success mt-3' >";
			echo mb_substr($n['text'], 0, 20);
			echo "<div class='all' style='display:none'>";
			echo $n['text'];
			echo "</div>";
			echo "...</li>";
		}
		?>
	</ol>

	<div class="text-center">
		<?php
			
		if ($now > 1) {
			
			$prev = $now - 1;
			echo " <a href='?news&p=$prev'><</a> ";
		}


		for ($i = 1; $i <= $pages; $i++) {
			$fontsize = ($now == $i) ? '24px' : '16px';
			// echo "<a href='?do=$do&p=$i' style='font-size:$fontsize'> $i <a/>";
			echo "<a href='?news&p=$i' style='font-size:$fontsize'> $i <a/>";
		}


		if ($now < $pages) {
			$next = $now + 1;
			echo " <a href='?news&p=$next'> > </a> ";
		}

		?>

	</div>
<div id="alt" style="position: absolute; width: 450px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>

</div>
</div>
<div id="alt" class="table-warning rounded-4" style="position: absolute; width: 400px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
			<script>
				$(".sswww").hover(
					function() {
						$("#alt").html("<pre>" + $(this).children(".all").html() + "</pre>").css({
							"top": $(this).offset().top -500
						})
						$("#alt").show()
					}
				)
				$(".sswww").mouseout(
					function() {
						$("#alt").hide()
					}
				)
			</script>




