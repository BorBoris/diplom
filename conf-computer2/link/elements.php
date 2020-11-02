<?php require '../cfg.php'; ?>
<?php


			if($_GET['element'] == 0){

				$elements = mysqli_query($connect, "SELECT * FROM `".$_GET['type']."`");
				foreach ($elements as $element) {
					if(isset($_GET['admin'])){

							 	echo '<div class="ctrl-element" >

							 			<div class="ctrl-info" onclick="openbox(\''.$_GET['type'].'\', \''.$element['id'].'\', this)">
											
											<strong >'.$element['name'].'</strong> '.$element['dsp'].'

										</div>
										<div class="add" price="'.$element['price'].'" >'.$element['price'].'р.</div>
										<a class="delete" style="color:white;" href="?id='.$element['id'].'&type='.$_GET['type'].'&delete=1">Удалить</a>
										<a class="add" style="color:#dc143c;text-decoration:none;" href="?do-edit=1&type='.$_GET['type'].'&id='.$element['id'].'&name='.$element['name'].'&dsp='.$element['dsp'].'&price='.$element['price'].'">Редактировать</a>

									</div>';

					}else{
							if($_GET['type'] == "mboard"){

							 	echo '<div class="ctrl-element" >

											<strong >'.$element['name'].'</strong> '.$element['dsp'].'

										<div class="add" price="'.$element['price'].'"  gpu="'.$element['gpu'].'" ram="'.$element['ram'].'" hdd="'.$element['hdd'].'" onclick="addelement(\''.$_GET['type'].'\', \''.$element['id'].'\', this)">Добавить '.$element['price'].'р.</div>
									</div>';
							}else{
								echo '<div class="ctrl-element" >

			
											<strong >'.$element['name'].'</strong> '.$element['dsp'].'

										<div class="add" price="'.$element['price'].'" onclick="addelement(\''.$_GET['type'].'\', \''.$element['id'].'\', this)">Добавить '.$element['price'].'р.</div>

									</div>';
							}
					}
				} 

			}
		
?>