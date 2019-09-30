<?
if(!empty($_POST['name']) && !empty($_POST['age'])) {

    $connection = mysqli_connect('localhost', 'root', '', 'web2');

    $fileName = '';

    echo '<pre>';
    print_r($_FILES);
    echo '</pre>';
    if(isset($_FILES)){
        foreach ($_FILES['photos']['name'] as $key => $value) {

            $fileName = microtime() . ".png";
            if(!move_uploaded_file($_FILES['photos']['tmp_name'][$key], 'files/' . $fileName)){
                $fileName = '';
            }
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
      Photo <br>
      Photo 1<input type="file" name="photos[1]"> <br>
      Photo 2<input type="file" name="photos[2]"> <br>
      Photo 3<input type="file" name="photos[3]"> <br>
      <br>
      <input type="submit">
    </form>
  <? }?>

</body>
</html>
