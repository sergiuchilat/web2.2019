<?php
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    header('HTTP/1.1 405 Method not allowed', true, 405);
    $response = [
        'status' => 405,
        'response' => 'ERROR. METHOD NOT ALLOWED'
    ];
    echo json_encode($response);
    die();
}
$connection = mysqli_connect('localhost', 'root', '', 'web2');
$query = "
    SELECT
        students.name,
        students.age
    FROM
        students
  ";

$result = mysqli_query($connection, $query);

while ($students[] = mysqli_fetch_assoc($result)) {

}

echo json_encode($students, JSON_FORCE_OBJECT);
