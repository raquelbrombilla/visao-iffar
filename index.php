<?php
	include "conexao.php";
	session_start();

	$sql = "select * from timeline order by date desc";
	$result = mysqli_query($conexao, $sql);	

	$array = mysqli_fetch_array($result);

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Visão IFFar</title>


	<!-- Bt e template menu -->
	<link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
    <!-- themify CSS -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/css.css">

    <!-- Add CSS via jsdilvr CDN -->
	<link rel="stylesheet" type="text/css" href="horizontal/css/horizontal_timeline.2.0.css">

	<link href="https://fonts.googleapis.com/css?family=Noto+Sans&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="font/css/all.css">
	
</head>
<body>

	<?php

		include "menu/menu.php";


	?>

	<div class="container">
		<div class="horizontal-timeline" id="timeline">
			<div class="events-content">
				<ol>
					<?php

						//foreach($array as $tim) { 
							echo "<li class='selected' data-date=".$array['date'].">";
							echo "<h2>".$array['descricao']."</h2>";
							echo "<img src='imagensHome/".$array['foto']."' style='border-radius: 5%;'>

							</li>";
					//	}
					?>
				</ol>
			</div>
		</div>
	</div>
	<!-- Add Query -->
	
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/ycodetech/horizontal-timeline-2.0@2.0.5-alpha.2/JavaScript/horizontal_timeline.2.0.js"></script>
<!-- https://cdn.statically.io/gh/yCodeTech/horizontal-timeline-2.0/dev/JavaScript/horizontal_timeline.2.0.js?env=dev -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-smooth-scroll/2.2.0/jquery.smooth-scroll.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
	<script>
		$('#timeline').horizontalTimeline({

			dateDisplay: "dateTime", // dateTime, date, time, dayMonth, monthYear, year
			dateOrder: "normal", // normal, reverse

			autoplay: false,
			autoplaySpeed: 8,
			autoplayPause_onHover: false,

			useScrollWheel: true,
			useTouchSwipe: true,
			useKeyboardKeys: true,
			addRequiredFile: true,
			useFontAwesomeIcons: true,
			useNavBtns: true,
			useScrollBtns: true,

			iconBaseClass: "fas fa-3x",
			scrollLeft_iconClass: "fa-chevron-circle-left",
			scrollRight_iconClass: "fa-chevron-circle-right",
			prev_iconClass: "fa-arrow-circle-left",
			next_iconClass: "fa-arrow-circle-right",
			pause_iconClass: "fa-pause-circle",
			play_iconClass: "fa-play-circle"
		});
	</script>
	
</body>
</html>