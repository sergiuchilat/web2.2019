<?
if(!empty($_POST['name']) && !empty($_POST['age'])) {

    $connection = mysqli_connect('localhost', 'root', '', 'web2');

    $query = "
      INSERT INTO students
      SET
          name = '{$_POST['name']}',
          age = '{$_POST['age']}'
          
    ";
    if(mysqli_query($connection, $query)) {
        $response = [
            'status' => 200,
            'response' => 'SUCCESS'
        ];
    } else {
        $response = [
            'status' => 501,
            'response' => 'ERROR. DATABASE ERROR'
        ];
    }
}else {
    $response = [
        'status' => 501,
        'response' => 'ERROR. INVALID DATA'
    ];
}

echo json_encode($response);
?>
