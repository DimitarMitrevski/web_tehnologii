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
    	$json_file = file_get_contents('studenti.json');
        $php_json_object1 = json_decode($json_file);
    ?>
    <ol>
<?php
$studenti =  $php_json_object1->studenti;
for ($s = 0; $s < count($studenti); $s++) {
echo '<li>'.$studenti[$s]->indeks.' '.$studenti[$s]->ime.' '.$studenti[$s]->prezime.'</li>';
}
?>
   </ol>
</body>
</html>