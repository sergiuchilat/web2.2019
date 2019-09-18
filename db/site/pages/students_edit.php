<?
$result = mysqli_query($connection, "SELECT * FROM students WHERE id = {$_GET['id']}");
$student = mysqli_fetch_assoc($result);

if(!empty($_POST['name'])) {


	$result = mysqli_query($connection, "SELECT * FROM students");

	if(mysqli_query($connection, "UPDATE students SET name = '{$_POST['name']}', age = {$_POST['age']} WHERE id = {$_GET['id']}")) {
		echo 'Succes';
	} else {
		echo 'Eroare';
	}
} else {
?>
<form action="" method="post">
	Name <input type="text" name="name" value="<?= $student['name']?>">
	<br>
	Age <br>
	<select name="age">
	 	<? for($i = 0; $i < 100; $i++){?>
		<option value="<?=$i;?>" <?= $i == $student['age']?'selected':'';?>><?=$i;?></option>
		<? }?>
	</select>
	<br>
	<input type="submit">
</form>

<?}?>
