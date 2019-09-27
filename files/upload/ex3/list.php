<?php
$connection = mysqli_connect('localhost', 'root', '', 'web2');
$query = "
    SELECT
        students.name,
        students.age,
        students.photo
    FROM
        students
  ";

$result = mysqli_query($connection, $query);


?>

<!doctype html>
<html>
<head>
    <title>File upload</title>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <td>Name</td>
                <td>Age</td>
                <td>Photo</td>
            </tr>
        </thead>
        <tbody>
            <? while ($item = mysqli_fetch_assoc($result)) {?>
                <tr>
                    <td><?=$item['name'];?></td>
                    <td><?=$item['age'];?></td>
                    <td><img src="files/<?=$item['photo'];?>" alt=""></td>
                </tr>
            <?}?>
        </tbody>
    </table>
</body>
</html>
