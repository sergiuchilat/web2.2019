<?
require_once 'models/PC.php';

$personalComputer = new PC("Mac");
$personalComputer->setFreeSpace(500);
var_dump($personalComputer);

$personalComputer2 = new PC("Dell");
$personalComputer2->setFreeSpace("20 kilometri");
var_dump($personalComputer2);
?> 
<hr>
<?
echo $personalComputer2->getFreeSpace(); 