<?php
$connection = mysqli_connect('localhost', 'root', '', 'web2');
$query = "
    SELECT
        students.name,
        students.age
    FROM
        students
    WHERE
        students.id = {$_GET['id']}
  ";

$result = mysqli_query($connection, $query);

while ($students[] = mysqli_fetch_assoc($result)) {

}

echo json_encode($students, JSON_FORCE_OBJECT);
