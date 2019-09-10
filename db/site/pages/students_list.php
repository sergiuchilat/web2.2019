<?
$result = mysqli_query($connection, "SELECT * FROM students");
?>
<table border="1">
<? while($student = mysqli_fetch_assoc($result)){?>
<tr>
	<td><?= $student['name']?></td>
</tr>
<? }?>