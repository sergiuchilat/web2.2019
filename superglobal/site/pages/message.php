<?

if(!empty($_POST['message'])) {
	echo 'Multumim pentru mesaj';
	echo "IP: {$_SERVER['REMOTE_ADDR']}";
	$myMessage = $_POST['message'];
	$_SESSION['myMessage'] = $_POST['message'];
} else {
?>
<form action="" method="post">
	Name <input type="text" name="name">
	<br>
	Message <br>
	<textarea name="message" cols="30" rows="10"></textarea>
	<input type="submit">
</form>

<?}?>