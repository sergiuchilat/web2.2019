<?
if(!empty($_POST['name'])) {
	

	$result = mysqli_query($connection, "SELECT * FROM students");

	//mysqli_query($connection, "INSERT INTO students (name, age) VALUES ('{$_POST['name']}', {$_POST['age']})");
	if(mysqli_query($connection, "INSERT INTO students SET name = '{$_POST['name']}', age = {$_POST['age']}")) {
		echo 'Succes';
	} else {
		echo 'Eroare';
	}
} else {
?>
<form action="" method="post">
	Name <input type="text" name="name">
	<br>
	Age <br>
	<select name="age">
	 	<? for($i = 0; $i < 100; $i++){?>
		<option value="<?=$i;?>"><?=$i;?></option>
		<? }?>
	</select>
	<br>
	<input type="submit">
</form>

<?}?>