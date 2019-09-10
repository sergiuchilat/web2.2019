<? 
	$connection = mysqli_connect("localhost", "root", "", "web2");
	if (!$connection) {
	    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
	    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
	    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
	    exit;
	}

	$result = mysqli_query($connection, "SELECT * FROM students");
	
	
?>
<!doctype html>
<html>
<head></head>
<body>
	<table border="1">
	<? while($student = mysqli_fetch_assoc($result)){?>
	<tr>
		<td><?= $student['name']?></td>
	</tr>
	<? }?>
</table>
</body>
</html>