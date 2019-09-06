<? 
error_reporting(E_ALL);
session_start();
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