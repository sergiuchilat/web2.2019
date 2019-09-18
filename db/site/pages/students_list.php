<?
if(isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] === 'delete'){
    if(mysqli_query($connection, "DELETE FROM students WHERE id = {$_GET['id']}" )) {
        echo 'Succes';
    } else {
        echo 'Eroare';
    }
}

$result = mysqli_query($connection, "SELECT * FROM students");
?>
<table border="1">
<? while($student = mysqli_fetch_assoc($result)){?>
<tr>
	<td><?= $student['name']?></td>
	<td><?= $student['age']?></td>
	<td>
    <a href="?page=students_list&action=delete&id=<?= $student['id']?>" onclick="return confirm('Doriti sa stergeti inregistrarea?')">x</a>
    <a href="?page=students_edit&id=<?= $student['id']?>">m</a>
  </td>
</tr>
<? }?>
