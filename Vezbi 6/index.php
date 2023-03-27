<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>PHP</title>
</head>
<body>
    <h1><a href="/">Работа со PHP</a></h1>
	<h1><a href="/studenti.php">Сите студенти</a></h1>
	<?php
	//echo '$json_file:<br />';
	$json_file = file_get_contents('studenti.json');
	//var_dump($json_file);
	//echo '<br /><br /><br />$php_json_object:<br />';
	$php_json_object = json_decode($json_file);
	//var_dump($php_json_object);
	//echo count($php_json_object->studenti);	
	?>
	
	<h1 id="univerzitet">Универзитет: <?php echo $php_json_object->univerzitet ?></h1>
    <h2 id="fakultet"><?php echo $php_json_object->fakultet->ime; ?> | <?php echo $php_json_object->fakultet->adresa ?></h2>
	
	<form method="get" action="/" style="text-align:right; background-color:lightblue; width:400px; padding:30px">
    <label for="id_indeks">Индекс</label>
    <input type="text" id="id_indeks" name="indeks" value="<?php if (isset($_GET['indeks'])) {echo $_GET['indeks'];}?>"><br><br>
    <input type="submit" value="Прикажи">
    </form>
	
	<?php 

		if (isset($_GET['indeks'])) {
			//echo $_GET['indeks'];
			//echo count($php_json_object->studenti);
			//var_dump (count($php_json_object->studenti));
			//var_dump($php_json_object->studenti[0]->indeks);
			//var_dump($php_json_object->studenti);
			
			$student_exists = 0;
			for ($s = 0; $s < count($php_json_object->studenti); $s++) {
				
				//echo 'OK<br />';
				//echo $php_json_object->studenti[$s]->indeks, '<br />';
				
				if ($_GET['indeks'] == $php_json_object->studenti[$s]->indeks) {
					$student_exists += 1;
					echo 'Студентот со индекс <b>'. $_GET['indeks'] .'</b> e:';
					echo '<h3 id="student">'.$php_json_object->studenti[$s]->ime.'&nbsp'.$php_json_object->studenti[$s]->prezime.'</h3>';
					
					echo 'Оценки: <ol id="ocenki">';
					for ($o = 0; $o < count($php_json_object->ocenki); $o++) {
						if ($_GET['indeks'] == $php_json_object->ocenki[$o]->indeks) {
							echo '<li>'.$php_json_object->ocenki[$o]->predmet.' - '.$php_json_object->ocenki[$o]->ocenka.'</li>';
						}
					}
					echo '</ol>';
				}
				
			}
			
			if ($student_exists < 1) {
				echo 'Студент со индекс <strong>', $_GET['indeks'], '</strong> не е пронајден!';
			}
			
		}
	?>
	
</body>
</html>