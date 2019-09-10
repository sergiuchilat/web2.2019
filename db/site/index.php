<? 
error_reporting(E_ALL);
session_start();
require_once 'config/db.php';
$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if (!$connection) {
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
?>
<!doctype html>
<head>
<head>
<body>
    <? 
    include 'blocks/menu.php'?>

    <? 
    
    $pageName = $_GET['page'];
    $filePath = "pages/{$pageName}.php";

    if(empty($pageName)){
        $filePath = "pages/home.php";
    }

   if(!file_exists($filePath)){
        $filePath = "pages/e404.php";
    }
    include $filePath;
    ?>

    <?
    if(isset($myMessage)){
        echo $myMessage;
    }
    ?>
</body>