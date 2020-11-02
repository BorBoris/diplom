
<?php require '../cfg.php'; ?>
<?php 	
				if(isset($_POST['house-add'])){
					$name = $_POST['house-name'];
					$dsp = $_POST['house-description'];
					$price = $_POST['house-price'];
					$hdd = $_POST['house-hdd'];
					$ram = $_POST['house-ram'];
					$gpu = $_POST['house-gpu'];
					$mb = mysqli_query($connect, "INSERT INTO mboard (name, dsp, price, hdd, ram, gpu) VALUES ('$name', '$dsp', '$price', '$hdd', '$ram', '$gpu')");
					header("Location: index.php");
				}
				if(isset($_POST['cpu-add'])){
					$cpuname = $_POST['cpu-name'];
					$cpudsp = $_POST['cpu-description'];
					$cpuprice = $_POST['cpu-price'];
					$cpu = mysqli_query($connect, "INSERT INTO cpu (name, dsp, price) VALUES ('$cpuname', '$cpudsp', '$cpuprice')");
					header("Location: index.php");
				}
				if(isset($_POST['gpu-add'])){
					$gpuname = $_POST['gpu-name'];
					$gpudsp = $_POST['gpu-description'];
					$gpuprice = $_POST['gpu-price'];
					$gpu = mysqli_query($connect, "INSERT INTO gpu (name, dsp, price) VALUES ('$gpuname', '$gpudsp', '$gpuprice')");
					header("Location: index.php");
				}
				if(isset($_POST['ram-add'])){
					$gpuname = $_POST['ram-name'];
					$gpudsp = $_POST['ram-description'];
					$gpuprice = $_POST['ram-price'];
					$ram = mysqli_query($connect, "INSERT INTO ram (name, dsp, price) VALUES ('$gpuname', '$gpudsp', '$gpuprice')");
					header("Location: index.php");
				}
				if(isset($_POST['hdd-add'])){
					$hddname = $_POST['hdd-name'];
					$hdddsp = $_POST['hdd-description'];
					$hddprice = $_POST['hdd-price'];
					$hdd = mysqli_query($connect, "INSERT INTO hdd (name, dsp, price) VALUES ('$hddname', '$hdddsp', '$hddprice')");
					header("Location: index.php");
				}


				if(isset($_GET['delete'])){
					$Dtype = $_GET['type'];
					$Did = $_GET['id'];
					mysqli_query($connect, "DELETE FROM $Dtype WHERE id = '$Did'");
					header("Location: index.php");
				}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Configurate Computer</title>
	<link rel="stylesheet" href="../style.css">
	<?php echo $bootstrap; ?>

	<style>
		.main{
			text-align: center;
			padding:10px;
			color:white;
		}
		h3{
			color:#dc143c;
			padding:10px;
		}
		.forms{
			float:right;
		}
		.data{
			float:left;
			width:50%;
			margin-top:70px;
		}
	</style>
