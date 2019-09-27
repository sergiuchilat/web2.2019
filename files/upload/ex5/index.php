<?
if(!empty($_POST['name']) && !empty($_POST['age'])) {

    $connection = mysqli_connect('localhost', 'root', '', 'web2');

    $fileName = '';
    if(
      (isset($_FILES))
      &&
      ($_FILES['photo']['error'] === 0)
    ){
        $fileName = microtime() . ".png";
        if(!move_uploaded_file($_FILES['photo']['tmp_name'], 'files/' . $fileName)){
            $fileName = '';
        }
    }


    $query = "
      INSERT INTO students
      SET
          name = '{$_POST['name']}',
          age = '{$_POST['age']}',
          photo = '{$fileName}'
          
    ";
    $result = mysqli_query($connection, $query);
}
?>
<!doctype html>
<html>
<head>
    <title>File upload</title>
</head>
<body>
    <? if(!empty($_POST)) {?>
        <?=$result?'Success':'Error';?>
        <a href="index.php">Add new</a>
    <? } else {?>

    <form action="" method="post" enctype="multipart/form-data">
      Name <input type="text" name="name"> <br>
      Age <input type="number" name="age"> <br>
      Photo <input type="file" name="photo">
      <br>
      <input type="submit">
    </form>
  <? }?>

</body>
</html>
