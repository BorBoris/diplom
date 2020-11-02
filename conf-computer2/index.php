<?php require 'cfg.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>conf-computer</title>
	<link rel="stylesheet" href="style.css">
	<?=$bootstrap; ?>
</head>
<body>
	<div class="main">
		<div class="price">0р.</div>
		<div class="m-board ctrl" onclick="openbox('mboard', '0', this)" selected="0">
			Материнская плата
		</div>
		<div class="cpu ctrl cI" onclick="openbox('cpu', '0', this)" selected="1">
			Процессор
		</div>
		<div class="gpu ctrl cI" onclick="openbox('gpu', '0', this)" selected="1">
			Видеокарта
		</div>
	<!-- 	<div class="cpu-fan ctrl cI" onclick="openbox('cpufan', '0', this)" selected="1">
			Кулер
		</div> -->
		<div class="ram ctrl cI" onclick="openbox('ram', '0', this)" selected="1">
			ОЗУ
		</div>
		<div class="hdd ctrl cI" onclick="openbox('hdd', '0', this)" selected="1">
			Жесткий диск
		</div>
	<!-- 	<div class="block ctrl cI" onclick="openbox('block', '0', this)" selected="1">
			Корпус
		</div> -->

		<div class="box">
			
		</div>
		<div class="box-selected">
			
		</div>

	</div>

	<script src="script.js"></script>
</body>
</html>