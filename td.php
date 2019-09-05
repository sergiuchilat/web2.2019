<?

/*
$x = 1;
$y = 2;

echo $x + $y;
*/
/*
$x = "a";
$y = "b";

echo $x + $y;
*/

/*
$x = "1";
$y = "2";

echo $x + $y;
*/
/*
$x = "1a";
$y = "2b";

echo $x + $y;
*/
/*
$x = "1.2";
$y = "2";

echo $x + $y;
*/

/*
$x = "a1";
$y = "a2";

echo $x + $y;
*/
/*
$x = "123a4";
$y = "123b5";

echo $x + $y;
*/

/*
$x = "4/2";
$y = "2";

echo $x + $y;
*/

/*
$nume = "Ion";
$prenume = "Creanga";
echo $nume . $prenume;
*/

/*
$nume = "Ion";
$prenume = " Creanga";
echo $nume . $prenume;
*/

/*
$nume = "Ion";
$prenume = "Creanga";
echo $nume . " " .  $prenume;
*/

/*
$nume = "Ion";
$prenume = "Creanga";

echo "{$nume} {$prenume}";

*/

/*
$x = "1";
$y = "2";

echo $x . $y;
*/

//define("CONSTANTA_X", 123);
//echo CONSTANTA_X;

/*
$x = 1;
$y = 1;


echo $x == $y;
*/
/*
$x = 1;
$y = "1";


echo $x == $y;
*/
/*
$x = 1;
$y = "1";


echo $x === $y;
*/
/*
$x = 1;
$y = "1";

echo $x = $y;
*/

/*
$x = true;
*/


//var_dump($x);
/*
$note = array(2.5, 3, 2, 4, 5);

echo "<pre>";
var_dump($note);
echo "</pre>";
*/

/*
$note = [2.5, 3, 2, 4, 5];

echo "<pre>";
var_dump($note);
echo "</pre>";
*/

/*
$note = [8, 9, 10, 9];

$suma = 0;

for($i = 0; $i < 4; $i++) {
	$suma = $suma + $note[$i];
}

echo $suma / 4;
*/

/*
$note = [8, 9, 10, 9, 10];

$suma = 0;
$nr = count($note);
for($i = 0; $i < $nr; $i++) {
	$suma = $suma + $note[$i];
}

echo $suma / $nr;
*/

/*
$note = [8, 9, 10, 9, 10];

$suma = 0;
foreach($note as $nota) {
	$suma = $suma + $nota;
}

echo $suma / count($note);
*/

/*
$student = [
	"name" => "Ion Creanga",
	"phone" => "+37311111111",
	"age" => 182,
	"note" => [
		"PW" => 3,
		"SD" => 10,
		"AC" => null,
		"POO" => 0,
		"EF" => 7
	]
];

echo "<pre>";
var_dump($student);
echo "</pre>";
*/

/*
$group = [
	[
		"name" => "Ion Creanga",
		"phone" => "+37311111111",
		"age" => 182,
		"note" => [
			"PW" => 3,
			"SD" => 10,
			"AC" => null,
			"POO" => 0,
			"EF" => 7
		],
	],
	[
		"name" => "Mihai Eminescu",
		"phone" => "+37300000000",
		"age" => 182,
		"note" => [
			"PW" => 3,
			"SD" => 10,
			"AC" => null,
			"POO" => 0,
			"EF" => 7
		]
	]
];

echo "<pre>";
var_dump($group);
echo "</pre>";
*/

$students = ["Ion Creanga", "Mihai Eminescu"];

?>
<table border="1">
	<? foreach($students as $student){?>
	<tr>
		<td><?= $student?></td>
	</tr>
	<? }?>
</table>
<?





