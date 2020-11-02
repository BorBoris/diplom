<?php require '../cfg.php'; ?>
<?php 	

		
				$Getid = $_GET['id'];
				$Gettype = $_GET['type'];
 				$type = mysqli_query($connect, "SELECT * FROM `".$Gettype."` WHERE `id` = '".$Getid."'");
				foreach ($type as $mb) {
					echo '<div class="ctrl-element '.$mb['id'].'" price="'.$mb['price'].'" onclick="dltelement(\''.$_GET['type'].'\', \''.$_GET['id'].'\', this)" ><strong >'.$mb['name'].'</strong> '.$mb['dsp'].' <strong>'.$mb['price'].'p.</strong><div class="delete" >Удалить</div></div>';
				}

?>