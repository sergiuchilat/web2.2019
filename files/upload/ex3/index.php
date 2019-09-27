<?
if(!empty($_POST['name'])) {

    $connection = mysqli_connect('localhost', 'root', '', 'web2');


    $query = "
      INSERT INTO students
      SET
          name = '{$_POST['name']}',
          age = '{$_POST['age']}'
          
    ";
    mysqli_query($connection, $query);
    $lastID = mysqli_insert_id($connection);
    $fileName = $lastID . ".png";
    move_uploaded_file($_FILES['photo']['tmp_name'], 'files/' . $fileName);

    $query = "
        UPDATE students
        SET
            photo = '{$fileName}'
        WHERE
            id = {$lastID}
          
    ";
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
