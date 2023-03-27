<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сите студенти</title>
</head>
<body>
    <h2>Сите студенти</h2>
    <?php 
      //$-variabla(promenliva), moze da ni bide bilo koj tip string, integer itn.
    	$json_file = file_get_contents('studenti.json');
      $php_json_object1 = json_decode($json_file);
    ?>
    <ol>
<?php
$studenti =  $php_json_object1->studenti;
for ($s = 0; $s < count($studenti); $s++) {
 //concatenate + in other programming languages in PHP is .    
echo '<li>'.$studenti[$s]->indeks.' '.$studenti[$s]->ime.' '.$studenti[$s]->prezime.'</li>';
}

?>
   </ol>
   <hr/>
 <h2>Оценки</h2>
 <ul>
    <?php 
    for($o=0; $o < count($php_json_object1->ocenki); $o++ ){
    echo '<li>'.'<b>Предмет</b>: '.$php_json_object1->ocenki[$o]->predmet.' <b>Оценка</b>: '.$php_json_object1->ocenki[$o]->ocenka.'</li>';
    }
    
    ?>
 </ul>
</body>
</html>