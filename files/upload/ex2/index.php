<?
if(!empty($_POST['name'])) {
  $fileName = $_FILES['photo']['name'];
    move_uploaded_file($_FILES['photo']['tmp_name'], 'files/' . $_FILES['photo']['name']);

  $connection = mysqli_connect('localhost', 'root', '', 'web2');
  $query = "
    INSERT INTO students
    SET
        name = '{$_POST['name']}',
        age = '{$_POST['age']}',
        photo = '{$fileName}'
        
  ";
  echo $query;
  mysqli_query($connection, $query);
}
?>
<!doctype html>
<html>
<head>
    <title>File upload</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
      Name <input type="text" name="name"> <br>
      Age <input type="number" name="age"> <br>
      Photo <input type="file" name="photo">
      <br>
      <input type="submit">
    </form>
</body>
</html>