</head>
<body>
		<?php 

			if(isset($_GET['do-edit'])){
				echo '<div class="edit-element">
					 	<form action="index.php?id='.$_GET['id'].'&type='.$_GET['type'].'" method="POST">
					 		<input type="text" name="name" value="'.$_GET['name'].'"  placeholder="Новое имя.."><br><br>
					 		<input type="text" name="dsp" value="'.$_GET['dsp'].'" placeholder="Новое Описание.."><br><br>
					 		<input type="text" name="price" value="'.$_GET['price'].'" placeholder="Новая цена.."><br><br>
					 		<button name="edit">Сохранить</button>
					 	</form>
		 			  </div>';
			}

			if(isset($_POST['edit'])){
				$type = $_GET['type'];
				$id = $_GET['id'];
				$name = $_POST['name'];
				$dsp = $_POST['dsp'];
				$price = $_POST['price'];
				mysqli_query($connect, "UPDATE $type SET name = '$name', dsp = '$dsp', price = '$price' WHERE id = '$id' ");
				header("Location: index.php");
			}
	 ?>
	<div class="main">
		<div class="data">

			<div class="price" style="display:none;">0р.</div>
			<div class="m-board ctrl" onclick="openboxadmin('mboard', '0', this)" selected="0">
				Материнская плата
			</div>
			<div class="cpu ctrl cI" onclick="openboxadmin('cpu', '0', this)" selected="0">
				Процессор
			</div>
			<div class="gpu ctrl cI" onclick="openboxadmin('gpu', '0', this)" selected="0">
				Видеокарта
			</div>
		<!-- 	<div class="cpu-fan ctrl cI" onclick="openbox('cpufan', '0', this)" selected="1">
				Кулер
			</div> -->
			<div class="ram ctrl cI" onclick="openboxadmin('ram', '0', this)" selected="0">
				ОЗУ
			</div>
			<div class="hdd ctrl cI" onclick="openboxadmin('hdd', '0', this)" selected="0">
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
		<div class="forms">	
			<form action="index.php" method="post">
				<h3>М. плата</h3>
				<input type="text" class="admin-input" name="house-name" placeholder="Введите имя"><br>
				<input type="text" class="admin-input" name="house-description" placeholder="Введите описание"><br>
				<input type="text" class="admin-input" name="house-price" placeholder="Введите количество цену"><br>
				<input type="text" class="admin-input" name="house-gpu" placeholder="Введите количество видеокарт"><br>
				<input type="text" class="admin-input" name="house-ram" placeholder="Введите количество плашек ОЗУ"><br>
				<input type="text" class="admin-input" name="house-hdd" placeholder="Введите количество HDD"><br>
				<button class="admin-add" name="house-add">Добавить</button><br><br>
			</form>
			<form action="index.php" method="post">
				<h3>Процессор</h3>
				<input type="text" class="admin-input" name="cpu-name" placeholder="Введите имя"><br>
				<input type="text" class="admin-input" name="cpu-description" placeholder="Введите описание"><br>
				<input type="text" class="admin-input" name="cpu-price" placeholder="Введите количество цену"><br>
				<button class="admin-add" name="cpu-add">Добавить</button><br><br>
			</form>
			<form action="index.php" method="post">
				<h3>Видеокарта</h3>
				<input type="text" class="admin-input" name="gpu-name" placeholder="Введите имя"><br>
				<input type="text" class="admin-input" name="gpu-description" placeholder="Введите описание"><br>
				<input type="text" class="admin-input" name="gpu-price" placeholder="Введите количество цену"><br>
				<button class="admin-add" name="gpu-add">Добавить</button><br><br>
			</form>
	<!-- 		<form action="index.php" method="post">
				<h3>Кулер</h3>
				<input type="text" class="admin-input" name="cpufan-name" placeholder="Введите имя"><br><br>
				<input type="text" class="admin-input" name="cpufan-description" placeholder="Введите описание"><br><br>
				<input type="text" class="admin-input" name="cpufan-price" placeholder="Введите количество цену"><br><br>
				<button class="admin-add" name="cpufan-add">Добавить</button><br><br>
			</form> -->
			<form action="index.php" method="post">
				<h3>ОЗУ</h3>
				<input type="text" class="admin-input" name="ram-name" placeholder="Введите имя"><br>
				<input type="text" class="admin-input" name="ram-description" placeholder="Введите описание"><br>
				<input type="text" class="admin-input" name="ram-price" placeholder="Введите количество цену"><br>
				<button class="admin-add" name="ram-add">Добавить</button><br><br>
			</form>
			<form action="index.php" method="post">
				<h3>Жесткий диск</h3>
				<input type="text" class="admin-input" name="hdd-name" placeholder="Введите имя"><br>
				<input type="text" class="admin-input" name="hdd-description" placeholder="Введите описание"><br>
				<input type="text" class="admin-input" name="hdd-price" placeholder="Введите количество цену"><br>
				<button class="admin-add" name="hdd-add">Добавить</button><br><br>
			</form>
	<!-- 		<form action="index.php" method="post">
				<h3>Корпус</h3>
				<input type="text" class="admin-input" name="block-name" placeholder="Введите имя"><br><br>
				<input type="text" class="admin-input" name="block-description" placeholder="Введите описание"><br><br>
				<input type="text" class="admin-input" name="block-price" placeholder="Введите количество цену"><br><br>
				<button class="admin-add" name="block-add">Добавить</button><br><br>
			</form>
	 -->
			

		</div>
	</div>

	<script src="../script.js"></script>
</body>
</html>
